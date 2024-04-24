<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class Customer extends Model
// {
//     use HasFactory;

//     protected $table = 'customers'; // Specify the table name

//     protected $guarded = [];
// }

class Customer extends Authenticatable
{
    // Your model code here

    use HasFactory;

    protected $table = 'customers'; // Specify the table name

    protected $guarded = [];

    public function business()
    {
        return $this->hasOne(Business::class);
    }

    public function socialMediaLinks()
    {
        return $this->hasMany(SocialMediaLink::class, 'business_id');
    }
    
}
