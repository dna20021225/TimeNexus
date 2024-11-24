{{-- resources/views/components/expense/date-input.blade.php --}}
@props(['label', 'value' => '日本製鉄株式会社'])
<div class="flex items-center space-x-4">
    <label class="text-2xl">{{ $label }}</label>
    <div 
    class="w-1/4 p-2 text-2xl transition-shadow duration-200 border-none rounded shadow cursor-pointer bg-neutral-200 hover:shadow-md focus:outline-none"
    >
        {{ $value }}
    </div>
</div>