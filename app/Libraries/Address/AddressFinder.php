<?php


namespace App\Libraries\Address;


interface AddressFinder
{
    public function findAddress($zipcode);
}