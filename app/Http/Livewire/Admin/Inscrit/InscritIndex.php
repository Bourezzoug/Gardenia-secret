<?php

namespace App\Http\Livewire\Admin\Inscrit;

use App\Models\Inscrit;
use Livewire\Component;
use Spatie\SimpleExcel\SimpleExcelWriter;
class InscritIndex extends Component
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


    public function ExportCSV() {
        $rows = [];
        $writer = SimpleExcelWriter::create('inscrits.xlsx');
        Inscrit::chunk(2000,function($inscrits) use (&$rows) {
            foreach($inscrits->toArray() as $inscrit) {
                // unset($inscrit['code_verification']);
                // unset($inscrit['updated_at']);
                // $inscrit['verified'] = ($inscrit['verified'] == 1 ? 'oui' : 'non');
                $rows[] =  $inscrit;
            }
            
        });
        
    
        $writer
        ->addHeader(['id', 'Nom Complet','Email','Ville','Date de création'])
        ->addRows($rows);
            return response()->download('inscrits.xlsx');
            // dd($rows);
        }

        public function getItem(){
            $inscrit = Inscrit::query();
            // * Search
            if (!empty($this->term)&& $this->term != null){
                $inscrit = $inscrit->search(trim($this->term));
            }
    
            $inscrit = $inscrit->orderBy($this->orderBy, $this->sortBy)->paginate($this->perPage);
    
            return $inscrit;
    
        }


    public function render()
    {
        return view('livewire.admin.inscrit.inscrit-index',[
            'inscrits'  =>  $this->readyToLoad ? $this->getItem() : [],
        ]);
    }
}
