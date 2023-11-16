<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;

class FaqIndex extends Component
{
    public ?string $term = null;

    public $selectedFaqs = [];
    
    public $selecteAll = false;

    protected $listeners = [ 'refreshParent' => '$refresh'];

    public int $perPage = 10;

    public string $orderBy = 'id';
    public string $sortBy = 'asc';
    public string $type = '';

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function mount() {
        $this->selectedFaqs = collect();
    }

    public function deleteSelected() {
        Faq::query()->whereIn('id',$this->selectedFaqs)->forceDelete();
        $this->selectedFaqs = [];
        $this->selecteAll = false;
    }


    public function updatedSelecteAll($value) {
        if($value) {
            $this->selectedFaqs = $this->getItem()->pluck('id');
        }
        else{
            $this->selectedFaqs = [];
        }
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
        $users = Faq::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $users = $users->search(trim($this->term));
        }


        if (!empty($this->type)&& $this->type != null){
            $users = $users->where('type',$this->type);
        }

        $categories = $users->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $categories;

    }

    public function render()
    {
        return view('livewire.admin.faq.faq-index',[
            'faq' => $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
