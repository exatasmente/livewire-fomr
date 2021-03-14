<?php


namespace App\Validators;


use App\Validators\Contracts\ValidatorInterface;

abstract class AbstractSaveUserValidator implements ValidatorInterface
{
    /**
     * @return mixed
     */
    protected abstract function editRules();

    /**
     * @return mixed
     */
    protected abstract function createRules();

    protected abstract function baseRules();

    /**
     * @return mixed
     */
    public abstract function rules();

    public abstract function validate(array $data): array;

}