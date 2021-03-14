<?php


namespace App\Validators\Contracts;


interface ValidatorInterface
{
    /**
     * @return mixed
     */
    public function rules();

    /**
     * @param array $data
     * @return array
     */
    public function validate(array $data) : array;


}