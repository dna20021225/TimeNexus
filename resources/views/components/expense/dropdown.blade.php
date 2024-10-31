{{-- resources/views/components/expense/dropdown.blade.php --}}
@props(['label', 'options', 'selected' => ''])
<div class="flex items-center space-x-4">
    <label class="text-2xl">{{ $label }}</label>
    <select 
        class="w-48 p-2 text-2xl bg-white border border-gray-200 rounded shadow-[0_2px_4px_rgba(0,0,0,0.1)] hover:shadow-[0_4px_8px_rgba(0,0,0,0.1)] transition-shadow duration-200 focus:outline-none cursor-pointer"
    >
        @foreach($options as $option)
            <option 
                value="{{ $option }}" 
                @selected($selected === $option)
            >
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>