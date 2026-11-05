<?php

namespace App\Controllers;

use Framework\Core\BaseController;
use Framework\Http\Request;
use Framework\Http\Responses\Response;
class DriversController extends BaseController
{
    public function index(request $request) : Response
    {
        return $this->html();
    }
}