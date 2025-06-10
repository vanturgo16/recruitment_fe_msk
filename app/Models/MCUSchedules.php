<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCUSchedules extends Model
{
    use HasFactory;
    protected $table = 'mcu_schedules';
    protected $guarded = ['id'];
}
