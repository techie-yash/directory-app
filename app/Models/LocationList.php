<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationList extends Model
{
    use HasFactory;

    
    protected $table = 'location_listings';
    protected $guarded = [];
}
