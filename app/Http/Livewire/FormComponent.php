<?php


namespace App\Http\Livewire;


use App\Validators\Contracts\ValidatorInterface;
use Livewire\Component;

abstract class FormComponent extends Component
{
    /** @var ValidatorInterface */
    protected $validator;


    abstract protected function isEdit();

}