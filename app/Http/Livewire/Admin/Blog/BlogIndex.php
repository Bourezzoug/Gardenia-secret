<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog ;
use Livewire\Component;

class BlogIndex extends Component
{
    public ?string $term = null;

    public int $perPage = 10;

    public string $orderBy = 'id';
    public string $sortBy = 'asc';

    public $readyToLoad = false;

    public function loadItems()
    {
        $this->readyToLoad = true;
    }

    public function selectedItem($action ,$itemId = null){
        if ($action == 'create'){
            $this->emit('showCreateModel');
        }elseif ($action == 'update'){
            $this->emit('showUpdateModel', $itemId);
        }elseif ($action == 'show'){
            $this->emit('showItemModel', $itemId);
        }elseif ($action == 'delete'){
            $this->emit('showDeleteModel', $itemId);
        }elseif ($action == 'restore'){
            $this->emit('showRestoreModel', $itemId);
        }
    }

    public function getItem(){
        $blog = Blog::query();
        // * Search
        if (!empty($this->term)&& $this->term != null){
            $blog = $blog->search(trim($this->term));
        }

        $blog = $blog->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);

        return $blog;

    }


    public function render()
    {
        return view('livewire.admin.blog.blog-index',[
            'posts' => $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
