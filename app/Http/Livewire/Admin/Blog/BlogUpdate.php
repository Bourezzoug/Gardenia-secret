<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\WithFileUploads;

class BlogUpdate extends Component
{
    use InteractsWithBanner;
    use WithFileUploads;

    public $itemId;

    public $title,$excerpt,$body,$source,$sous_categorieID,$source_link,$ordre,$publication_date,$categorieID,$video_youtube,$lien_video,$slug,$seo_title,$meta_description,$tags,$image,$author_id,$status,$image_path,$categorie;


    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;



    protected function rules()
    {
    return [
        'title'                 =>  ['required', 'string', 'max:255', 'min:5'],
        'excerpt'               =>  ['required', 'string','min:5'],
        'body'                  =>  ['required', 'string'],
        'meta_description'      =>  ['nullable','string','max:255', 'min:5'],
        'image'                 =>  'nullable|image|mimes:jpeg,png,jpg,webp',
        'status'                =>  ['required', 'string', 'max:50', 'min:5'],
        'slug'                  =>  ['required','string','max:255', 'min:5'],
        'seo_title'             =>  ['nullable','string','max:255', 'min:5'],
    ];
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Blog::find($this->itemId);
            $this->title = $item->title;
            $this->excerpt = $item->excerpt ;
            $this->body =   $item->body ;
            $this->emit('updateBody', $this->body);
            $this->status =   $item->status ;
            $this->categorie =   $item->categorie ;
            $this->slug =   $item->slug ;
            $this->image_path = $item->image;
            $this->meta_description = $item->meta_description;
            $this->seo_title = $item->seo_title;

        }
    }

    public function edit(){
        $this->validate();
        $this->slug = str_replace(' ', '-', $this->slug);
        $data = [
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'slug' => $this->slug,
            'seo_title' => $this->seo_title,
            'meta_description' => $this->meta_description,
            'status' => $this->status,
            'categorie_id' => $this->categorieID,
        ];

        if (!empty($this->image)) {
            $url = $this->image->store('images', 'public');
            $data['image'] = '/storage/' . $url;
        }


        Blog::where('id',$this->itemId)->update($data);
        return Redirect::to('/admin/blog');

    }
    public function bodyUpdated($value)
    {
        $this->body = $value;
    }
    
    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->reset();
        $this->resetValidation();
        $this->resetErrorBag();
    }


    public function render()
    {
        return view('livewire.admin.blog.blog-update',[
            'categories'    =>  Categorie::where('type','Blog')->pluck('name','id'),
        ]);
    }
}

