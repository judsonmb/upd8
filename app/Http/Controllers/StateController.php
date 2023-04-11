<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StateService;

class StateController extends Controller
{
    public function getStates(Request $request)
    {
        $states = (new StateService)->getStates();
        return response()->json(['data' => $states], 200);
    }
}
