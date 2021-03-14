

<x-form submit="submit">
    <x-slot name="title">
        {{ __('User Basic Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('This is an description for fields below') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-8 flex-wrap md:flex-nowrap flex space-x-0 space-y-2 md:space-y-0  md:space-x-2 justify-around">
            <div class="w-full md:w-6/12">
            <x-form.field wire:model.lazy="user.first_name" type="text" name="user.first_name" required placeholder="{{__('First Name')}}" label="{{__('First Name')}}" hasError="{{$this->getErrorBag()->has('user.first_name')}}"></x-form.field>
            </div>
            <div class="w-full md:w-6/12">
            <x-form.field wire:model.lazy="user.last_name" type="text" name="user.last_name" required placeholder="{{__('Last Name')}}" label="{{__('Last Name')}}" hasError="{{$this->getErrorBag()->has('user.last_name')}}"></x-form.field>
            </div>
        </div>
        <div class="col-span-8">
            <x-form.field wire:model.lazy="user.email" name="user.email" type="email" required placeholder="email@example.com" label="{{__('Email')}}" hasError="{{$this->getErrorBag()->has('user.email')}}" class="w-full"></x-form.field>
        </div>
        <div class="col-span-8">
            <x-form.field wire:model.lazy="user.document" mask="999.999.999-99" required name="user.document" type="text" placeholder="000.000.000-00" label="{{__('CPF')}}" hasError="{{$this->getErrorBag()->has('user.document')}}"></x-form.field>
        </div>
        <div class="col-span-8">
            <x-form.field wire:model.lazy="user.phone" mask="(99) 9 9999-9999" required name="user.phone" type="text" placeholder="(99) 9 9999-9999" label="{{__('Phone')}}" hasError="{{$this->getErrorBag()->has('user.phone')}}"></x-form.field>
        </div>
        <div  class="col-span-8 space-y-1">
            <x-form.field wire:model.lazy="address.zipcode" mask="99999-999" required name="address.zipcode" placeholder="00000-000" type="text" label="{{__('Zipcode')}}" hasError="{{$this->getErrorBag()->has('address.zipcode')}}"></x-form.field>
        </div>
        <div wire:loading.class="animate-pulse"  wire:target="address.zipcode" class="col-span-8 flex-wrap md:flex-nowrap flex space-x-0 space-y-2 md:space-y-0  md:space-x-2 justify-around">
            <div class="w-full md:w-4/12">
                <x-form.field wire:model.lazy="address.state" name="address.state" required type="text" label="{{__('State')}}" placeholder="{{__('State')}}" hasError="{{$this->getErrorBag()->has('address.state')}}"></x-form.field>
            </div>
            <div class="w-full md:w-4/12">
                <x-form.field wire:model.lazy="address.city" name="address.city" required type="text" label="{{__('City')}}" placeholder="{{__('City')}}" hasError="{{$this->getErrorBag()->has('address.city')}}"></x-form.field>
            </div>
            <div class="w-full md:w-4/12">
                <x-form.field wire:model.lazy="address.neighborhood" name="address.neighborhood" required type="text" label="{{__('Neighborhood')}}" placeholder="{{__('Neighborhood')}}" hasError="{{$this->getErrorBag()->has('address.city')}}"></x-form.field>
            </div>
        </div>
        <div wire:loading.class="animate-pulse"  wire:target="address.zipcode" class="col-span-8 space-y-1">
            <x-form.field  wire:model.lazy="address.line_1" name="address.line_1" required type="text" label="{{__('Address Line 1')}}" placeholder="{{__('Your Address line 1')}}" hasError="{{$this->getErrorBag()->has('address.line_1')}}" ></x-form.field>
        </div>
        <div  wire:loading.class="animate-pulse"  wire:target="address.zipcode" class="col-span-8 flex-wrap md:flex-nowrap flex space-x-0 space-y-2 md:space-y-0  md:space-x-2 justify-around">
            <div class="w-full md:w-10/12">
                <x-form.field wire:model.lazy="address.line_2" name="address.line_2" type="text" label="{{__('Address Line 2')}}" placeholder="{{__('Your Address line 2')}}" hasError="{{$this->getErrorBag()->has('address.line_2')}}" ></x-form.field>
            </div>
            <div class="w-full md:w-2/12">
            <x-form.field wire:model.lazy="address.number" name="address.number" type="text" label="{{__('Number')}}" placeholder="N/A" hasError="{{$this->getErrorBag()->has('address.number')}}" ></x-form.field>
            </div>
        </div>

        @if (!$this->isEdit())
            <div class="col-span-8 flex-wrap md:flex-nowrap flex space-x-0 space-y-2 md:space-y-0  md:space-x-2 justify-around">
                <div class="w-full md:w-6/12">
                    <x-form.field wire:model.lazy="user.password" name="user.password" required type="password" label="{{__('Password')}}" hasError="{{$this->getErrorBag()->has('user.password')}}"></x-form.field>
                </div>
                <div class="w-full md:w-6/12">
                    <x-form.field wire:model.lazy="user.password_confirmation" type="password" required name="user.password_confirmation" label="{{__('Confirm Password')}}" hasError="{{$this->getErrorBag()->has('user.password_confirmation')}}"></x-form.field>
                </div>
            </div>

        <div class="col-span-8">
            <div class="justify-self-start gap-3 flex flex-wrap">
                <x-form.field name="user.terms">
                    <x-slot name="inputLabel"></x-slot>
                    <x-slot name="input">
                        <div class="flex space-x-2 align-text-top leading-tight ">
                            <x-form.input.checkbox required hasError="{{$this->getErrorBag()->has('user.terms')}}" wire:model.lazy="user.terms"></x-form.input.checkbox>
                            <x-form.label for="user.terms" class="text-1xl">{{ __('Accept Terms of Use') }}*</x-form.label>
                        </div>
                    </x-slot>
                </x-form.field>
            </div>
        </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-layout.action-message class="mr-3" on="success">
            {{ __($this->isEdit() ? 'Updated' : 'Created') }}
        </x-layout.action-message>

        <x-layout.button  wire:loading.class="animate-pulse" >
            {{ __($this->isEdit() ? 'Update' : 'Create') }}
        </x-layout.button>
    </x-slot>
</x-form>

