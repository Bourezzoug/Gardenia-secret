<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class ProductShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        $this->item = Product::find($this->itemId);
    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.product.product-show');
    }
}
