<?php


namespace App\Actions;


use App\Models\Address;
use App\Models\User;

class CreateOrUpdateAddress
{

    public function execute(User $user, $addressData)
    {
        /** @var Address $address */
       $address = $user->address;

       if ($address) {
           $address->fill($addressData);

           if ($address->isDirty()) {
               $address->save();
           }

       } else {
           $address = $user->address()->create($addressData);
       }
        return $address;
    }
}