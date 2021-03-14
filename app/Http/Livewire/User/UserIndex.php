<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    protected $listeners = [
        'new-user-created' => '$refresh'
    ];


    public function editUser($userId)
    {
        $this->emit('edit-user',$userId);
    }

    public function getUsersProperty()
    {
        return User::query()->simplePaginate(5);
    }

    public function render()
    {

        return view('livewire.user-index');
    }
}
