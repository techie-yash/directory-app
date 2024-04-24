<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessWorkingHour extends Model
{
    use HasFactory;
    protected $table = 'business_working_hours';
    protected $guarded = [];
}
