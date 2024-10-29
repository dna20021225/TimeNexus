{{-- resources/views/components/expense/dropdown.blade.php --}}
@props(['label', 'options', 'selected' => ''])
<div class="flex items-center space-x-4">
    <label class="text-lg">{{ $label }}</label>
    <select class="w-48 p-2 bg-gray-100 border rounded">
        @foreach($options as $option)
            <option value="{{ $option }}" @selected($selected === $option)>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>