<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeCreate extends Component
{
    use WithFileUploads;

    protected $listeners = ['showCreateModel'];

    public $title,$description,$button,$image;

    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    protected function rules()
    {
        return [
            'title'         => ['required', 'string'],
            'description'   => ['required', 'string' ],
            'button'        => ['string','nullable'],
        ];
    }

    public function create(){
        $this->validate();

        $data = [
            'title'         =>  $this->title,
            'description'   =>  $this->description,
            'button'        =>  $this->button,
        ];


        if (!empty($this->image)) {
            $photoUrl = $this->image->store('slider', 'public');
            $data['image'] = '/storage/' . $photoUrl;
        }

        HomeSlider::create($data);
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
        return view('livewire.admin.home.home-create');
    }
}
