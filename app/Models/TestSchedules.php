<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSchedules extends Model
{
    use HasFactory;
    protected $table = 'test_schedules';
    protected $guarded = ['id'];
}
