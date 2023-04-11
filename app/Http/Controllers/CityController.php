<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CityService;

class CityController extends Controller
{
    public function getCitiesFromStateId(int $stateId)
    {
        $cities = (new CityService)->getCitiesFromStateId($stateId);
        return response()->json(['data' => $cities], 200);
    }
}
