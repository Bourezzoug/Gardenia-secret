<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class ProductIndex extends Component
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
        $product = Product::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $product = $product->search(trim($this->term));
        }

        $product = $product->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $product;

    }


    public function render()
    {
        return view('livewire.admin.product.product-index',[
            'products' =>  $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
