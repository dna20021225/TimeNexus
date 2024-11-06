{{-- resources/views/components/expense/date-input.blade.php --}}
@props(['label', 'value' => now()->format('Y-m-d')])
<div class="flex items-center space-x-4">
    <label class="text-2xl">{{ $label }}</label>
    <input 
        type="date" 
        value="{{ $value }}" 
        class="w-1/4 py-3 text-2xl border border-gray-200 rounded bg-white shadow-[0_2px_4px_rgba(0,0,0,0.1)] hover:shadow-[0_4px_8px_rgba(0,0,0,0.1)] transition-shadow duration-200"
    >
</div>