<?php

namespace App\Http\Livewire\Client\Order;

use App\Models\Order;
use App\Models\Product;
use App\Models\Box;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class OrderIndex extends Component
{
    public ?string $term = null;
    public $orderTable;

    public function search()
    {
        $this->orderTable = Order::where('user_id', Auth::user()->id)
            ->where('status', 'paid')
            ->get()
            ->filter(function($order) {
                $cartItems = json_decode($order->cartInfo, true);

                foreach ($cartItems as $item) {
                    if (isset($item['product_id'])) {
                        $product = Product::find($item['product_id']);
                        if ($product && stripos($product->nom, $this->term) !== false) {
                            return true;
                        }
                    }

                    if (isset($item['box_id'])) {
                        $box = Box::find($item['box_id']);
                        if ($box && stripos($box->name, $this->term) !== false) {
                            return true;
                        }
                    }
                }

                return false;
            });
        Log::info('Hello');
    }

    public function render()
    {
        if ($this->term != null) {
            Log::info('Hello');
        } else {
            $this->orderTable = Order::where('user_id', Auth::user()->id)
                ->where('status', 'paid')
                ->get();
        }

        return view('livewire.client.order.order-index', [
            'orderTable' => $this->orderTable,
        ]);
    }
}
