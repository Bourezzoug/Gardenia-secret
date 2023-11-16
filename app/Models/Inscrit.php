<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscrit extends Model
{
    use HasFactory;
    protected $fillable = ['email','nom_complet','country','ville'];
    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('email','like', "%$term%")
                ->orWhere('nom_complet','like', "%$term%")
                ->orWhere('ville','like', "%$term%");
        });
    }
}
