<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Module;

class Event extends Model
{
    use HasFactory;

    
    protected $table = 'events'; // Specify the table name

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Module::class, 'event_id', 'id');
    }

    public function business()
    {
        return $this->hasOne(Business::class, 'user_id', 'user_id');
    }

}
