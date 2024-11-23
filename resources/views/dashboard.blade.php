<x-app-layout>
    <x-container>            
        <x-white-background-card height="h-20-screen">
            <div class="flex items-center -my-5 space-x-10">
                <x-button
                    type="button"
                    variant="primary"
                    form="attendance-form" 
                    href="{{ route('attendance.create') }}"   
                >出勤</x-button>
                <x-button
                    type="button"
                    form="attendance-form"
                >退勤</x-button>
                <div class="overflow-x-auto">
                    <div class="grid grid-flow-col grid-rows-2 gap-4 auto-cols-max">
                        <x-checkbox
                            name="terms"
                            label="フレックスタイム"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="在宅勤務"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="自社勤務"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                    </div>
                </div>
            </div>
        </x-white-background-card>
        <x-white-background-card height="h-70-screen">
            <div class="mb-12">
                <x-search-input />
            </div>
            <div class="grid grid-cols-4">
                @foreach ($categoriesWithItems as $category => $items)
                    <x-document-dropdown 
                        :category="$category"
                        :items="$items"
                    />
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