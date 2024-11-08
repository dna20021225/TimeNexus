{{-- resources/views/components/expense/detail-row.blade.php --}}
<div class="grid items-center grid-cols-7 gap-4 mt-4">
    <input 
        type="date" 
        class="col-span-1 p-2 text-2xl transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
        placeholder="yyyy/mm/dd"
    >
    <input 
        type="text" 
        class="col-span-3 p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
        placeholder="摘要内容を入力してください"
    >
    <input 
        type="number" 
        class="col-span-1 p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
        placeholder="000000"
    >
    <input 
        type="number" 
        class="col-span-1 p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
        placeholder="000000"
    >
    <input 
    type="number" 
    class="col-span-1 p-2 text-2xl text-center transition-shadow duration-200 border-none rounded shadow bg-neutral-200 hover:shadow-md" 
    placeholder="000000"
    >
</div>