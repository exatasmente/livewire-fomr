<?php


namespace App\Validators\Livewire;


use App\Rules\CpfRule;
use App\Validators\AbstractFormValidator;
use Illuminate\Validation\Rule;

/**
 * Class SaveUserValidator
 * @package App\Validators\Livewire
 */
class SaveUserValidator extends AbstractFormValidator
{
    /**
     * @var null
     */
    private $userId;

    /**
     * SaveUserValidator constructor.
     * @param null $userId
     */
    public function __construct($userId = null)
    {
        $this->userId = $userId;
    }

    /**
     * @param $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * {@inheritdoc}
     */
    protected function editRules(): array
    {
        return [
            'user.email' => ['required','email', Rule::unique('users','document')->ignore($this->userId)],
            'user.document' => ['required', new CpfRule(), Rule::unique('users','document')->ignore($this->userId)],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function createRules(): array
    {
        return [
            'user.email' => ['required','email', 'unique:users,email'],
            'user.document' => ['required', new CpfRule(), 'unique:users,document'],
            'user.password' => ['required','string','min:4'],
            'user.password_confirmation' => ['required','same:user.password'],
            'user.terms' => ['accepted'],
        ];
    }

    /**
     * {@inheritdoc}
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
            'address.number' => ['nullable','string','max:10'],
            'address.state' => ['required', 'string'],
            'address.city' => ['required', 'string'],
            'address.zipcode' => ['required','digits:8'],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge_recursive($this->baseRules(),
            $this->userId !== null
                ? $this->editRules()
                : $this->createRules()
        );
    }


   
}