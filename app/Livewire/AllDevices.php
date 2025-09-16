<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Laptop;
use App\Models\Device;
use App\Models\Company;

use Illuminate\Support\Facades\Session;

class AllDevices extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $device_id, $item_per_page, $status, $company_id;
    public $page_selected;
    

    public function changePage($page_selected) {
        $this->page_selected = $page_selected;
    }

    public function updatedSearch() {
        $this->resetPage('device-page');
    }

    public function updatedDeviceId() {
        $this->resetPage('device-page');
    }

    public function updatedItemPerPage() {
        $this->resetPage('device-page');
    }

     public function updatedStatus() {
        $this->resetPage('device-page');
    }

    public function mount() {
        $this->item_per_page = '5';
    }


    public function render()
    {
        $devices = Laptop::where(function ($query) {
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
                        ->orWhere('serial', 'like', '%'.$this->search.'%')
                        ->orWhere('name', 'like', '%'.$this->search.'%');
                    });
                }

                if(!empty($this->device_id)) {
                    $query->where('device_id', $this->device_id);
                }
                if(!empty($this->status)) {
                    $query->where('status', $this->status);
                }
        

     
            });

        if($this->item_per_page == 'all') {
            $devices = $devices->get();
        } else {
            $devices = $devices->paginate($this->item_per_page, ['*'], 'device-page')
            ->onEachSide(1);
        }

        $variants = Device::orderBy('id', 'asc')->get();
        $company = Company::orderBy('id', 'asc')->get();


        return view('livewire.all-devices')->with([
            'devices' => $devices,
            'variants' => $variants,
            'company' => $company,

        ]);
    }
}
