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
            @if(Auth::user()->is_attendance == false)
            <form id="attendance-form" action="{{ route('attendance.create') }}" method="POST">
            @else
            <form id="attendance-form" action="{{ route('attendance.leave') }}" method="POST">
            @endif
                @csrf
                <!-- ステータス -->
                <div class="flex flex-row items-center mb-1 space-x-1">
                    <div class="text-xl">あなたの状態は</div>
                    @if(Auth::user()->is_attendance == true)<div class="text-2xl font-bold text-blue-400">出勤中</div>
                    @else<div class="text-2xl font-bold text-red-400">退勤中</div>@endif
                    <div class="text-xl">です。</div>
                </div>

                <!-- 横並びフレックスボックス -->
                <div class="flex flex-row items-center space-x-6">
                    <!-- ボタン -->
                    <div class="flex space-x-12">
                        @if(Auth::user()->is_attendance == false)
                            <x-button
                                type="submit"
                                variant="primary"
                                form="attendance-form" 
                            >出勤</x-button>
                            <x-button>
                                退勤
                            </x-button>
                        @else
                            <x-button>
                                出勤
                            </x-button>
                            <x-button
                                type="submit"
                                variant="primary"
                                form="attendance-form"
                            >退勤</x-button>
                        @endif
                    </div>

                    <!-- 勤務先選択 -->
                    <div class="flex flex-col space-y-3">
                        <x-simple-dropdown
                            name="company"
                            label="勤務先企業"
                            :items="$companies"
                        />
                        <x-simple-dropdown
                            name="department"
                            label="部署"
                            :items="$departments"
                        />
                    </div>

                    <!-- チェックボックス -->
                    <div class="overflow-x-auto">
                        <div class="grid grid-flow-col grid-rows-2 gap-4 auto-cols-max">
                            <x-checkbox
                                name="is_flextime"
                                label="フレックスタイム"
                            />
                            <x-checkbox
                                name="is_remote"
                                label="在宅勤務"
                            />
                            <x-checkbox
                                name="is_office"
                                label="本社勤務"
                            />
                            <x-checkbox
                                name="terms"
                                label="No context"
                            />
                            <x-checkbox
                                name="terms"
                                label="No context"
                            />
                            <x-checkbox
                                name="terms"
                                label="No context"
                            />
                            <x-checkbox
                                name="terms"
                                label="No context"
                            />
                            <x-checkbox
                                name="terms"
                                label="No context"
                            />
                            <x-checkbox
                                name="terms"
                                label="No context"
                            />
                        </div>
                    </div>
                </div>
            </form>

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