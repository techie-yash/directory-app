<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProFeature extends Model
{
    use HasFactory;
    protected $table = 'profeatures'; // Specify the table name

    protected $guarded = [];
}
