<?php


namespace App\Actions;


use App\Models\User;

class CreateOrUpdateAddress
{

    public function execute(User $user,$addressData)
    {

       return $user->address()
            ->updateOrCreate($addressData);
    }
}