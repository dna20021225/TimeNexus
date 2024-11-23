<x-app-layout>
    <x-container>            
        <x-white-background-card>
            <div class="grid grid-cols-2">
                <x-checkbox
                    name="terms"
                    label="利用規約に同意する"
                    :required="true"
                />
            </div>
        </x-white-background-card>
    </x-container>
</x-app-layout>