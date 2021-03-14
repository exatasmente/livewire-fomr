@props(['disabled' => false, 'hasError' => false])
@php
 if ($attributes->has('mask')){
    $wire = $attributes->whereStartsWith('wire:model');

    $attributes = $attributes->merge(['x-data' => 'inputMask(\''. $attributes->get('mask') .'\', {callback : (value) => { value &&  $wire.set(\'' . $wire->first() . '\', value)} })',  'x-init' => 'init']);
    $attributes = $attributes->except(array_keys($wire->getAttributes()))->merge(['wire:model.defer' => $wire->first()]);
 }

 $attributes = $attributes->class(['focus:outline-none','p-2','focus:border','rounded-md', 'shadow-sm', 'border border-purple-400 focus:border-purple-500' => !$hasError, 'text-red-400 border border-red-500 focus:border-red-500' => $hasError]);
@endphp

<input {{ $disabled ? 'disabled' : '' }} {{$attributes}}>