@props(['disabled' => false, 'hasError' => false])
@php
 if ($attributes->has('mask')){
    $wire = $attributes->whereStartsWith('wire:model');

 }
 $attributes = $attributes->class(['focus:outline-none','p-2','focus:border','rounded-md', 'shadow-sm', 'border border-purple-400 focus:border-purple-500' => !$hasError, 'text-red-400 border border-red-500 focus:border-red-500' => $hasError]);
@endphp

@if ($attributes->has('mask'))
 <input {{ $disabled ? 'disabled' : '' }} {{$attributes}} x-data="inputMask('{{$attributes->get('mask')}}') " x-init="init"  x-on:change="@this.set('{{$attributes->get('name')}}',$event.target.value)">
@else
 <input {{ $disabled ? 'disabled' : '' }} {{$attributes}}>
@endif
