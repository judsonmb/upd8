<?php

namespace App\Services;

use App\Models\Address;

class AddressService
{
    public function storeAddress(array $data, int $customerId) 
    {
        $newAddress = new Address();
        $newAddress->street = $data['street'] ?? null;
        $newAddress->city_id = $data['city_id'];
        $newAddress->customer_id = $customerId;
        $newAddress->save();
        return $newAddress;
    }
}
