<?php


namespace App\Validators\Contracts;


/**
 * Interface ValidatorInterface
 * @package App\Validators\Contracts
 */
interface ValidatorInterface
{
    /**
     * @return mixed
     */
    public function rules();

    /**
     * @param array $data
     * @return mixed
     */
    public function validate(array $data);


}