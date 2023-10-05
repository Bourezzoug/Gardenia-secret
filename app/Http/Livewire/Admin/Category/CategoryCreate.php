<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Categorie;
use App\Models\Category;
use App\Traits\ToastAlert;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryCreate extends Component
{

    use InteractsWithBanner;


    public $categories;

    public $name, $color, $slug, $order
    ,$parentId;

    protected $listeners = ['showCreateModel'];


    public bool $showCreateModel = false;

    public function showCreateModel(){
        $this->showCreateModel = true;
    }


    public function closeCreateModel(){
        $this->showCreateModel = false;
        $this->resetExcept('categories');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    protected function rules()
    {
    return [
        'name'          => ['required', 'string', 'max:50', 'min:3', Rule::unique(Categorie::class)],
        'color'         => ['nullable', 'string' ],
        'parentId'      => ['integer' , 'exists:App\Models\Category,id','nullable'],
    ];
    }

    public function create(){
        $this->validate();

        $data = [
            'name'      =>  $this->name,
            'slug'      =>  Str::slug($this->name),
            'color'     =>  $this->color,
            'parent_id' =>  $this->parentId,
        ];

        Categorie::create($data);
        $this->closeCreateModel();
        $this->emit('refreshParent');

    }

    public function mount($categories){
        $this->categories = Categorie::where('parent_id',null)->pluck('name','id');
    }

    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
