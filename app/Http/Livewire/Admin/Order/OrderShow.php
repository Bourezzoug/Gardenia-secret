<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;

class OrderShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $order;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->order = Order::find($this->itemId);
    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.order.order-show');
    }
}
