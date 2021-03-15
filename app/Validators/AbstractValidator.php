<?php
namespace App\Validators;


use App\Validators\Contracts\ValidatorInterface;
use Illuminate\Validation\ValidationException;

/**
 * Class AbstractValidator
 * @package App\Validators
 */
abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * {@inheritdoc}
     * @throws ValidationException
     */
    public function validate($data): array
    {
        return \Validator::make($data, $this->rules())->validate();
    }


    /**
     * {@inheritdoc}
     */
    public abstract function rules();

}