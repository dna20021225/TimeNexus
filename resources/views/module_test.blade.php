<!-- phpで変数を用意 -->
<?php

?>


<x-app-layout>
    <x-container>            
        <x-white-background-card height="h-90-screen">
            <div class="flex flex-col space-y-6">
                <x-date-input label="摘要日" />
                <x-kinmuchi label="勤務地" />
                <div class="flex space-x-8">
                    <x-read-only-proparty label="基本時間" type="Mtime" />
                    <x-read-only-proparty label="日々基本時間" type="Dtime" />
                    <x-read-only-proparty label="所定就業日数" type="date" />
                </div>
            </div>
            <div class="mt-4 ml-4">
                <x-details />
            </div>
        </x-white-background-card>
    </x-container>
</x-app-layout>