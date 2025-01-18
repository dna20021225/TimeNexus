<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ユーザーID
            $table->boolean('work_type')->nullable(); // 勤務種別
            $table->integer('leave_category')->nullable(); // 休暇区分
            $table->time('clock_in_time')->nullable(); // 出勤時間
            $table->time('clock_out_time')->nullable(); // 退勤時間
            $table->time('actual_work_time')->nullable(); // 実務時間
            $table->time('overtime_regular')->nullable(); // 普通残業
            $table->time('overtime_night')->nullable(); // 深夜実働
            $table->time('absence_time')->nullable(); // 欠勤時間
            $table->timestamps(); // 作成日と更新日
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
