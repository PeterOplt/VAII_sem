<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use App\Models\Race;
use App\Models\Driver;
use App\Models\Prediction;
use Framework\Http\HttpException;
class FantasyController extends BaseController
{
    public function index(Request $request): Response
    {
        $session = $this->app->getSession();
        $error = $session->get('predictionError');
        $session->remove('predictionError');
        $editId = (int)$request->value('edit');
        $editing = $editId > 0 ? $this->findOwnPrediction($editId) : new Prediction();
        return $this->html($this->viewData() + ['error' => $error , 'editing' => $editing]);
    }

    private function viewData(): array
    {
        $races = Race::getAll('raceDate > ?', [date('Y-m-d H:i:s')], 'raceDate ASC');
        $drivers = Driver::getAll(null,[], 'lastName ASC');
        $predictions = Prediction::getAll('userId = ?', [$this->getCurrentUserId()], 'createdAt DESC');

        return [
            'races' => $races,
            'drivers' => $drivers,
            'predictions' => $predictions
        ];
    }

    public function delete(Request $request): Response {
        if (!$request->isPost()) {
            throw new HttpException(405, 'Method not allowed');
        }
        $prediction = $this->findOwnPrediction((int)$request->value('id'));

        if ($prediction->getRace()?->raceEnded()) {
            throw new HttpException(400, 'Predikcia sa nedá zmazať, pretože preteky už prebehli.');
        }

        $prediction->delete();
        return $this->redirect($this->url('fantasy.index'));
    }

    public function edit(Request $request): Response
    {
        $predictionId = (int)$request->value('edit');
        $prediction = $predictionId > 0 ? $this->findOwnPrediction($predictionId) : new Prediction();
        $prediction->setCreatedAt(date('Y-m-d H:i:s'));
        return $this->html($this->viewData() + ['prediction' => $prediction]);
    }
    public function save(Request $request): Response
    {
        if(!$request->isPost()) {
            throw new HttpException(405, 'Method not allowed');
        }
        $prediction = (int)$request->value('id') > 0 ? $this->findOwnPrediction($request->value('id')) : new Prediction();
        $prediction->setFromRequest($request);
        $prediction->setUserId($this->getCurrentUserId());


        $error = null;
        $race = Race::getOne($prediction->getRaceId());
        if ($race === null) {
            $error = 'Predikcia sa nedá uložiť, pretože preteky neexistuju.';
        } else if($race->raceEnded()) {
            $error = 'Predikcia sa nedá uložiť, pretože preteky už prebehli.';
        } else if (!$prediction->hasValidDrivers()) {
            $error = 'Vyber troch rôznych jazdcov';
        } else {
            $existing = Prediction::findForUserAndRace($this->getCurrentUserId(), $prediction->getRaceId());
            if ($existing !== null && $existing->getId() !== $prediction->getId()) {
                $error = 'Predikcia pre tieto preteky už existuje.';
            }
        }

        if ($error !== null) {
            $this->app->getSession()->set('predictionError', $error);
            return $this->redirect($this->url('fantasy.index'));
        }

        $prediction->save();

        return $this->redirect($this->url('fantasy.index'));
    }

    private function findOwnPrediction(int $id): Prediction
    {
        $prediction = Prediction::getOne($id);
        if (!$prediction || $prediction->getUserId() !== $this->getCurrentUserId()) {
            throw new HttpException(404, 'Prediction not found');
        }
        return $prediction;
    }

    //TODO: nahradiť prihláseným userom

    private function getCurrentUserId(): int
    {
        return 4; // Replace with actual user ID retrieval logic
    }
}