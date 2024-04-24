<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offers'; // Specify the table name

    protected $guarded = [];

    public function business()
    {
        return $this->hasOne(Business::class, 'user_id', 'user_id');
    }
}
