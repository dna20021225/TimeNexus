<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 経費申請テーブル
        Schema::create('expense_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('application_date');
            $table->string('expense_category');
            $table->boolean('client_billable');
            $table->integer('total_amount');
            $table->string('status');
            $table->text('rejection_reason')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // 経費明細テーブル
        Schema::create('expense_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_application_id')->constrained()->onDelete('cascade');
            $table->date('expense_date');
            $table->string('description');
            $table->integer('unit_price');
            $table->integer('quantity');
            $table->integer('amount');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expense_details');
        Schema::dropIfExists('expense_applications');
    }
};