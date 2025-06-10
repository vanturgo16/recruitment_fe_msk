<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferingSchedules extends Model
{
    use HasFactory;
    protected $table = 'offering_schedules';
    protected $guarded = ['id'];
}
