<?php
namespace App\Validators;

use App\Rules\CpfRule;
use Illuminate\Validation\Rule;

class UpdateUserValidator extends AbstractValidator
{
    protected $userId;
    protected $withAddress = false;

    public function withAddress(bool $value = true): self
    {
        $this->withAddress = $value;
        return $this;
    }

    public function setUser($userId) : self
    {
        $this->userId = $userId;
        return $this;
    }

    public function getRules()
    {
        $rules =  [
            'city' => ['required','string'],
            'email' => ['required','email', Rule::unique('users','document')->ignore($this->userId)],
            'first_name' => ['required','string','min:3'],
            'last_name' => ['required', 'string'],
            'document' => ['required', new CpfRule(), Rule::unique('users','document')->ignore($this->userId)],
            'phone' => ['required','digits_between:10,11'],
        ];

        if ($this->withAddress) {
            $addressRules = resolve(UpdateAddressValidator::class)->getRules();
            $rules += $addressRules;
        }

        return $rules;
    }

}