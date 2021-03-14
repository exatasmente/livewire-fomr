@props(['disabled' => false, 'hasError' => false])
@php
 if ($attributes->has('mask')){
    $wire = $attributes->whereStartsWith('wire:model');

 }
 $attributes = $attributes->class(['w-full','shadow-sm','block','sm:text-sm', 'rounded-md','p-2','sm:text-sm','focus:ring-purple-500 focus:border-purple-300' => !$hasError, 'text-red-400 border-red-500 focus:border-red-300  focus:ring-red-500' => $hasError]);
@endphp

@if ($attributes->has('mask'))
 <input {{ $disabled ? 'disabled' : '' }} {{$attributes}} x-data="inputMask('{{$attributes->get('mask')}}') " x-init="init"  x-on:change="@this.set('{{$attributes->get('name')}}',$event.target.value)">
@else
 <input {{ $disabled ? 'disabled' : '' }} {{$attributes}}>
@endif
