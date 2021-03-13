@props(['disabled' => false, 'hasError' => false])
<input {{$attributes->get('wire:model')}} {{ $disabled ? 'disabled' : '' }} {{ $attributes->class(['focus:outline-none','p-2','focus:border','rounded-md', 'shadow-sm', 'border border-purple-400 focus:border-purple-500' => !$hasError, 'text-red-400 border border-red-500 focus:border-red-500' => $hasError])}}>
