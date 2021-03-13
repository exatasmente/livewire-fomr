<?php


namespace App\Validators;


interface ValidatorInterface
{
    /**
     * @return mixed
     */
    public function messages();

    /**
     * @return mixed
     */
    public function rules();

    /**
     * @return mixed
     */
    public function validate();

    /**
     * @return mixed
     */
    public function getRules();

    /**
     * @param $data
     * @return mixed
     */
    public function setData($data);

}