<?php

namespace App\Controllers;

use App\Models\Race;
use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class RaceController extends BaseController
{
    public Function index(Request $request): Response
    {
        $races = Race::getAll();
        return $this->html([
            'races' => $races,
        ]);
    }
}