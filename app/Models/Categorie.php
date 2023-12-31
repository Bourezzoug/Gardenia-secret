<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    public function post() {
        return $this->hasMany(Blog::class);
    }
    public function product() {
        return $this->hasMany(Product::class);
    }
    protected $fillable = ['name','slug','color','type','parent_id'];
    public function setSlugAttribute($value) {
        $this->attributes['slug'] = strtolower($value);
    }
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('name','like', "%$term%")
                ->orWhere('slug','like', "%$term%")
                ->orWhere('type','like', "%$term%");
        });
    }
}
