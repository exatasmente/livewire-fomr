<?php
namespace App\Validators;

class UpdateAddressValidator extends AbstractValidator
{
    public function getRules()
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