<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealRecords extends Model
{
    use HasFactory;
    
    protected $table = 'meal_records';

    protected $guarded = [];
}
