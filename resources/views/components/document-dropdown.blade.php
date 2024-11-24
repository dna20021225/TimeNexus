{{-- resources/views/components/document-dropdown.blade.php --}}
<div x-data="{ open: false }" class="relative w-[230px]">
    {{-- ボタン --}}
    <button 
        @click="open = !open" 
        type="button"
        class="flex items-center px-4 py-6 text-2xl border border-gray-300 rounded-lg bg-neutral-200 w-full h-[80px]"
    >
        <span class="flex-1 text-center">{{ $category }}</span>
        <span 
            class="transition-transform duration-300 transform"
            :class="{ '-rotate-90': open }"
        >◀</span>
    </button>

    {{-- ドロップダウンリスト --}}
    <div 
        x-show="open"
        @click.outside="open = false"
        class="absolute left-0 z-50 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg max-h-[200px] overflow-y-auto"
    >
        @foreach($items as $id => $item)
            <a 
                href="{{ route('documents.show', ['category' => $category, 'id' => $id]) }}" 
                class="block px-4 py-2 text-lg text-center truncate border-b border-gray-200 hover:bg-gray-100 last:border-b-0"
            >
                {{ $item }}
            </a>
        @endforeach
    </div>
</div>