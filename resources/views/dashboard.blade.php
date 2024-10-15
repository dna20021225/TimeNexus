<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="p-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!--出勤-->
                    <div class="flex">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 mx-2 text-white bg-blue-500 rounded hover:bg-blue-600">出勤</a>
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 mx-2 text-white bg-blue-500 rounded hover:bg-blue-600">退勤</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($categoriesWithItems as $category => $items)
                        <select class="px-4 py-2 mx-2 text-white bg-blue-500 rounded hover:bg-blue-600" onchange="navigateToPage(this.value)">
                            <option value="">{{ $category }}</option>
                            @foreach ($items as $value => $item)
                                <option value="{{ route('dashboard')}}">{{ $item }}</option>
                            @endforeach
                        </select>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function navigateToPage(url) {
        if (url) {
            window.location.href = url;
        }
    }
    </script>