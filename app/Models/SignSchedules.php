<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignSchedules extends Model
{
    use HasFactory;
    protected $table = 'signing_schedules';
    protected $guarded = ['id'];
}
