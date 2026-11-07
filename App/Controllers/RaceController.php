<?php

namespace App\Controllers;

use App\Models\Race;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
use Framework\Http\HttpException;

class RaceController extends BaseController
{

    public function authorize(Request $request, string $action): bool
    {
        return $this->user->isLoggedIn();
    }

    public function index(Request $request): Response
    {
        $races = Race::getAll();
        return $this->html([
            'races' => $races,
        ]);
    }

    /**
     * Displays the form for editing an existing race.
     *
     * @return Response The response object containing the rendered form filled with the race data.
     * @throws HttpException If the edited race does not exist.
     */
    public function edit(Request $request): Response
    {
        return $this->html(['race' => $this->findRace($request)]);
    }

    public function add(Request $request): Response
    {
        return $this->html(['race' => new Race()]);
    }

    public function delete(Request $request): Response
    {
        if(!$request->isPost()) {
            throw new HttpException(405, 'Method not allowed');
        }
        $race = $this->findRace($request);
        $race->delete();
        return $this->redirect($this->url('race.index'));
    }

    public function save(Request $request): Response
    {
        if(!$request->isPost()) {
            throw new HttpException(405, 'Method not allowed');
        }
        $race = (int)$request->value('id') > 0 ? $this->findRace($request) : new Race();
        $race->setFromRequest($request);
        $race->save();
        return $this->redirect($this->url('race.index'));
    }

    private function findRace(Request $request): Race
    {
        $id = (int)$request->value('id');
        $race = Race::getOne($id);
        if (!$race) {
            throw new HttpException(404, 'Race not found');
        }
        return $race;
    }
}