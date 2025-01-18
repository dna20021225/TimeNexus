<div
    {{ $attributes }}
    x-data="expenseRow()"
    class="grid items-center grid-cols-7 gap-4 mt-4"
>
    <input 
        type="date" 
        x-bind:name="'details[' + $el.closest('div').dataset.rowIndex + '][date]'"
        class="col-span-1 p-2 text-2xl transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
        placeholder="yyyy/mm/dd"
    >
    <input 
        type="text" 
        x-bind:name="'details[' + $el.closest('div').dataset.rowIndex + '][description]'"
        class="col-span-3 p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
        placeholder="摘要内容を入力してください"
    >
    <input 
        type="number" 
        x-bind:name="'details[' + $el.closest('div').dataset.rowIndex + '][unit_price]'"
        x-model.number="formData.unitPrice"
        x-on:input="autoCalculate('unitPrice')"
        class="col-span-1 p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
        placeholder="単価"
    >
    <input 
        type="number" 
        x-bind:name="'details[' + $el.closest('div').dataset.rowIndex + '][quantity]'"
        x-model.number="formData.quantity"
        x-on:input="autoCalculate('quantity')"
        class="col-span-1 p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
        placeholder="数量"
    >
    <input 
        type="number" 
        x-bind:name="'details[' + $el.closest('div').dataset.rowIndex + '][total]'"
        x-model.number="formData.total"
        x-on:input="autoCalculate('total')"
        class="col-span-1 p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
        placeholder="金額"
    >
</div>

@push('scripts')
<script>
    function expenseRow() {
        return {
            formData: {
                unitPrice: '',
                quantity: '',
                total: ''
            },
            autoCalculate(changedField) {
                const up = this.formData.unitPrice;
                const qty = this.formData.quantity;
                const tot = this.formData.total;
                
                if (changedField !== 'total' && up && qty) {
                    this.formData.total = (up * qty).toFixed(0);
                } else if (changedField !== 'quantity' && up && tot) {
                    this.formData.quantity = (tot / up).toFixed(0);
                } else if (changedField !== 'unitPrice' && qty && tot) {
                    this.formData.unitPrice = (tot / qty).toFixed(0);
                }
            }
        }
    }
</script>
@endpush