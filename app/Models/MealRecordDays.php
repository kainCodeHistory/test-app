<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealRecordDays extends Model
{
    use HasFactory;
    
    protected $table = 'meal_record_days';

    protected $guarded = [];
}
