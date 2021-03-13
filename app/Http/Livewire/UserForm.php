<?php

namespace App\Http\Livewire;

use App\Actions\CreateUser;
use App\Actions\UpdateUser;
use App\Models\User;
use App\Rules\CpfRule;
use App\Validators\CreateUserValidator;
use App\Validators\UpdateUserValidator;
use App\View\Components\App;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Livewire\Component;

class UserForm extends Component
{
    public $userId;
    public $first_name;
    public $last_name;
    public $email;
    public $document;
    public $phone;
    public $zipcode;
    public $state;
    public $city;
    public $line_1;
    public $line_2;
    public $neighborhood;
    public $number;

    public $password;
    public $password_confirmation;
    public $terms;

    protected $listeners = [
        'edit-user' => 'setUserToEdit',
    ];

    public function mount($user = null)
    {
        $this->userId = null;
        if ($user) {
            $this->userId = $user->id;
            $this->setUserToEdit($user);
        }


    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected function getRules()
    {
        return $this->isEdit()
            ? resolve(UpdateUserValidator::class)
                ->setUser($this->userId)
                ->withAddress()
                ->getRules()
            : resolve(CreateUserValidator::class)
                ->withAddress()
                ->getRules();
    }

    public function submit()
    {

        $attributes = $this->validate();

        $userData = Arr::only($attributes, [
            'document',
            'email',
            'first_name',
            'last_name',
            'password',
            'phone',

        ]);

        $addressData = Arr::only($attributes, [
            'city',
            'line_1',
            'line_2',
            'neighborhood',
            'number',
            'state',
            'zipcode',
        ]);


        if ($this->isEdit()) {
            $user = resolve(UpdateUser::class)->execute($this->getUserProperty(), $addressData);
        } else {
            $user = resolve(CreateUser::class)->execute($userData, $addressData);
        }

        if ($user) {
            $message = trans('user-'. ($user->wasRecentlyCreated ? 'created' : 'updated'), ['email' => $user->email, 'id' => $user->id]);
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

        if ($addressData = $user->address) {
            $attributes += $addressData->only([
                'city',
                'line_1',
                'line_2',
                'neighborhood',
                'number',
                'state',
                'zipcode',
            ]);
        }
        $this->fill($attributes);

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
