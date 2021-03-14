<?php


namespace App\Validators\Livewire;


use App\Rules\CpfRule;
use App\Validators\AbstractSaveUserValidator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SaveUserValidator extends AbstractSaveUserValidator
{
    private $userId;

    public function __construct($userId = null)
    {
        $this->userId = $userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    protected function editRules(): array
    {
        return [
            'user.email' => ['required','email', Rule::unique('users','document')->ignore($this->userId)],
            'user.document' => ['required', new CpfRule(), Rule::unique('users','document')->ignore($this->userId)],
        ];
    }

    /**
     * @return array
     */
    public function createRules(): array
    {
        return [
            'user.email' => ['required','email', 'unique:users,email'],
            'user.document' => ['required', new CpfRule(), 'unique:users,document'],
            'user.password' => ['required','string','min:4','confirmed'],
            'user.password_confirmation' => ['required','same:user.password'],
            'user.terms' => ['accepted'],
        ];
    }

    /**
     * @return array
     */
    protected function baseRules(): array
    {
        return [
            'user.first_name' => ['required','string','min:3'],
            'user.last_name' => ['required', 'string'],
            'user.phone' => ['required','digits_between:10,11'],
            'address.line_1' => ['required','string'],
            'address.line_2' => ['sometimes','string'],
            'address.neighborhood' => ['required','string'],
            'address.number' => ['nullable','string'],
            'address.state' => ['required', 'string'],
            'address.city' => ['required', 'string'],
            'address.zipcode' => ['required','digits:8'],
        ];
    }
    
    
    public function rules()
    {
        return array_merge_recursive($this->baseRules(),
            $this->userId !== null
                ? $this->editRules()
                : $this->createRules()
        );
    }

    /**
     * @param array $data
     * @return array
     * @throws ValidationException
     */
    public function validate($data): array
    {
        return \Validator::make($data, $this->rules())->validate();
    }

   
}