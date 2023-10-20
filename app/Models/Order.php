<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','status','total_price','session_id','email','first_name','family_name','address','phone_number','city','country','state_province','postal_code'];
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('total_price','like', "%$term%");
                // ->orWhere('category','like', "%$term%");
        });
    }
}
