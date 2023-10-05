<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Categorie;
use App\Models\Category;
use App\Traits\ToastAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Laravel\Jetstream\InteractsWithBanner;

class CategoryDelete extends Component
{

    use AuthorizesRequests;
    use InteractsWithBanner;

    public $showDeleteModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel','showRestoreModel','showForceDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete(){
        $user = Categorie::findOrFail($this->itemId);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');

    }
    public function render()
    {
        return view('livewire.admin.category.category-delete');
    }
}
