@props([
    'type' => 'button',
    'label' => 'ボタン',
    'href' => null,
    'form' => null,
])

<button 
    type="{{ $type }}"
    @if($form) form="{{ $form }}" @endif
    @if($href) onclick="window.location.href='{{ $href }}'" @endif
    @class([
        'px-8 py-1 text rounded-lg border transition-all duration-200 w-[350px] h-[40px]',
        'bg-neutral-100 border-gray-200 hover:bg-gray-50 shadow-sm hover:shadow-xl'
    ])
>
    {{ $label }}
</button>