<x-form-section submit="submit">
    <x-slot name="title">
        {{ __('User Basic Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('This is an description for fields below') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-8 flex-wrap md:flex-no-wrap flex gap-1 justify-around">
            <div class="w-full md:w-6/12">
                <x-form.field wire:model="first_name" type="text" name="first_name" placeholder="{{__('First Name')}}" label="{{__('First Name')}}" hasError="{{$this->getErrorBag()->has('first_name')}}"></x-form.field>
            </div>
            <div class="w-full md:w-6/12">
                <x-form.field wire:model="last_name" type="text" name="last_name" placeholder="{{__('Last Name')}}" label="{{__('Last Name')}}" hasError="{{$this->getErrorBag()->has('last_name')}}"></x-form.field>
            </div>
        </div>
        <div class="col-span-8">
            <x-form.field wire:model="email" name="email" type="email" placeholder="email@example.com" label="{{__('Email')}}" hasError="{{$this->getErrorBag()->has('email')}}"></x-form.field>
        </div>
        <div class="col-span-8">
            <x-form.field wire:model="document" x-data="inputMask('999.999.999-99','document')" x-init="init" name="document" type="text" placeholder="000.000.000-00" label="{{__('CPF')}}" hasError="{{$this->getErrorBag()->has('document')}}"></x-form.field>
        </div>
        <div class="col-span-8">
            <x-form.field wire:model="phone" x-data="inputMask('(99) 9 9999-9999','phone')" x-init="init()"  name="phone" type="text" placeholder="(99) 9 9999-9999" label="{{__('Phone')}}" hasError="{{$this->getErrorBag()->has('phone')}}"></x-form.field>
        </div>
        <div class="col-span-8">
            <x-form.field wire:model="zipcode" x-data="inputMask('99999-999','zipcode')" x-init="init()" name="zipcode" placeholder="00000-000" type="text" label="{{__('Zipcode')}}" hasError="{{$this->getErrorBag()->has('zipcode')}}"></x-form.field>
        </div>
        <div class="col-span-8 flex-wrap md:flex-no-wrap flex gap-1 justify-around">
            <div class="w-full lg:w-5/12">
                <x-form.field wire:model="state" name="state" type="text" label="{{__('State')}}" placeholder="{{__('State')}}" hasError="{{$this->getErrorBag()->has('state')}}"></x-form.field>
            </div>
            <div class="w-full lg:w-5/12">
                <x-form.field wire:model="city" name="city" type="text" label="{{__('City')}}" placeholder="{{__('City')}}" hasError="{{$this->getErrorBag()->has('city')}}"></x-form.field>
            </div>
            <div class="w-full lg:w-5/12">
                <x-form.field wire:model="neighborhood" name="neighborhood" type="text" label="{{__('Neighborhood')}}" placeholder="{{__('Neighborhood')}}" hasError="{{$this->getErrorBag()->has('city')}}"></x-form.field>
            </div>
        </div>
        <div class="col-span-8 flex-wrap md:flex-no-wrap flex gap-1 justify-around">
            <div class="w-full lg:w-5/12">
                <x-form.field wire:model="line_1" name="line_1" type="text" label="{{__('Address Line 1')}}" placeholder="{{__('Your Address line 1')}}" hasError="{{$this->getErrorBag()->has('line_1')}}" ></x-form.field>
            </div>
            <div class="w-full lg:w-5/12">
                <x-form.field wire:model="line_2" name="line_2" type="text" label="{{__('Address Line 2')}}" placeholder="{{__('Your Address line 2')}}" hasError="{{$this->getErrorBag()->has('line_2')}}" ></x-form.field>
            </div>
            <div class="w-full lg:w-2/12">
                <x-form.field wire:model="number" name="number" type="text" label="{{__('Number')}}" placeholder="N/A" hasError="{{$this->getErrorBag()->has('number')}}" ></x-form.field>
            </div>
        </div>
        @if (!$this->isEdit())
            <div class="col-span-8 flex-wrap md:flex-no-wrap flex gap-1 justify-around">
                <div class="w-full md:w-6/12">
                    <x-form.field wire:model="password" name="password" type="password" label="{{__('Password')}}" hasError="{{$this->getErrorBag()->has('password')}}"></x-form.field>
                </div>
                <div class="w-full md:w-6/12">
                    <x-form.field wire:model="password_confirmation" type="password" field="password_confirmation" name="password_confirmation" label="{{__('Confirm Password')}}" hasError="{{$this->getErrorBag()->has('password_confirmation')}}"></x-form.field>
                </div>
            </div>

        <div class="col-span-8">
            <div class="justify-self-start gap-3 flex flex-wrap">
                <x-input.checkbox hasError="{{$this->getErrorBag()->has('terms')}}" wire:model="terms" class="form-checkbox h-8 w-8 text-purple-600"></x-input.checkbox>
                <x-label for="terms" class="flex items-center leading-5 text-sm">
                    <a href="#" class="text-purple-400"> {{ __('Accept Terms of Use') }}</a>
                </x-label>
            </div>
            <x-input-error for="terms"></x-input-error>
        </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="success">
            {{ __($this->isEdit() ? 'Updated' : 'Created') }}
        </x-action-message>

        <x-button wire:loading.class="animate-pulse" class="bg-purple-500">
            {{ __($this->isEdit() ? 'Update' : 'Create') }}
        </x-button>
    </x-slot>
</x-form-section>

