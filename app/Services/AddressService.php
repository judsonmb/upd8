<?php

namespace App\Services;

use App\Models\Address;

class AddressService
{
    public function storeAddress(array $data, int $customerId) 
    {
        $newAddress = new Address();
        $newAddress->address = $data['address'] ?? null;
        $newAddress->city_id = $data['city_id'];
        $newAddress->customer_id = $customerId;
        $newAddress->save();
        return $newAddress;
    }

    public function updateAddress(array $data, int $customerId) 
    {
        $address = Address::where('customer_id', $customerId)->first();
        $address->address = $data['address'] ?? $address->address;
        $address->city_id = $data['city_id'] ?? $address->city_id;
        $address->customer_id = $data['customer_id'] ?? $address->customer_id;
        $address->save();
        return $address;
    }
}
