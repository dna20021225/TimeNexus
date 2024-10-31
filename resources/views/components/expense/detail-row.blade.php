{{-- resources/views/components/expense/detail-row.blade.php --}}
<div class="grid items-center grid-cols-7 gap-4 mt-4">
    <input 
        type="date" 
        class="col-span-1 p-2 text-2xl bg-white border border-gray-200 rounded shadow-[0_2px_4px_rgba(0,0,0,0.1)] hover:shadow-[0_4px_8px_rgba(0,0,0,0.1)] transition-shadow duration-200" 
        placeholder="yyyy/mm/dd"
    >
    <input 
        type="text" 
        class="col-span-3 p-2 text-2xl text-center bg-white border border-gray-200 rounded shadow-[0_2px_4px_rgba(0,0,0,0.1)] hover:shadow-[0_4px_8px_rgba(0,0,0,0.1)] transition-shadow duration-200" 
        placeholder="摘要内容"
    >
    <input 
        type="number" 
        class="col-span-1 p-2 text-2xl text-center bg-white border border-gray-200 rounded shadow-[0_2px_4px_rgba(0,0,0,0.1)] hover:shadow-[0_4px_8px_rgba(0,0,0,0.1)] transition-shadow duration-200" 
        placeholder="000000"
    >
    <input 
        type="number" 
        class="col-span-1 p-2 text-2xl text-center bg-white border border-gray-200 rounded shadow-[0_2px_4px_rgba(0,0,0,0.1)] hover:shadow-[0_4px_8px_rgba(0,0,0,0.1)] transition-shadow duration-200" 
        placeholder="000000"
    >
    <div class="col-span-1 p-2 text-2xl text-center">000000</div>
</div>