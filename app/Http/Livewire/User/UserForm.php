<?php

namespace App\Http\Livewire\User;

use App\Actions\CreateUser;
use App\Actions\SaveUser;
use App\Actions\UpdateUser;
use App\Http\Livewire\FormComponent;
use App\Models\Address;
use App\Models\User;
use App\Validators\Livewire\SaveUserValidator;

class UserForm extends FormComponent
{
    protected $validator;

    public $userId;
    public $user = [
        'first_name',
        'last_name',
        'email',
        'document',
        'phone',
        'password',
        'password_confirmation',
        'terms',
    ];

    public $address = [
        'zipcode',
        'state',
        'city',
        'line_1',
        'line_2',
        'neighborhood',
        'number',
    ];

    protected $listeners = [
        'edit-user' => 'setUserToEdit',
    ];

    public function mount($user = null)
    {
        $this->userId = null;
        $this->validator = SaveUserValidator::class;

        if ($user) {
            $this->userId = $user->id;
            $this->setUserToEdit($user);
        }


    }

    /**
     * @return array
     */
    protected function getRules()
    {
        return resolve(SaveUserValidator::class)->setUserId($this->userId)->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        if ($this->isEdit()) {
            $user = resolve(UpdateUser::class)->execute($this->getUserProperty(), $this->user, $this->address);
        } else {
            $user = resolve(CreateUser::class)->execute($this->user,$this->address);
        }

        if ($user) {
            $message = trans('notifications.user-'. ($user->wasRecentlyCreated ? 'created' : 'updated'), ['email' => $user->email, 'id' => $user->id]);
            $this->dispatchBrowserEvent('open-notification', ['type' => 'success', 'message' => $message]);
            $this->emitSelf('success');

            if (!$this->isEdit()) {
                $this->reset();
            }

        }
    }

    public function setUserToEdit(User $user)
    {
        $attributes = $user->only([
            'first_name',
            'last_name',
            'email',
            'password',
            'document',
            'phone',
        ]);
        $this->user = $attributes;

        /** @var Address $address */
        if ($address = $user->address) {
            $this->address = $address->only([
                'city',
                'line_1',
                'line_2',
                'neighborhood',
                'number',
                'state',
                'zipcode',
            ]);
        }
    }

    public function render()
    {

        return view('livewire.user-form');
    }

    public function isEdit()
    {
        return $this->userId != null;
    }
    /**
     * @return mixed
     */
    public function getUserProperty()
    {
        return $this->isEdit() ? User::query()->find($this->userId) : null;
    }


}
