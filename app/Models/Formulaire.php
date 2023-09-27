<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Formulaire extends Model
{
    use HasFactory;
    protected $fillable = ['nom_complet','ville','telephone','email'];
}
