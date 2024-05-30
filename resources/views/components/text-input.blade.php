@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 input input-primary border-primary rounded-md shadow-sm']) !!}>
