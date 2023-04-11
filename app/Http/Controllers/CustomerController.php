<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Services\AddressService;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\GetCustomersRequest;

class CustomerController extends Controller
{
    public function index(GetCustomersRequest $request) 
    {
        return view('customers');
    }

    public function getCustomers(Request $request)
    {
        $customers = (new CustomerService)->getCustomersListWithPagination($request->all());
        return response()->json($customers, 200);
    }

    public function create() 
    {
        return view('customers-create');
    }

    public function store(CustomerStoreRequest $request) 
    {
        $newCustomer = (new CustomerService)->storeCustomer($request->all());
        (new AddressService)->storeAddress($request->all(), $newCustomer->id);
        return response()->json(['Created!'], 201);
    }
}
