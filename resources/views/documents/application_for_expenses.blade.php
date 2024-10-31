@php
    $options = [
        '交通費',
        '食費',
        '宿泊費',
        'その他'
    ];
@endphp

<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-800">
            {{ __('経費申請書') }}
        </h2>
    </x-slot> --}}
    <x-slot name="title">

    <x-container>
        <x-white-background-card>
            <div class="p-6 space-y-6">
                <x-expense.date-input label="申請日" />
                <div class="flex space-x-8">
                    <x-expense.dropdown 
                        label="費目" 
                        :options="['交通費', '消耗品費', '会議費']"
                        selected="交通費"
                    />
                    <x-expense.dropdown 
                        label="客先請求" 
                        :options="['可', '不可']"
                        selected="不可"
                    />
                </div>
                <div class="space-y-4">
                    <div class="grid grid-cols-7 gap-4">
                        <div class="col-span-1 text-2xl text-center">摘要日</div>
                        <div class="col-span-3 text-2xl text-center">摘要内容</div>
                        <div class="col-span-1 text-2xl text-center">単価</div>
                        <div class="col-span-1 text-2xl text-center">摘要数</div>
                        <div class="col-span-1 text-2xl text-center">金額</div>
                    </div>
                    <x-expense.detail-row />
                    <div class="flex justify-center">
                        <button class="p-2 bg-gray-100 rounded">+</button>
                    </div>
                </div>
                <div class="flex justify-end space-x-4">
                    <x-expense.button>保存</x-expense.button>
                    <x-expense.button>確認</x-expense.button>
                    <x-expense.button variant="primary">申請</x-expense.button>
                </div>
            </div>
        </x-white-background-card>
    </x-container>
</x-app-layout>