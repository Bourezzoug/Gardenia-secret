<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class ProductDelete extends Component
{
    use InteractsWithBanner;
    use AuthorizesRequests;

    public $showDeleteModel = false;
    public $showRestoreModel = false;
    public $showForceDeleteModel = false;
    public $itemId;

    protected $listeners = ['showDeleteModel','showRestoreModel','showForceDeleteModel'];

    public function showDeleteModel($itemId){
        $this->itemId = $itemId;
        $this->showDeleteModel = true;
    }

    public function closeDeleteModel(){
        $this->showDeleteModel = false;
        $this->reset();
    }

    public function delete()
    {
        $post = Product::findOrFail($this->itemId);
    
        $image_path = public_path();
        $photo = $image_path . $post->photo;
        if (file_exists($photo)) {
            @unlink($photo);
        }
    
        // Delete gallery images
        $galleryImages = explode(',', $post->gallery);
        foreach ($galleryImages as $galleryImage) {
            $galleryPath = $image_path . $galleryImage;
            if (file_exists($galleryPath)) {
                @unlink($galleryPath);
            }
        }
    
        $post->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
    
        return redirect('/admin/product');
    }
    public function render()
    {
        return view('livewire.admin.product.product-delete');
    }
}
