{{-- 全体のコンテナ --}}
<div class="relative">
    {{-- スクロール可能なラッパー --}}
    <div class="overflow-x-auto">
        {{-- メインコンテンツ --}}
        <div class="min-w-fit"> {{-- 最小幅を自動計算 --}}
            {{-- ヘッダー部分 (固定) --}}
            <div class="grid grid-cols-[80px_100px_repeat(8,150px)] gap-4 text-xl">
                <div class="flex items-center justify-center px-2 py-2">勤務</div>
                <div class="flex items-center justify-center px-2 py-2">休暇区分</div>
                <div class="flex items-center justify-center px-2 py-2">出勤時間</div>
                <div class="flex items-center justify-center px-2 py-2">退勤時間</div>
                <div class="flex items-center justify-center px-2 py-2">実務時間</div>
                <div class="flex items-center justify-center px-2 py-2">普通残業</div>
                <div class="flex items-center justify-center px-2 py-2">深夜実働</div>
                <div class="flex items-center justify-center px-2 py-2">欠務時間</div>
                <div class="flex items-center justify-center px-2 py-2">追加カラム</div>
                <div class="flex items-center justify-center px-2 py-2">追加カラム</div>
            </div>

            {{-- スクロール可能なコンテンツ部分 --}}
            <div class="overflow-y-auto max-h-[400px]">
                @for($i = 0; $i < 31; $i++)
                    <div class="grid grid-cols-[80px_100px_repeat(8,150px)] gap-4 text-2xl">
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-simple-checkbox 
                                name="agree" 
                                value="1" 
                                :checked="old('agree')"
                                class="w-5 h-5" 
                            />
                        </div>
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-read-only-proparty
                                type="toggle" 
                                selected="option2" 
                                wire:model="selectedOption"
                            />
                        </div>
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-read-only-proparty/>
                        </div>
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-read-only-proparty/>
                        </div>
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-read-only-proparty/>
                        </div>
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-read-only-proparty/>
                        </div>
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-read-only-proparty/>
                        </div>
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-read-only-proparty/>
                        </div>
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-read-only-proparty/>
                        </div>
                        <div class="flex items-center justify-center px-2 py-2">
                            <x-read-only-proparty/>
                        </div>
                    </div>
                @endfor
            </div>

            {{-- 合計行 --}}
            <div class="grid grid-cols-[80px_100px_repeat(7,150px)] gap-4 text-xl bg-slate-100 font-bold border-t-2 border-slate-200">
                <div class="flex items-center justify-center px-2 py-3">
                    合計
                </div>
                <div class="flex items-center justify-center px-2 py-3">
                    -
                </div>
                <div class="flex items-center justify-center px-2 py-3">
                    0h
                </div>
                <div class="flex items-center justify-center px-2 py-3">
                    -
                </div>
                <div class="flex items-center justify-center px-2 py-3">
                    0h
                </div>
                <div class="flex items-center justify-center px-2 py-3">
                    0h
                </div>
                <div class="flex items-center justify-center px-2 py-3">
                    0h
                </div>
                <div class="flex items-center justify-center px-2 py-3">
                    0h
                </div>
                <div class="flex items-center justify-center px-2 py-3">
                    -
                </div>
            </div>
        </div>
    </div>

    {{-- スクロールインジケーター (右端のみ) --}}
    <div class="absolute top-0 bottom-0 right-0 w-8 opacity-75 pointer-events-none bg-gradient-to-l from-white to-transparent"></div>
</div>