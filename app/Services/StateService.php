<?php

namespace App\Services;

use App\Models\State;

class StateService
{
    public function getStates() 
    {
        return State::orderBy('name')->get();
    }
}
