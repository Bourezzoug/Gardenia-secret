<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


class BlogCreate extends Component
{
    use InteractsWithBanner;
    // use ToastAlert;
    use WithFileUploads;

    // public $miseavant;
    public $title,$excerpt,$body,$slug,$seo_title,$meta_description,$photo,$status,$categorieID,$subCategory,$sous_categories,$sous_categorieID;

protected $listeners = ['bodyUpdated','showCreateModel','slugUpdated'];
public function slugUpdated($slug)
{
    $this->slug = $slug;
}

    protected function rules()
    {
        
    $rules =  [
        'title'                 =>  ['required', 'string'],
        'excerpt'               =>  ['required', 'string'],
        'body'                  =>  ['required', 'string'],
        'slug'                  =>  ['required','string'],
        'categorieID'           =>  ['required','string'],
        'seo_title'             =>  ['nullable','string'],
        'meta_description'      =>  ['nullable','string'],
        'photo'                 =>  'required|image|mimes:jpeg,png,jpg,webp',
        'status'                =>  ['required', 'string'],
    ];
    // if ($this->status !== 'En_attente') {
    //     $rules['publication_date'] = 'nullable|date';
    // } else {
    //     $rules['publication_date'] = 'required|date';
    // }
    return $rules;
    }
    public function bodyUpdated($value)
{
    $this->body = $value;
}
    public function create(){
        $this->validate();
        $subCat = null;
        // $publicationDate = date('Y-m-d H:i:s', strtotime($this->publication_date));
        if (!empty($this->subCategory)) {
            $subCat = Categorie::create([
                'parent_id' =>  $this->categorieID,
                'name'      =>  $this->subCategory,
                'slug'      =>  Str::slug($this->subCategory),
                'type'      =>  'Blog',
            ]);
        }


        $data = [
            'title'             => strtolower($this->title),
            'excerpt'           => $this->excerpt,
            'body'              => $this->body,
            'slug'              => $this->slug,
            'categorie_id'      => $subCat ? $subCat->id : ($this->sous_categorieID ?: $this->categorieID),
            'seo_title'         => $this->seo_title,
            'meta_description'  => $this->meta_description,
            'status'            => $this->status,
            'image'             => $this->photo,
        ];
        
        // if(!empty($this->publication_date)) {
        //     $data['publication_date'] =  $publicationDate;
        // }

        if (!empty($this->photo)) {
            $url = $this->photo->store('images','public');
            $data['image'] = '/storage/' . $url;
        }

        Blog::create($data);
        $this->emit('refreshParent');
        return Redirect::to('/admin/blog');

    }

    public function loadSousCategories()
    {
        if ($this->categorieID) {
            $hasSubcategories = Categorie::where('parent_id', $this->categorieID)
                ->where('type', 'Blog')
                ->exists();
    
            if ($hasSubcategories) {
                $this->sous_categories = Categorie::where('parent_id', $this->categorieID)
                    ->where('type', 'Blog')
                    ->pluck('name', 'id');
            } else {
                $this->sous_categories = [];
            }
        } else {
            $this->sous_categories = [];
        }
    }
    

    public function render()
    {
        $categories = Categorie::where('parent_id', null)
                                ->where('type', 'Blog')
                                ->pluck('name', 'id');
        
        $this->loadSousCategories();
    
        return view('livewire.admin.blog.blog-create', [
            'categories'        =>  $categories,
            'sous_categories'   =>  $this->sous_categories
        ]);
    }
    
}
