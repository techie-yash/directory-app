<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table = 'businesses';
    protected $guarded = [];

    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class, 'category','id');
    }

    public function imageGallery()
    {
        return $this->hasMany(BusinessImageGallery::class, 'business_id','id');
    }

    public function socialMediaLinks()
    {
        return $this->hasMany(SocialMediaLink::class, 'user_id');
    }

    public function workingHours()
    {
        return $this->hasMany(BusinessWorkingHour::class, 'business_id','id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'user_id','user_id');
    }

    public function delivery()
    {
        return $this->hasMany(ProFeature::class,'user_id','user_id')->where('type','delivery_network');
    }

    public function ourPartner()
    {
        return $this->hasMany(ProFeature::class,'user_id','user_id')->where('type','our_partner');
    }
}
