@props(['label' => ''])
<div class="transition-colors duration-200">
    @if(isset($inputLabel))
        {{$inputLabel}}
    @else
        <x-form.label for="{{$attributes->get('name')}}" class="block truncate leading-5 text-sm font-medium text-gray-700">{{ $label . ($attributes->has('required') ? '*' : '') }}</x-form.label>
    @endif
    <div class="mt-1 relative rounded-md">
        @if(isset($input))
            {{$input}}
        @else
            <x-form.input {{$attributes}}></x-form.input>
            @error($attributes->get('name'))
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
            @enderror
        @endif
    </div>
    @if(isset($inputError))
        {{$inputError}}
    @else
        <x-form.input-error for="{{$attributes->get('name')}}"></x-form.input-error>
    @endif
</div>