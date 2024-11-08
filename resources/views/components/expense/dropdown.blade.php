{{-- resources/views/components/expense/dropdown.blade.php --}}
@props(['label','name', 'options', 'selected' => ''])
<div class="flex items-center space-x-4">
    <label class="pr-6 text-2xl">{{ $label }}</label>
    <select 
        name="{{ $name }}"
        class="w-48 p-2 text-2xl transition-shadow duration-200 border-none rounded shadow cursor-pointer bg-neutral-200 hover:shadow-md focus:outline-none"
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