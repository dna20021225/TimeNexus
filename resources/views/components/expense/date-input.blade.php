{{-- resources/views/components/expense/date-input.blade.php --}}
@props(['label', 'value' => now()->format('Y-m-d')])
<div class="flex items-center space-x-4">
    <label class="text-2xl">{{ $label }}</label>
    <input 
        type="date" 
        name="date"
        value="{{ $value }}" 
        readonly
        class="w-1/4 py-3 text-2xl transition-shadow duration-200 bg-gray-100 border rounded shadow cursor-not-allowed 0 hover:shadow-md"
    >
</div>