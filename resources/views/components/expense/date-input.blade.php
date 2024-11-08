{{-- resources/views/components/expense/date-input.blade.php --}}
@props(['label', 'value' => now()->format('Y-m-d')])
<div class="flex items-center space-x-4">
    <label class="text-2xl">{{ $label }}</label>
    <input 
        type="date" 
        value="{{ $value }}" 
        class="w-1/4 py-3 text-2xl transition-shadow duration-200 border rounded shadow 0 hover:shadow-md"
    >
</div>