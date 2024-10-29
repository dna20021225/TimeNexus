{{-- resources/views/components/expense/button.blade.php --}}
@props(['type' => 'button', 'variant' => 'default'])
<button 
    type="{{ $type }}"
    @class([
        'px-6 py-2 rounded',
        'bg-gray-200 hover:bg-gray-300' => $variant === 'default',
        'bg-blue-500 text-white hover:bg-blue-600' => $variant === 'primary'
    ])
>
    {{ $slot }}
</button>