<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogShow extends Component
{
    public $showItemModel = false;
    public $itemId;
    public $item;

    protected $listeners = ['showItemModel'];

    public function showItemModel($itemId){
        $this->itemId = $itemId;
        $this->showItemModel = true;
        // if (!empty($this->users)){
        //     $this->item = $this->item->where('author_id',$this->users);
        // }
        $this->item = Blog::find($this->itemId);
            // dd($itemId);
    }
    
    public function closeItemModel(){
        $this->showItemModel = false;
        $this->reset();
    }
    public function render()
    {
        return view('livewire.admin.blog.blog-show');
    }
}
