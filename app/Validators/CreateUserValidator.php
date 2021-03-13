<?php
namespace App\Validators;

use App\Rules\CpfRule;

class CreateUserValidator extends AbstractValidator
{
    protected $withAddress = false;

    public function withAddress(bool $value = true): self
    {
        $this->withAddress = $value;
        return $this;
    }

    public function getRules()
    {
        $rules = [
            'city' => ['required','string'],
            'email' => ['required','email', 'unique:users,email'],
            'first_name' => ['required','string','min:3'],
            'last_name' => ['required', 'string'],
            'document' => ['required', new CpfRule(), 'unique:users,document'],
            'phone' => ['required','digits_between:10,11'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required','same:password'],
            'terms' => ['required','accepted'],
        ];

        if ($this->withAddress) {
            $addressRules = resolve(CreateAddressValidator::class)->getRules();
            $rules += $addressRules;
        }

        return $rules;
    }

}