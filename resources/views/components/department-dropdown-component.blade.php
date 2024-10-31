<div 
    x-data="{ 
        open: false, 
        selectedOption: '{{ $selectedOption }}',
        toggle() {
            this.open = !this.open;
            this.$nextTick(() => {
                const optionsList = this.$refs.optionsList;
                if (this.open) {
                    optionsList.style.maxHeight = optionsList.scrollHeight + 'px';
                } else {
                    optionsList.style.maxHeight = '0px';
                }
            });
        }
    }" 
    class="relative w-56"
>
    <div class="relative" id="dropdownContainer">
        <button 
            @click="toggle()" 
            class="w-full px-4 py-2 text-left bg-white border-2 border-[#2fb5d1] rounded-md focus:outline-none"
        >
            <span x-text="selectedOption" id="selectedOption"></span>
            <span 
                id="arrow" 
                class="absolute transition-transform duration-300 transform -translate-y-1/2 right-3 top-1/2"
                :class="{ 'rotate-180': open }"
            >
                &gt;
            </span>
        </button>

        <div 
            x-ref="optionsList"
            id="optionsList" 
            class="absolute w-full bg-white border-2 border-t-0 border-[#2fb5d1] rounded-b-md shadow-lg overflow-hidden"
            :class="{ 'hidden': !open }"
            style="max-height: 0; transition: max-height 0.3s ease-out;"
        >
            @foreach($options as $option)
                <div 
                    @click="selectedOption = '{{ $option }}'; toggle()" 
                    class="px-4 py-2 cursor-pointer hover:bg-gray-100"
                >
                    {{ $option }}
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endpush

<style>
    #arrow {
        transition: transform 0.3s ease;
    }
    #optionsList {
        transition: max-height 0.3s ease-out;
    }
</style>