<?php

namespace App\Http\Livewire\Admin\Box;

use App\Models\Box;
use Illuminate\Support\Facades\Redirect;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithFileUploads;


class BoxCreate extends Component
{
    use InteractsWithBanner;
    use WithFileUploads;

    public $cheap_lib,$cheap_price,$cheap_options,$cheap_description,$med_lib,$med_price,$med_options,$med_description,$exp_lib,$exp_price,$exp_options,$exp_description,$photo,$box_gallery,$nom_boxe;

    protected $listeners = ['showCreateModel'];


    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }

    protected function rules()
    {
        $rules =  [
            'photo'             =>  'required|image|mimes:jpeg,png,jpg,webp',
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

    public function deleteImage($index)
{
    unset($this->box_gallery[$index]);
    $this->box_gallery = array_values($this->box_gallery); // Reindex the array
}


    public function create()
    {
        $this->validate();
        
        // Split the options by line breaks and join them with commas
        $cheap_options = implode(',', preg_split('/\R/', $this->cheap_options));
        $med_options = implode(',', preg_split('/\R/', $this->med_options));
        $exp_options = implode(',', preg_split('/\R/', $this->exp_options));
        
        $data = [
            'box_name'              =>  $this->nom_boxe,
            'cheap_libelle'         =>  $this->cheap_lib,
            'cheap_price'           =>  $this->cheap_price,
            'cheap_description'     =>  $this->cheap_description,
            'cheap_options'         =>  $cheap_options,
            'med_libelle'           =>  $this->med_lib,
            'med_price'             =>  $this->med_price,
            'med_description'       =>  $this->med_description,
            'med_options'           =>  $med_options,
            'exp_libelle'           =>  $this->exp_lib,
            'exp_price'             =>  $this->exp_price,
            'exp_description'       =>  $this->exp_description,
            'exp_options'           =>  $exp_options,
        ];
        
        if (!empty($this->photo)) {
            $url = $this->photo->store('Boxes','public');
            $data['image'] =  '/storage/' . $url;
        }

        if (!empty($this->box_gallery)) {
            $urls = [];
            foreach ($this->box_gallery as $image) {
                $url = $image->store('Boxes', 'public');
                $urls[] = '/storage/' . $url;
            }
            $data['gallery'] = implode(',',$urls);
        }
        
        
        Box::create($data);
        $this->closeCreateModel();
        $this->emit('refreshParent');
        return Redirect::to('/admin/box');
            // dd($this->box_gallery);
    }
    

    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }
    public function render()
    {
        return view('livewire.admin.box.box-create');
    }
}
