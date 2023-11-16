<?php

namespace App\Http\Livewire\Admin\Faq;

use App\Models\Faq;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class FaqCreate extends Component
{
    use InteractsWithBanner;


    public $categories;

    public $question,$answer;

    protected $listeners = ['showCreateModel'];


    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    protected function rules()
    {
    return [
        'question'  => ['required', 'string', ],
        'answer'    => ['required', 'string' ],
    ];
    }

    public function create(){
        $this->validate();

        $data = [
            'question'  =>  $this->question,
            'answer'    =>  $this->answer,
        ];

        Faq::create($data);
        $this->closeCreateModel();
        $this->emit('refreshParent');

    }


    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('categories');
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        return view('livewire.admin.faq.faq-create');
    }
}
