<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;
// use App\Traits\ToastAlert;
use Laravel\Jetstream\InteractsWithBanner;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;

class BlogDelete extends Component
{
    // use ToastAlert;
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

    public function delete(){


        $post = Blog::findOrFail($this->itemId);

        $image_path = public_path()  ;
        $image = $image_path . $post->image;
        if(file_exists($image)) {
            @unlink($image);
        }

        
        
        

        // $this->authorize('delete', $post);
        $post->forceDelete();
        $this->reset();
        $this->closeDeleteModel();
        return Redirect::to('/admin/blog');

        // $this->toast(__('Article supprimée'));


    }
    public function render()
    {
        return view('livewire.admin.blog.blog-delete');
    }
}
