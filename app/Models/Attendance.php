<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_type',
        'leave_category',
        'clock_in_time',
        'clock_out_time',
        'actual_work_time',
        'overtime_regular',
        'overtime_night',
        'absence_time',
    ];
}
