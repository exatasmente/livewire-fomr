<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{

    protected $listeners = [
        'new-user-created' => '$refresh'
    ];


    public function editUser($userId)
    {
        $this->redirect(route('users.edit',['id' => $userId]));
    }

    public function getUsersProperty()
    {
        return User::query()->paginate();
    }

    public function render()
    {

        return view('livewire.user-index');
    }
}
