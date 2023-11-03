<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class BrandDelete extends Component
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
        $user = Brand::findOrFail($this->itemId);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.brand.brand-delete');
    }
}
