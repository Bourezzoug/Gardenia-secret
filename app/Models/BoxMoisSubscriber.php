<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxMoisSubscriber extends Model
{
    use HasFactory;
    protected $fillable = ['nom_complet','email','ville','telephone','addresse','remarque'];
}
