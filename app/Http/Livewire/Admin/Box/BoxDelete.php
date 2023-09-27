<?php

namespace App\Http\Livewire\Admin\Box;

use App\Models\Box;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class BoxDelete extends Component
{
    use AuthorizesRequests;
    use InteractsWithBanner;

    public $showDeleteModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete(){
        $user = Box::findOrFail($this->itemId);
        $user->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');
        return Redirect::to('/admin/box');
    }
    public function render()
    {
        return view('livewire.admin.box.box-delete');
    }
}
