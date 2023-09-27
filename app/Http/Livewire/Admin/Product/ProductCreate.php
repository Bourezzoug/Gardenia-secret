<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $nom,$description,$prix,$quantite,$photo,$gallery;

    protected $listeners = ['descriptionUpdated'];

    protected function rules()
    {
        
    return  [
        // 'nom'           =>  ['required', 'string'],
        // 'description'   =>  ['required', 'string'],
        // 'prix'          =>  ['required', 'number'],
        // 'quantite'      =>  ['required','integer'],
        // 'photo'         =>  ['nullable','string'],
        // 'gallery'       =>  ['nullable','string'],
    ];
    }

    public function descriptionUpdated($value)
    {
        $this->description = $value;
    }

    public function create()
    {
        // $this->validate();
    
        $data = [
            'nom' => strtolower($this->nom),
            'description' => $this->description,
            'prix' => $this->prix,
            'quantite' => $this->quantite ?? 0,
            'photo' => $this->photo,
            'gallery' => $this->gallery,
        ];
    
        if (!empty($this->photo)) {
            $photoUrl = $this->photo->store('images', 'public');
            $data['photo'] = '/storage/' . $photoUrl;
        }
    
        if (!empty($this->gallery)) {
            $galleryUrls = [];
            foreach ($this->gallery as $galleryImage) {
                $galleryUrl = $galleryImage->store('images', 'public');
                $galleryUrls[] = '/storage/' . $galleryUrl;
            }
            $data['gallery'] = implode(',', $galleryUrls);
        }
    
        Product::create($data);
    
        $this->emit('refreshParent');
    
        return redirect('/admin/product');
    } 
    public function render()
    {
        return view('livewire.admin.product.product-create');
    }
}
