@php
    $options = [
        '仕入費',
        '厚生費',
        '制作旅費',
        '広告宣伝費',
        '発送配達費',
        '事務用消耗品費',
        '通信交通費',
        '租税交通費',
        '備品消耗品費',
        '管理諸費',
        '雑費',
        'その他',
    ];
@endphp

<x-app-layout>
    <x-container>
        <x-white-background-card height="h-90-screen">
            <!-- 入力フォーム -->
            <form id="expense-form" method="POST" action="{{ route('store-expense-application') }}">
                @csrf
                <div class="space-y-6" x-data="{ rows: [0] }">
                    <!-- 申請日フォーム -->
                    <x-date-input label="申請日" />
                    <!-- 費目フォーム -->
                    <div class="flex space-x-8">
                        <x-expense.dropdown 
                            label="費目" 
                            name="expense_category"
                            :options="$options"
                            selected="交通費"
                        />
                        <x-expense.dropdown 
                            label="区分" 
                            name="client_billable"
                            :options="['客先PC', '客先モニター', '客先各種機器', '客先PCパーツ']"
                            selected="不可"
                        />
                        <x-expense.dropdown 
                            label="客先請求" 
                            name="client_billable"
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
                        <div class="max-h-[400px] overflow-y-auto">
                            <template x-for="(row, index) in rows" :key="index">
                                <div>
                                    <x-expense.detail-row data-row-index="0" x-bind:data-row-index="index" />
                                </div>
                            </template>
                        </div>
                        <div class="flex justify-center">
                            <button 
                                type="button" 
                                class="text-4xl rounded bg-neutral-200 px-7" 
                                @click.prevent="rows.push(rows.length)"
                            >
                                +
                            </button>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-0 right-0 flex justify-end m-12 space-x-4">
                    <x-button>保存</x-button>
                    <x-button>確認</x-button>
                    <x-button 
                        type="submit"
                        variant="primary"
                        form="expense-form"
                    >
                        申請
                    </x-button>
                </div>
            </form>
        </x-white-background-card>
    </x-container>
</x-app-layout>

@push('scripts')
<script>
    function expenseRow() {
        return {
            unitPrice: '',
            quantity: '',
            total: '',
            autoCalculate(changedField) {
                // 数値に変換
                const up = parseFloat(this.unitPrice);
                const qty = parseFloat(this.quantity);
                const tot = parseFloat(this.total);
                
                // 入力された2つのフィールドに基づいて計算
                if (changedField !== 'total' && up && qty) {
                    this.total = (up * qty).toFixed(0);
                } else if (changedField !== 'quantity' && up && tot) {
                    this.quantity = (tot / up).toFixed(0);
                } else if (changedField !== 'unitPrice' && qty && tot) {
                    this.unitPrice = (tot / qty).toFixed(0);
                }
            }
        }
    }
</script>
@endpush