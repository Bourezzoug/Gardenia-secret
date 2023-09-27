<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function confirm_order(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'             => 'required|email|max:255',
            'first_name'        => 'required|min:3|string',
            'family_name'       => 'required|min:3|string',
            'address'           => 'required|min:10|string',
            'phone_number'      => 'required|min:3',
            'city'              => 'required|min:3|string',
            'country'           => 'required|min:3|string',
            'state_province'    => 'required|min:3|string',
            'postal_code'       => 'required|min:3',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
    
        Order::create([
            'email' =>  $request->email,
            'user_id' =>  Auth::user()->id,
            'first_name' =>  $request->first_name,
            'family_name' =>  $request->family_name,
            'address' =>  $request->address,
            'phone_number' =>  $request->phone_number,
            'city' =>  $request->city,
            'country' =>  $request->country,
            'state_province' =>  $request->state_province,
            'postal_code' =>  $request->postal_code,
            'status' =>  'unpaid',
        ]);
    
        return response()->json(['success' => true]);
    }
    
}
