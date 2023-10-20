<?php

namespace App\Http\Livewire\Client\Order;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class OrderIndex extends Component
{
    public ?string $term = null;
    public $selectedClients = [];
    public $selecteAll = false;
    public int $perPage = 10;
    public string $orderBy = 'id';
    public string $sortBy = 'desc';

    protected $listeners = [ 'refreshParent' => '$refresh'];

    public $readyToLoad = true;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function getItem(){
        $orders = Order::query();


        // * Search
        if (!empty($this->term)&& $this->term != null){
            $orders = $orders->search(trim($this->term));
        }




        $orders = $orders->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $orders;

    }

    public function search() {
        Log::info('message');
    }
    
    public function render()
    {
        // $orderTable = Order::where('user_id', Auth::user()->id)->get();
        return view('livewire.client.order.order-index',[
            'orderTable'        =>  $this->readyToLoad ? $this->getItem() : [],
            // 'orderTable'    =>  $orderTable
        ]);
    }
}
