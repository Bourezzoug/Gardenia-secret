<?php

namespace App\Http\Livewire\Admin\Box;

use App\Models\Box;
use Livewire\Component;

class BoxIndex extends Component
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
        $product = Box::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $product = $product->search(trim($this->term));
        }

        $product = $product->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $product;

    }


    public function render()
    {
        return view('livewire.admin.box.box-index',[
            'boxes' =>  $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
