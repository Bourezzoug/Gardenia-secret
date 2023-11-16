<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\HomeSlider;
use Livewire\Component;

class HomeUpdate extends Component
{

    public $itemId,$title,$description,$button, $image,$image_path;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
        return [
            'title'         => ['required', 'string'],
            'description'   => ['required', 'string' ],
            'button'        => ['string','nullable'],
        ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item               = HomeSlider::find($this->itemId);
            $this->title        = $item->title;
            $this->description  = $item->description;
            $this->button       = $item->button;
            $this->image_path   = $item->image;
        }
    }

    public function edit(){
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

        HomeSlider::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();

        $this->emit('refreshParent');

    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('categories');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.home.home-update');
    }
}
