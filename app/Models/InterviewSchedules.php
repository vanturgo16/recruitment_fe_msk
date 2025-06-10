<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewSchedules extends Model
{
    use HasFactory;
    protected $table = 'interview_schedules';
    protected $guarded = ['id'];
}
