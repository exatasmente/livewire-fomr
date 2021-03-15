<?php


namespace App\Validators;

/**
 * Class AbstractFormValidator
 * @package App\Validators
 */
abstract class AbstractFormValidator extends AbstractValidator
{
    /**
     * @return mixed
     */
    protected abstract function editRules();

    /**
     * @return mixed
     */
    protected abstract function createRules();

    /**
     * @return mixed
     */
    protected abstract function baseRules();

}