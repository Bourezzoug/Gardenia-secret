<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class FaqDelete extends Component
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
        $faq = Faq::findOrFail($this->itemId);
        $faq->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        $this->emit('refreshParent');

    }
    public function render()
    {
        return view('livewire.admin.faq.faq-delete');
    }
}
