<?php

namespace App\Http\Livewire\Admin\Box;

use App\Models\Box;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class BoxUpdate extends Component
{
    use WithFileUploads;

    public $itemId,$nom_boxe,$cheap_lib,$cheap_price,$cheap_options,$cheap_description,$med_lib,$med_price,$med_options,$med_description,$exp_lib,$exp_price,$exp_options,$exp_description,$image,$image_path,$box_gallery,$box_gallery_path;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
        $rules =  [
            // 'photo'             =>  'required|image|mimes:jpeg,png,jpg,webp',
            'box_gallery'       =>  'nullable',
            'nom_boxe'          =>  ['required', 'string'],
            'cheap_lib'         =>  ['nullable', 'string'],
            'cheap_price'       =>  ['nullable', 'numeric'],
            'cheap_description' =>  ['nullable', 'string'],
            'cheap_options'     =>  ['nullable', 'string'],
            'med_lib'           =>  ['nullable', 'string'],
            'med_price'         =>  ['nullable', 'numeric'],
            'med_description'   =>  ['nullable', 'string'],
            'med_options'       =>  ['nullable', 'string'],
            'exp_lib'           =>  ['nullable', 'string'],
            'exp_price'         =>  ['nullable', 'numeric'],
            'exp_description'   =>  ['nullable', 'string'],
            'exp_options'       =>  ['nullable', 'string'],
        ];

        return $rules;
    }

    public function mount($id){
        $this->itemId = $id;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Box::find($this->itemId);
            $this->image_path = $item->image;
            $this->nom_boxe = $item->box_name;
            $this->cheap_lib = $item->cheap_libelle;
            $this->cheap_price = $item->cheap_price;
            $this->cheap_description = $item->cheap_description;
            $this->cheap_options = $item->cheap_options;
            $this->med_lib = $item->med_libelle;
            $this->med_price = $item->med_price;
            $this->med_description = $item->med_description;
            $this->med_options = $item->med_options;
            $this->exp_lib = $item->exp_libelle;
            $this->exp_price = $item->exp_price;
            $this->exp_description = $item->exp_description;
            $this->exp_options = $item->exp_options;
            $this->box_gallery_path = $item->gallery;
        }
        // dd(explode(',',$this->box_gallery_path));
    }

    public function deleteImage($index)
    {
        if (!empty($this->box_gallery)) {
            $gallery_images = $this->box_gallery;
            unset($gallery_images[$index]);
            $this->box_gallery = array_values($gallery_images);
        }
    
        if (!empty($this->box_gallery_path)) {
            $gallery_images_path = explode(",", $this->box_gallery_path);
            unset($gallery_images_path[$index]);
            $this->box_gallery_path = implode(",", $gallery_images_path);
        }
    }
    
    
    
    
    

    public function edit(){
        $this->validate();

        $data = [
            'box_name'          =>  $this->nom_boxe,
            'cheap_libelle'     => $this->cheap_lib,
            'cheap_price'       => $this->cheap_price,
            'cheap_description' => $this->cheap_description,
            'cheap_options'     => $this->cheap_options,
            'med_libelle'       => $this->med_lib,
            'med_price'         => $this->med_price,
            'med_description'   => $this->med_description,
            'med_options'       => $this->med_options,
            'exp_libelle'       => $this->exp_lib,
            'exp_price'         => $this->exp_price,
            'exp_description'   => $this->exp_description,
            'exp_options'       => $this->exp_options,
        ];

        if (!empty($this->image)) {
            $url = $this->image->store('Boxes','public');
            $data['image'] = '/storage/' . $url;
        }

        $gallery_images = [];

        if (!empty($this->box_gallery)) {
            foreach ($this->box_gallery as $image) {
                $url = $image->store('Boxes', 'public');
                $gallery_images[] = '/storage/' . $url;
            }
        }
    
        // If there are images in box_gallery_path, add them to the gallery images
        if (!empty($this->box_gallery_path)) {
            $gallery_images = array_merge($gallery_images, explode(',', $this->box_gallery_path));
        }
    
        // Update the Box model with the provided data
        $data['gallery'] = implode(',', $gallery_images);


        Box::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();
        $this->emit('refreshParent');
        return Redirect::to('/admin/box');
    }

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        return view('livewire.admin.box.box-update');
    }
}
