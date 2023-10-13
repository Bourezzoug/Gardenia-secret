<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\WithFileUploads;



class BlogCreate extends Component
{
    use InteractsWithBanner;
    // use ToastAlert;
    use WithFileUploads;

    // public $miseavant;
    public $title,$excerpt,$body,$slug,$seo_title,$meta_description,$photo,$status,$categorie;

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
        'categorie'             =>  ['required','string'],
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
        // $publicationDate = date('Y-m-d H:i:s', strtotime($this->publication_date));
        $data = [
            'title'             =>  strtolower($this->title) ,
            'excerpt'           =>  $this->excerpt,
            'body'              =>  $this->body,
            'slug'              =>  $this->slug,
            'categorie'         =>  $this->categorie,
            'seo_title'         =>  $this->seo_title,
            'meta_description'  =>  $this->meta_description,
            'status'            =>  $this->status,
            'image'             =>  $this->photo,
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



    public function render()
    {

    
        return view('livewire.admin.blog.blog-create',[
            'categories'    =>  Categorie::where('type','Blog')->pluck('name','id'),
        ]);
    }
}
