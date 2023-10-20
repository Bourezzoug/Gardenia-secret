<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClientOrders extends Controller
{
    // public function searchOrders(Request $request) {
    //     $searchTerm = $request->input('searchTerm');
    
    //     $orders = Order::where('user_id', Auth::user()->id)
    //         ->where('status', 'paid')
    //         // ->whereHas('products', function($query) use ($searchTerm) {
    //         //     $query->where('nom', 'like', '%' . $searchTerm . '%');
    //         // })
    //         ->where('total_price', 'like', '%' . $searchTerm . '%')
    //         ->get();
    
    //     return view('partials.orderTable', compact('orders'));
    // }


    // public function searchOrders(Request $request) {
    //     $searchTerm = $request->input('searchTerm');
    //     $timePeriod = $request->input('timePeriod');
    
    //     $orders = Order::where('user_id', Auth::user()->id)
    //         ->where('status', 'paid');
    
    //     if ($timePeriod) {
    //         if ($timePeriod == 'last_day') {
    //             $orders = Order::where('user_id', Auth::user()->id)
    //             ->where('status', 'paid')
    //             ->where('created_at', '>', Carbon::now()->yesterday())
    //             ->get();
    //         } elseif ($timePeriod == 'last_7_days') {
    //             $orders = Order::where('user_id', Auth::user()->id)
    //             ->where('status', 'paid')
    //             ->where('created_at', '>', Carbon::now()->subWeek())
    //             ->get();
    //         } elseif ($timePeriod == 'last_30_days') {
    //             $orders = Order::where('user_id', Auth::user()->id)
    //             ->where('status', 'paid')
    //             ->where('created_at', '>', Carbon::now()->subMonth())
    //             ->get();
    //         } elseif ($timePeriod == 'last_month') {
    //             $orders = Order::where('user_id', Auth::user()->id)
    //             ->where('status', 'paid')
    //             ->where('created_at', Carbon::now()->subMonth())
    //             ->get();
    //         } elseif ($timePeriod == 'last_year') {
    //             $orders = Order::where('user_id', Auth::user()->id)
    //             ->where('status', 'paid')
    //             ->where('created_at', Carbon::now()->subYear())
    //             ->get();
    //         }
    //     }
    
    //     $orders = $orders->get()
    //         ->filter(function($order) use ($searchTerm) {
    //             $cartItems = json_decode($order->cartInfo, true);
    
    //             foreach ($cartItems as $item) {
    //                 if (isset($item['product_id'])) {
    //                     $product = Product::find($item['product_id']);
    //                     if ($product && stripos($product->nom, $searchTerm) !== false) {
    //                         return true;
    //                     }
    //                 }
    
    //                 if (isset($item['box_id'])) {
    //                     $box = Box::find($item['box_id']);
    //                     if ($box && stripos($box->name, $searchTerm) !== false) {
    //                         return true;
    //                     }
    //                 }
    //             }
    
    //             return false;
    //         });
    
    //     return view('partials.orderTable', ['orders' => $orders]);
    // }

    public function searchOrders(Request $request) {
        $searchTerm = $request->input('searchTerm');
        $timePeriod = $request->input('timePeriod');
    
        $orders = Order::where('user_id', Auth::user()->id)
            ->where('status', 'paid');
    
        if ($timePeriod) {
            if ($timePeriod == 'last_day') {
                $orders->where('created_at', '>', Carbon::now()->yesterday());
            } elseif ($timePeriod == 'last_7_days') {
                $orders->where('created_at', '>', Carbon::now()->subWeek());
            } elseif ($timePeriod == 'last_30_days') {
                $orders->where('created_at', '>', Carbon::now()->subMonth());
            } elseif ($timePeriod == 'last_month') {
                $orders->where('created_at', '>', Carbon::now()->subMonth());
            } elseif ($timePeriod == 'last_year') {
                $orders->where('created_at', '>', Carbon::now()->subYear());
            }
        }
    
        $orders = $orders->get()
            ->filter(function($order) use ($searchTerm) {
                $cartItems = json_decode($order->cartInfo, true);
    
                foreach ($cartItems as $item) {
                    if (isset($item['product_id'])) {
                        $product = Product::find($item['product_id']);
                        if ($product && stripos($product->nom, $searchTerm) !== false) {
                            return true;
                        }
                    }
    
                    if (isset($item['box_id'])) {
                        $box = Box::find($item['box_id']);
                        if ($box && stripos($box->name, $searchTerm) !== false) {
                            return true;
                        }
                    }
                }
    
                return false;
            });
    
        return view('partials.orderTable', ['orders' => $orders]);
    }
    
    
    
    
    public function index() {
        $order = Order::where('user_id',Auth::user()->id)
                ->where('status','paid')
                // ->where('created_at','<',Carbon::now()->subMonth())
                ->get();
        return view('pages.clientOrder',[
            'orders'    =>  $order
        ]);
        // dd($order);
    }
}
