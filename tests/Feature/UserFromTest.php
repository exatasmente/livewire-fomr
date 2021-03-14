<?php

namespace Tests\Feature;

use App\Actions\CreateUser;
use App\Http\Livewire\User\UserForm;
use App\Libraries\Address\AddressFinder;
use App\Models\User;
use App\Rules\CpfRule;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Livewire\Livewire;
use Tests\TestCase;

class UserFromTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function create_new_user()
    {
        $user = [
            'first_name' => 'test',
            'last_name' => 'user',
            'email' => 'test@example.com',
            'document' => '84342776030',
            'phone' => '88999999999',
            'password' => '12qwaszx',
            'password_confirmation' => '12qwaszx',
            'terms' => 'on',
        ];

        $address = [
            'line_1' => 'line 1',
            'line_2' => 'line 2',
            'neighborhood' => 'neighborhood',
            'number' => '1',
            'state' => 'state',
            'city' => 'city',
            'zipcode' => '11111111',
        ];

        Livewire::test(UserForm::class)
            ->set('user',$user)
            ->set('address', $address)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('open-notification')
            ->assertEmitted('success');

        $this->assertTrue(User::whereDocument(data_get($user,'document'))->exists());
        $this->assertTrue(User::whereEmail(data_get($user,'email'))->exists());
    }

    /** @test */
    public function update_user()
    {
        $userData = [
            'first_name' => 'test new',
            'last_name' => 'user new',
            'email' => 'testnew@example.com',
            'document' => '03370845059',
            'phone' => '88111111111',
        ];
        $addressData = [
            'line_1' => 'line 1 new',
            'line_2' => 'line 2 new',
            'neighborhood' => 'neighborhood new',
            'number' => '1 new',
            'state' => 'state new',
            'city' => 'city new',
            'zipcode' => '22222222',
        ];


        $user = resolve(CreateUser::class)->execute( [
            'first_name' => 'test',
            'last_name' => 'user',
            'email' => 'test@example.com',
            'document' => '84342776030',
            'phone' => '88999999999',
            'password' => '12qwaszx',
        ], [
            'line_1' => 'line 1',
            'line_2' => 'line 2',
            'neighborhood' => 'neighborhood',
            'number' => '1',
            'state' => 'state',
            'city' => 'city',
            'zipcode' => '11111111',
        ]);

        Livewire::test(UserForm::class)
            ->call('setUserToEdit', $user)
            ->set('user', $userData)
            ->set('address', $addressData)
            ->call('submit')
            ->assertHasNoErrors()
            ->assertDispatchedBrowserEvent('open-notification')
            ->assertEmitted('success');

        $user->refresh();
        $this->assertEquals($user->only([
            'first_name',
            'last_name',
            'email',
            'document',
            'phone',
        ]), $userData);

        $this->assertEquals($user->address->only([
            'line_1',
            'line_2',
            'neighborhood',
            'number',
            'state',
            'city',
            'zipcode',
        ]), $addressData);
    }

    /** @test */
    public function it_should_find_address_info_by_zipcode()
    {
        $zipcode = '70150903';
        $data = app(AddressFinder::class)->findAddress($zipcode);

        Livewire::test(UserForm::class)
            ->set('address.zipcode', $zipcode)
            ->assertSet('address.line_1', data_get($data,'line_1'))
            ->assertSet('address.line_2', data_get($data,'line_2'))
            ->assertSet('address.city', data_get($data,'city'))
            ->assertSet('address.state', data_get($data,'state'))
            ->assertSet('address.neighborhood', data_get($data,'neighborhood'));

    }

    /** @test */
    public function it_should_not_find_address_info_by_zipcode()
    {
        $zipcode = '999999999';

        Livewire::test(UserForm::class)
            ->set('address.zipcode', $zipcode)
            ->assertHasErrors(['address.zipcode'])
            ->assertSet('address.line_1', '')
            ->assertSet('address.line_2', '')
            ->assertSet('address.city', '')
            ->assertSet('address.state','')
            ->assertSet('address.neighborhood', '');
    }


    /** @test */
    public function it_should_not_create_user_email_unique()
    {
        resolve(CreateUser::class)->execute([
            'first_name' => 'test',
            'last_name' => 'user',
            'email' => 'test@example.com',
            'document' => '84342776030',
            'phone' => '88999999999',
            'password' => '12qwaszx',
        ], [
            'line_1' => 'line 1',
            'line_2' => 'line 2',
            'neighborhood' => 'neighborhood',
            'number' => '1',
            'state' => 'state',
            'city' => 'city',
            'zipcode' => '11111111',
        ]);

        $user = [
            'first_name' => 'test',
            'last_name' => 'user',
            'email' => 'test@example.com',
            'document' => '84342776030',
            'phone' => '88999999999',
            'password' => '12qwaszx',
            'password_confirmation' => '12qwaszx',
            'terms' => 'on',
        ];
        Livewire::test(UserForm::class)
            ->set('user',$user)
            ->call('submit')
            ->assertHasErrors(['user.email' => 'unique']);

    }

    /** @test */
    public function it_should_not_create_user_document_invalid()
    {
        $user = [
            'first_name' => 'test',
            'last_name' => 'user',
            'email' => 'test@example.com',
            'document' => '11111111111',
            'phone' => '88999999999',
            'password' => '12qwaszx',
            'password_confirmation' => '12qwaszx',
            'terms' => 'on',
        ];

        Livewire::test(UserForm::class)
            ->set('user',$user)
            ->call('submit')
            ->assertHasErrors(['user.document' => CpfRule::class]);

    }


    /** @test */
    public function it_should_not_create_user_password_needs_confirmation()
    {
        $user = [
            'first_name' => 'test',
            'last_name' => 'user',
            'email' => 'test@example.com',
            'document' => '11111111111',
            'phone' => '88999999999',
            'password' => '12qwaszx',
            'terms' => 'on',
        ];

        Livewire::test(UserForm::class)
            ->set('user',$user)
            ->call('submit')
            ->assertHasErrors(['user.password' => 'confirmed', 'user.password_confirmation' => 'required']);

    }

    /** @test */
    public function it_should_not_create_user_password_confirmation_must_be_same_as_password()
    {
        $user = [
            'first_name' => 'test',
            'last_name' => 'user',
            'email' => 'test@example.com',
            'document' => '11111111111',
            'phone' => '88999999999',
            'password' => '12qwaszx',
            'password_confirmation' => '12qwasz',
            'terms' => 'on',
        ];

        Livewire::test(UserForm::class)
            ->set('user',$user)
            ->call('submit')
            ->assertHasErrors(['user.password' => 'confirmed', 'user.password_confirmation' => 'same']);

    }

    /** @test */
    public function it_should_not_create_user_terms_must_be_accepted()
    {
        $user = [
            'first_name' => 'test',
            'last_name' => 'user',
            'email' => 'test@example.com',
            'document' => '11111111111',
            'phone' => '88999999999',
            'password' => '12qwaszx',
        ];

        Livewire::test(UserForm::class)
            ->set('user',$user)
            ->call('submit')
            ->assertHasErrors(['user.terms' => 'accepted']);

    }


}
