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
        $races = Race::getAll('raceDate > ?', [date('Y-m-d H:i:s')], 'raceDate ASC');
        $drivers = Driver::getAll(null,[], 'lastName ASC');
        $predictions = Prediction::getAll('userId = ?', [$this->getCurrentUserId()], 'createdAt DESC');
//        if ($this->user->isLoggedIn()) {
//            $predictions = Prediction::getAll('userId = ?', [$this->user->getId()], 'createdAt DESC');
//        }
        return $this->html([
            'races' => $races,
            'drivers' => $drivers,
            'predictions' => $predictions
        ]);
    }

    public function save(Request $request): Response
    {
        if(!$request->isPost()) {
            throw new HttpException(405, 'Method not allowed');
        }
        $prediction = (int)$request->value('id') > 0 ? $this->findOwnPrediction($request->value('id')) : new Prediction();
        $prediction->setFromRequest($request);
        $prediction->setUserId($this->getCurrentUserId());
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
        return 2; // Replace with actual user ID retrieval logic
    }
}