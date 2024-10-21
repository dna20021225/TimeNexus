<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <x-department-dropdown-component /> 
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-semibold">勤怠入力</h3>
                    <div class="flex space-x-4">
                        <a href="{{ route('dashboard') }}" class="px-6 py-2 text-white transition duration-300 ease-in-out bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">出勤</a>
                        <a href="{{ route('dashboard') }}" class="px-6 py-2 text-white transition duration-300 ease-in-out bg-green-500 rounded-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">退勤</a>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-semibold">各種書類</h3>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($categoriesWithItems as $category => $items)
                            <div class="relative">
                                <select class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" onchange="navigateToPage(this.value)">
                                    <option value="" selected>{{ $category }}</option>
                                    @foreach ($items as $id => $item)
                                        <option value="{{ route('documents.show', ['category' => $category, 'id' => $id]) }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-semibold">検索</h3>
                    <form action="{{ route('dashboard') }}" method="GET">
                        @csrf
                        <textarea name="query" class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="検索ワードを入力してください"></textarea>
                        <button type="submit" class="w-full px-4 py-2 mt-4 text-white transition duration-300 ease-in-out bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">検索</button>
                    </form>
                </div>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-semibold">テスト</h3>
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