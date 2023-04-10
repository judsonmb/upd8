<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request) {
        return view('customers');
    }

    public function create() {
        return view('customer-create');
    }
}
