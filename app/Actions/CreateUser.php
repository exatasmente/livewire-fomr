<?php


namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class CreateUser
{

    private CreateOrUpdateAddress $createAddress;

    public function __construct(CreateOrUpdateAddress $createAddress)
    {
        $this->createAddress = $createAddress;
    }

    public function execute($userData, $addressData)
    {
        data_set($userData,'password', bcrypt(data_get($userData,'password')));

        return DB::transaction(function () use ($userData, $addressData){
            /** @var User $user */
            $user = User::query()
                ->create($userData);

            $this->createAddress->execute($user, $addressData);

            $user->load(['address']);

            return $user;
        });

    }
}