<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Categorie;
use App\Models\Category;
use App\Traits\ToastAlert;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryUpdate extends Component
{
    use InteractsWithBanner;


    public $itemId;

    public $categories;

    public $name, $color, $slug, $type
    ,$parentId;

    protected $listeners = ['showUpdateModel'];

    public bool $showUpdateModel = false;

    protected function rules()
    {
    return [
        'name'          => ['required', 'string', 'max:50', 'min:3', 'unique:categories,name,'.$this->itemId],
        'color'         => ['nullable', 'string'],
        'parentId'      => ['integer' , 'exists:App\Models\Category,id','nullable'],
    ];
    }

    public function mount($categories){
        $this->categories = Categorie::where('parent_id',null)->pluck('name','id');
    }

    public function showUpdateModel($itemId){
        $this->itemId = $itemId;
        $this->showUpdateModel = true;

        if (!empty($this->itemId)){
            $item = Categorie::find($this->itemId);
            $this->name = $item->name;
            $this->parentId = $item->parent_id;
            $this->color = $item->color;
            $this->type = $item->type;

        }
    }
    

    public function closeUpdateModel(){
        $this->showUpdateModel = false;
        $this->resetExcept('categories');
        $this->resetValidation();
        $this->resetErrorBag();
    }

    public function edit(){
        $this->validate();

        $data = [
            'name'      =>  $this->name,
            'slug'      =>  Str::slug($this->name),
            'color'     =>  $this->color,
            'type'      =>  $this->type,
            'parent_id' =>  $this->parentId,
        ];



        Categorie::where('id',$this->itemId)->update($data);
        $this->closeUpdateModel();

        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.admin.category.category-update');
    }
}
