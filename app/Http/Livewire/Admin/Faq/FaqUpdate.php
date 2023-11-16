<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Livewire\Component;

class FaqUpdate extends Component
{
    public $itemId;

    public $question,$answer;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
        return [
            'question'  => ['required', 'string', ],
            'answer'    => ['required', 'string' ],
        ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item           = Faq::find($this->itemId);
            $this->question = $item->question;
            $this->answer   = $item->answer;
        }
    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function edit(){
        $this->validate();

        $data = [
            'question'  =>  $this->question,
            'answer'    =>  $this->answer,
        ];



        Faq::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();

        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.faq.faq-update');
    }
}
