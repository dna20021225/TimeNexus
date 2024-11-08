<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpenseDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'expense_application_id',
        'expense_date',
        'description',
        'unit_price',
        'quantity',
        'amount',
        'notes',
    ];

    protected $casts = [
        'expense_date' => 'date',
        'unit_price' => 'integer',
        'quantity' => 'integer',
        'amount' => 'integer',
    ];

    protected $dates = [
        'expense_date',
    ];

    // リレーション
    public function application(): BelongsTo
    {
        return $this->belongsTo(ExpenseApplication::class, 'expense_application_id');
    }

    // 金額の再計算メソッド
    public function recalculateAmount(): void
    {
        $this->amount = $this->unit_price * $this->quantity;
        $this->save();
    }
}