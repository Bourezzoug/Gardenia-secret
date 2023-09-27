<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','status','total_price','session_id','email','first_name','family_name','address','phone_number','city','country','state_province','postal_code'];
}
