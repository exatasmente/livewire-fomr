<?php
namespace App\Validators;

class CreateAddressValidator extends AbstractValidator
{
    public function getRules() : array
    {
        return [
            'line_1' => ['required','string'],
            'line_2' => ['required','string'],
            'neighborhood' => ['required','string'],
            'number' => ['nullable','string'],
            'state' => ['required', 'string'],
            'zipcode' => ['required','digits:8'],
        ];
    }

}