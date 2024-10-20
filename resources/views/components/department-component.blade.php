<div class="max-w-md bg-white shadow-sm sm:rounded-lg">
    <div class="p-4">
        <h3 class="mb-3 text-lg font-semibold text-gray-800">部署情報</h3>
        <div class="overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            項目
                        </th>
                        <th scope="col" class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            情報
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-4 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                            部署名
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap">
                            {{ $department }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                            ユーザー名
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-500 whitespace-nowrap">
                            {{ $username }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>