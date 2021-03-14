@props(['disabled' => false, 'hasError' => false])
<input type="checkbox" {{ $disabled ? 'disabled' : '' }} {{ $attributes->class(['p-2','form-input','rounded-md','border','transition-colors', 'duration-200', 'border-gray-500' => !$hasError, 'border-red-500' => $hasError])}}>
