<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function getCustomersListWithPagination(array $data) 
    {
        return Customer::whereHas('address', function($q) use ($data) {
                            $q->whereHas('city', function($q2) use ($data){
                                $q2->whereHas('state', function($q3) use ($data){
                                    $q3->when(isset($data['state_id']), function($q4) use ($data){
                                        $q4->where('id', $data['state_id']);
                                    });
                                });
                                $q2->when(isset($data['city_id']), function($q3) use ($data){
                                    $q3->where('id', $data['city_id']);
                                });
                            });
        })
        ->when(isset($data['cpf']), function($q) use ($data){
            $q->where('cpf', 'like', '%'.$data['cpf'].'%');
        })
        ->when(isset($data['name']), function($q) use ($data){
            $q->where('name', 'like', '%'.$data['name'].'%');
        })
        ->when(isset($data['birth']), function($q) use ($data){
            $q->where('birth', $data['birth']);
        })
        ->when(isset($data['gender']), function($q) use ($data){
            $q->where('gender', $data['gender']);
        })
        ->with('address')
        ->with('address.city')
        ->with('address.city.state')
        ->orderBy('name')
        ->paginate(4);
    }

    public function storeCustomer(array $data) 
    {
        $newCustomer = new Customer();
        $newCustomer->cpf = $data['cpf'];
        $newCustomer->name = $data['name'];
        $newCustomer->birth = $data['birth'];
        $newCustomer->gender = $data['gender'];
        $newCustomer->save();
        return $newCustomer;
    }

    public function updateCustomer(array $data, Customer $customer) 
    {
        $customer->cpf = $data['cpf'] ?? $customer->cpf;
        $customer->name = $data['name'] ?? $customer->name;
        $customer->birth = $data['birth'] ?? $customer->birth;
        $customer->gender = $data['gender'] ?? $customer->gender;
        $customer->save();
        return $customer;
    }
}
