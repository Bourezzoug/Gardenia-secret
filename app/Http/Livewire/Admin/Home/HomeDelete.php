<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\HomeSlider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class HomeDelete extends Component
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
        $slider = HomeSlider::findOrFail($this->itemId);
        $slider->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.home.home-delete');
    }
}
