{{-- resources/views/components/checkbox-with-label.blade.php --}}
@props([
    'name',
    'label',
    'value' => '1',
    'checked' => false,
    'disabled' => false,
    'required' => false,
    'id' => null,
])

@php
    $id = $id ?? $name;
@endphp

<div class="flex items-center h-10 px-1 space-x-2 w-60">
    <input
        type="checkbox"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        {{ $checked ? 'checked' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'w-6 h-6 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}
    >
    <label for="{{ $id }}" class="text-xl text-gray-900 select-none">
        {{ $label }}
    </label>
</div>