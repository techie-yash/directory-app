<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BusinessCategory extends Model
{
    use HasFactory;

    protected $table = 'business_categories';
    protected $guarded = [];

    // public function category()
    // {
    //     return $this->hasOne(Business::class, 'category');
    // }
    public function children()
    {
      return $this->hasMany(BusinessCategory::class, 'parent_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($businessCategory) {
            $businessCategory->slug = $businessCategory->generateSlug($businessCategory->name);
            $businessCategory->save();
        });
    }
    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }    
}


