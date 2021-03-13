<?php
namespace App\Validators;


use Illuminate\Support\Facades\Validator;

abstract class AbstractValidator implements ValidatorInterface
{
    protected $validator;

    /**
     * @param $data
     * @return self
     */
    public function setData($data) : self
    {
        $this->validator = Validator::make(
            $data,
            $this->rules(),
            $this->messages()
        );
        return $this;
    }

    public function validate() {
        return $this->validator->validate();
    }


    /**
     * @return array
     */
    public function rules(): array
    {
        return [];
    }


    /**
     * @return array
     */
    public function messages(): array
    {
        return [];
    }
}