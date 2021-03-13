<?php


namespace App\Actions;


use App\Models\User;

class UpdateUser
{


    public function execute(User $user, $userData, $addressData = [])
    {

        if ($addressData) {
            resolve(CreateOrUpdateAddress::class)->execute($user, $addressData);
        }

        $user->fill($userData);

        if ($user->isDirty()) {
            $user->save();
        }

        $user->load(['address']);

        return $user;
    }
}