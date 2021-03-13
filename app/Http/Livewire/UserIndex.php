<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{

    protected $listeners = [
        'new-user-created' => '$refresh'
    ];



    public function editUser($userId)
    {
        $this->emitUp('edit-user',$userId);
    }

    public function render()
    {

        return view('livewire.user-index');
    }
}
