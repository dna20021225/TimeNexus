<x-app-layout>
    <x-container>            
        <x-white-background-card>
            <div class="mb-12">
                <div class="flex items-center h-20 space-x-20">
                    <x-button
                        type="button"
                        variant="primary"
                        form="attendance-form"    
                    >出勤</x-button>
                    <x-button
                        type="button"
                        form="attendance-form"
                    >退勤</x-button>
                    <x-search-input />
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mb-12 space-x-12 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($categoriesWithItems as $category => $items)
                    <div class="relative"> {{-- 位置関係を制御する親div --}}
                        <x-document-dropdown 
                            :category="$category"
                            :items="$items"
                        />
                    </div>
                @endforeach
            </div>
        </x-white-background-card>
    </x-container>
</x-app-layout>

<script>
    function navigateToPage(url) {
        if (url) {
            window.location.href = url;
        }
    }
</script>