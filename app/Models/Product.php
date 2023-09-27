<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['nom','prix','quantite','description','photo','gallery'];
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('nom','like', "%$term%")
                ->orWhere('description','like', "%$term%");
        });
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class); // Product model was working if u face any problem
    }
    public function wishlist()
    {
        return $this->belongsToMany(Cart::class); // Product model was working if u face any problem
    }
}
