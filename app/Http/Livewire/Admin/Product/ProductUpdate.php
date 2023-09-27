<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductUpdate extends Component
{
    use InteractsWithBanner;
    use WithFileUploads;

    public $itemId;

    public $nom,$prix,$description,$quantite,$gallery,$source_link,$ordre,$publication_date,$categorieID,$video_youtube,$lien_video,$slug,$seo_title,$meta_description,$tags,$image,$author_id,$status,$image_path;


    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
    return [
        'nom'                   =>  ['required', 'string', 'max:255', 'min:5'],
        'prix'                  =>  ['required'],
        'quantite'              =>  ['required'],
        'description'           =>  ['nullable','string','max:255', 'min:5'],
        'image'                 =>  'nullable|image|mimes:jpeg,png,jpg,webp',
        'gallery'               =>  ['nullable'],
    ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Product::find($this->itemId);
            $this->nom = $item->nom;
            $this->prix = $item->prix ;
            $this->description =   $item->description ;
            $this->emit('updateBody', $this->description);
            $this->quantite =   $item->quantite ;
            $this->image_path = $item->photo;
            $this->gallery = $item->gallery;
        }
    }
    public function edit(){
        $this->validate();

        $data = [
            'nom' => $this->nom,
            'prix' => $this->prix,
            'description' => $this->description,
            'quantite' => $this->quantite,
        ];

        if (!empty($this->image)) {
            $url = $this->image->store('images', 'public');
            $data['photo'] = '/storage/' . $url;
        }


        Product::where('id',$this->itemId)->update($data);
        return Redirect::to('/admin/product');

    }

    public function bodyUpdated($value)
    {
        $this->description = $value;
    }
    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.admin.product.product-update');
    }
}
