<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    protected $fillable = ['box_name','cheap_libelle','cheap_price','cheap_description','cheap_options','med_libelle','med_price','med_description','med_options','exp_libelle','exp_price','exp_description','exp_options','image','gallery','description','stock'];
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('box_name','like', "%$term%")
                ->orWhere('price','like', "%$term%")
                ->orWhere('options','like', "%$term%")
                ->orWhere('description','like', "%$term%");
        });
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class); // Product model was working if u face any problem
    }
}
