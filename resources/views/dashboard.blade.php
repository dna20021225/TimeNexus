<!-- phpで変数を用意 -->
<?php
    $label = '勤務先企業';

    $companies = [
        1 => '株式会社アイシン',
        2 => 'サンハウス食品株式会社',
        3 => '株式会社システムリサーチ',
        4 => 'Ｓｋｙ株式会社',
        5 => '中部電力株式会社',
        6 => '日本製鉄株式会社',
    ];

    $departments = [
        1 => '営業部',
        2 => '総務部',
        3 => '人事部',
        4 => '経理部',
        5 => '開発部',
        6 => '研究部',
    ];
?>

<x-app-layout>
    <x-container>            
        <x-white-background-card height="h-30-screen">
            <!-- ステータス -->
            <div class="flex flex-row items-center mb-1 space-x-1">
                <div class="text-xl">あなたの状態は</div>
                <div class="text-2xl">出勤中</div>
                <div class="text-xl">です。</div>
            </div>

            <!-- 横並びフレックスボックス -->
            <div class="flex flex-row items-center space-x-6">
                <!-- ボタン -->
                <div class="flex space-x-12">
                    <x-button
                        type="button"
                        variant="primary"
                        form="attendance-form" 
                        href="{{ route('attendance.create') }}"   
                    >出勤</x-button>
                    <x-button
                        type="button"
                        form="attendance-form"
                    >退勤</x-button>
                </div>

                <!-- 勤務先選択 -->
                <div class="flex flex-col space-y-3">
                    <x-simple-dropdown
                        label="勤務先企業"
                        :items="$companies"
                     />
                    <x-simple-dropdown
                        label="部署"
                        :items="$departments"
                    />
                </div>

                <!-- チェックボックス -->
                <div class="overflow-x-auto">
                    <div class="grid grid-flow-col grid-rows-2 gap-4 auto-cols-max">
                        <x-checkbox
                            name="terms"
                            label="フレックスタイム"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="在宅勤務"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="自社勤務"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                        <x-checkbox
                            name="terms"
                            label="No context"
                            :required="true"
                        />
                    </div>
                </div>
            </div>

            <!-- 勤務表確認ボタン -->
            <div class="flex justify-first">
                <x-simple-button
                    type="button"
                    label="勤務表の確認"
                    href="{{ route('worktable') }}"
                ></x-button>
            </div>
        </x-white-background-card>
        <x-white-background-card height="h-60-screen">
            <div class="mb-6 text-3xl">各種書類</div>
            <div class="mb-5">
                <x-search-input />
            </div>
            <div class="flex flex-row space-x-12">
                @foreach ($categoriesWithItems as $category => $items)
                    <x-document-dropdown 
                        :category="$category"
                        :items="$items"
                    />
                @endforeach
            </div>
        </x-white-background-card>
    </x-container>
</x-app-layout>

<script>
    function navigateToPage(url) {
        if (url) {
            window.location.href = url;
        }
    }
</script>