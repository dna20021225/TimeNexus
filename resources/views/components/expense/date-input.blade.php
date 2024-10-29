{{-- resources/views/components/expense/date-input.blade.php --}}
@props(['label', 'value' => 'today'])
<div class="flex items-center space-x-4">
    <label class="text-lg">{{ $label }}</label>
    <input type="text" value="{{ $value }}" class="w-full p-2 border rounded">
</div>