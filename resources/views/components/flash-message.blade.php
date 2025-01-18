{{-- resources/views/components/flash-message.blade.php --}}
@if (session()->has('attendance'))
    @php
        $attendanceData = session('attendance');
    @endphp
    <div class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 w-full max-w-md p-8 mx-4 bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900">出勤登録完了</h3>
                <button onclick="this.closest('.fixed').remove()" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="mb-6 text-center">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <p class="text-lg text-gray-700">出勤の入力が完了しました。</p>
                <p class="mt-2 text-sm text-gray-500">{{ now()->format('Y年m月d日 H:i') }}</p>
                
                <div class="mt-4 space-y-2">
                    @if($attendanceData['is_flex'])
                        <div class="flex items-center justify-center px-4 py-3 space-x-2 rounded-lg bg-gray-50">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span class="text-gray-700">フレックス出勤</span>
                        </div>
                    @endif
                    
                    @if($attendanceData['is_remote'])
                        <div class="flex items-center justify-center px-4 py-3 space-x-2 rounded-lg bg-gray-50">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-700">在宅勤務</span>
                        </div>
                    @endif

                    @if($attendanceData['is_office'])
                    <div class="flex items-center justify-center px-4 py-3 space-x-2 rounded-lg bg-gray-50">
                        <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-gray-700">本社勤務</span>
                    </div>
                @endif
                </div>
            </div>
            <div class="text-center">
                <button onclick="this.closest('.fixed').remove()" 
                        class="px-6 py-2 text-white transition-colors bg-blue-500 rounded-lg hover:bg-blue-600">
                    閉じる
                </button>
            </div>
        </div>
    </div>
@endif

@if (session()->has('leave'))
    <div class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 w-full max-w-md p-8 mx-4 bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900">退勤登録完了</h3>
                <button onclick="this.closest('.fixed').remove()" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="mb-6 text-center">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </div>
                <p class="text-lg text-gray-700">退勤の入力が完了しました。</p>
                <p class="mt-2 text-sm text-gray-500">{{ now()->format('Y年m月d日 H:i') }}</p>
                
                <!-- 残業時間の表示部分 -->
                <div class="flex items-center justify-center px-4 py-3 mt-4 space-x-2 rounded-lg bg-gray-50">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-gray-700">所定時間内の退勤</span>
                </div>
            </div>
            <div class="text-center">
                <button onclick="this.closest('.fixed').remove()" 
                        class="px-6 py-2 text-white transition-colors bg-green-500 rounded-lg hover:bg-green-600">
                    閉じる
                </button>
            </div>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 w-full max-w-md p-8 mx-4 bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-900">エラー</h3>
                <button onclick="this.closest('.fixed').remove()" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="mb-6 text-center">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-lg text-gray-700">{{ session('error') }}</p>
            </div>
            <div class="text-center">
                <button onclick="this.closest('.fixed').remove()" 
                        class="px-6 py-2 text-white transition-colors bg-red-500 rounded-lg hover:bg-red-600">
                    閉じる
                </button>
            </div>
        </div>
    </div>
@endif