<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;

class OrderIndex extends Component
{
    public ?string $term = null;

    public int $perPage = 10;

    public string $orderBy = 'id';
    public string $sortBy = 'asc';

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function selectedItem($action ,$itemId = null){
        if ($action == 'create'){
            $this->emit('showCreateModel');
        }elseif ($action == 'update'){
            $this->emit('showUpdateModel', $itemId);
        }elseif ($action == 'show'){
            $this->emit('showItemModel', $itemId);
        }elseif ($action == 'delete'){
            $this->emit('showDeleteModel', $itemId);
        }elseif ($action == 'restore'){
            $this->emit('showRestoreModel', $itemId);
        }
    }

    public function getItem(){
        $order = Order::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $order = $order->search(trim($this->term));
        }

        $order = $order->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $order;

    }


    public function render()
    {
        return view('livewire.admin.order.order-index',[
            'orders' =>  $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
