<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class BrandUpdate extends Component
{
    use WithFileUploads;

    public $itemId,$name, $image,$image_path;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
        return [
            'name'          => ['required', 'string',  Rule::unique(Brand::class)],
            'image'         => ['nullable'],
        ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Brand::find($this->itemId);
            $this->name = $item->name;
            $this->image_path    = $item->image;
        }
    }

    public function edit(){
        $this->validate();

        $data = [
            'name'      =>  $this->name,
        ];

        if (!empty($this->image)) {
            $photoUrl = $this->image->store('brands', 'public');
            $data['image'] = '/storage/' . $photoUrl;
        }

        Brand::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();

        $this->emit('refreshParent');

    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.brand.brand-update');
    }
}
