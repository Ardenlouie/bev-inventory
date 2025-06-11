<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Furniture;
use App\Models\Item;
use App\Models\Company;

use Illuminate\Support\Facades\Session;

class AllFurnitures extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $item_id, $item_per_page, $status, $company_id;
    public $page_selected;
    

    public function changePage($page_selected) {
        $this->page_selected = $page_selected;
    }

    public function updatedSearch() {
        $this->resetPage('furniture-page');
    }

    public function updatedDeviceId() {
        $this->resetPage('furniture-page');
    }

    public function updatedItemPerPage() {
        $this->resetPage('furniture-page');
    }

     public function updatedStatus() {
        $this->resetPage('furniture-page');
    }

    public function mount() {

        $this->item_per_page = '5';

        
    }

    public function render()
    {
        $furnitures = Furniture::where(function ($query) {
            if (!empty($this->company_id)) { 
                $query->where('company_id', $this->company_id);
            }
        })
            ->whereHas('employee', function($query) {
                // searchs
                if(!empty($this->search)) {
                    $query->where(function($qry) {
                        $qry->where('model', 'like', '%'.$this->search.'%')
                        ->orWhere('specification', 'like', '%'.$this->search.'%')
                        ->orWhere('tag_id', 'like', '%'.$this->search.'%')
                        ->orWhere('name', 'like', '%'.$this->search.'%');
                    });
                }

                if(!empty($this->item_id)) {
                    $query->where('item_id', $this->item_id);
                }
                if(!empty($this->status)) {
                    $query->where('status', $this->status);
                }

    
            });

        if($this->item_per_page == 'all') {
            $furnitures = $furnitures->get();
        } else {
            $furnitures = $furnitures->paginate($this->item_per_page, ['*'], 'furniture-page')
            ->onEachSide(1);
        }

        $variants = Item::orderBy('id', 'asc')->get();
        $company = Company::orderBy('id', 'asc')->get();

        return view('livewire.all-furnitures')->with([
            'furnitures' => $furnitures,
            'variants' => $variants,
            'company' => $company,

        ]);
    }
}
