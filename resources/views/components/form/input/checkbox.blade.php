@props(['disabled' => false, 'hasError' => false])
<input type="checkbox" {{ $disabled ? 'disabled' : '' }} {{ $attributes->class(['focus:ring-purple-500', 'h-4 w-4', 'rounded','border-gray-500 text-purple-600' => !$hasError, 'border-red-500' => $hasError])}}>
