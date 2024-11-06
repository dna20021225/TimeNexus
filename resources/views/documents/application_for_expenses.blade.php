@php
    $options = [
        '交通費',
        '食費',
        '宿泊費',
        'その他'
    ];
@endphp

<x-app-layout>
    <x-container>
        <x-white-background-card>
            <div class="p-6 space-y-6" x-data="{ rows: [{}] }">
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
                    
                    <template x-for="(row, index) in rows" :key="index">
                        <div class="grid grid-cols-7 gap-4">
                            <div class="col-span-1">
                                <input type="date" class="w-full px-4 py-2 border rounded" x-model="row.date">
                            </div>
                            <div class="col-span-3">
                                <input type="text" class="w-full px-4 py-2 border rounded" x-model="row.description">
                            </div>
                            <div class="col-span-1">
                                <input type="number" class="w-full px-4 py-2 border rounded" 
                                    x-model="row.unitPrice"
                                    @input="row.amount = row.unitPrice * row.quantity">
                            </div>
                            <div class="col-span-1">
                                <input type="number" class="w-full px-4 py-2 border rounded" 
                                    x-model="row.quantity"
                                    @input="row.amount = row.unitPrice * row.quantity">
                            </div>
                            <div class="col-span-1">
                                <input type="text" class="w-full px-4 py-2 bg-gray-100 border rounded" 
                                    x-model="row.amount" readonly>
                            </div>
                        </div>
                    </template>

                    <div class="flex justify-center">
                        <button class="p-2 bg-gray-100 rounded" @click="rows.push({})">+</button>
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