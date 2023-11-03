<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class BrandCreate extends Component
{
    use WithFileUploads;
    
    protected $listeners = ['showCreateModel'];

    public $name, $image;

    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }


    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('categories');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    protected function rules()
    {
        return [
            'name'          => ['required', 'string',  Rule::unique(Brand::class)],
            'image'         => ['nullable'],
        ];
    }

    public function create(){
        $this->validate();

        $data = [
            'name'      =>  $this->name,
        ];


        if (!empty($this->image)) {
            $photoUrl = $this->image->store('brands', 'public');
            $data['image'] = '/storage/' . $photoUrl;
        }

        Brand::create($data);
        $this->closeCreateModel();
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.brand.brand-create');
    }
}
