<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;

class CustomerController extends Controller
{
    public function index(Request $request) 
    {
        return view('customers');
    }

    public function getCustomers(Request $request)
    {
        $customers = (new CustomerService)->getCustomersListWithPagination($request->all());
        return response()->json(['data' => $customers], 200);
    }

    public function create() 
    {
        return view('customer-create');
    }
}
