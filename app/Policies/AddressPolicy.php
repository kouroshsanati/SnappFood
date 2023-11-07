<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Address;

class AddressPolicy
{

    public function myAddress(User $user, Address $address) :bool
    {
        return $user->addresses->contains($address);
    }
}
