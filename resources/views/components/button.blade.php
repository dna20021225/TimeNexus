{{-- resources/views/components/expense/button.blade.php --}}
@props([
    'type' => 'button',
    'variant' => 'default',
    'href' => null,
    'form' => null,
])

<button 
    type="{{ $type }}"
    @if($form) form="{{ $form }}" @endif
    @if($href) onclick="window.location.href='{{ $href }}'" @endif
    @class([
        'px-8 py-4 text-2xl rounded-lg border transition-all duration-200 w-[150px] h-[80px]',
        'bg-gray-100 border-gray-200 hover:bg-gray-50 shadow-[0_4px_6px_rgba(0,0,0,0.1)] hover:shadow-[0_6px_12px_rgba(0,0,0,0.1)]' => $variant === 'default',
        'text-white border-[#0BA9F3] shadow-[0_4px_6px_rgba(11,169,243,0.3)] hover:shadow-[0_6px_12px_rgba(11,169,243,0.4)] bg-gradient-to-b from-[#0BA9F3] to-[#57CAF1] hover:from-[#1CB4F4] hover:to-[#67D0F2]' => $variant === 'primary'
    ])
>
    {{ $slot }}
</button>