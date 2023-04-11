<?php

namespace App\Services;

use App\Models\City;

class CityService
{
    public function getCitiesFromStateId(int $stateId) 
    {
        return City::where('state_id', $stateId)->orderBy('name')->get();
    }
}
