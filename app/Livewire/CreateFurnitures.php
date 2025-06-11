<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Furniture;
use App\Models\Company;
use App\Models\Item;
use App\Models\User;
use App\Models\Department;
use Carbon\Carbon;
use Milon\Barcode\DNS2D;

class CreateFurnitures extends Component
{
    public $company_id=1, $date_acquired, $item_id=1, $department_id=1;
    public $tag_id;

    public function mount()
    {
        $this->date_acquired = Carbon::now()->format('Y-m-d'); // Set the current date
    }

    public function render()
    {
        $companies = Company::all();
        $companies_arr = [];
        foreach($companies as $company) {
            $companies_arr[$company->id] = $company->name;

        }

        $items = Item::all();
        $items_arr = [];
        foreach($items as $item) {
            $items_arr[$item->id] = $item->name;
        }

        $users = User::all();
        $users_arr = [];
        foreach($users as $user) {
            $users_arr[$user->id] = $user->name;
        }

        $departments = Department::all();
        $departments_arr = [];
        foreach($departments as $department) {
            $departments_arr[$department->id] = $department->name;
        }

        $status_arr = [
            'Assigned' => 'Assigned',
            'Available' => 'Available'
        ];
        $company = Company::where('id', $this->company_id)->first();

        $company_name = $company->name;

        $department = Department::where('id', $this->department_id)->first();
        if($department->id == '1'){
            $department_name = 'ITD';
        } elseif($department->id == '2') {
            $department_name = 'MKT';
        } elseif($department->id == '3') {
            $department_name = 'HRD';
        } elseif($department->id == '4') {
            $department_name = 'SLS';
        } elseif($department->id == '5') {
            $department_name = 'SCM';
        } elseif($department->id == '6') {
            $department_name = 'FND';
        } 
        
        $item = Item::where('id', $this->item_id)->first();
        if($item->id == '1'){
            $item_name = 'OT';
        } elseif($item->id == '2') {
            $item_name = 'CH';
        } elseif($item->id == '3') {
            $item_name = 'CB';
        } elseif($item->id == '4') {
            $item_name = 'OR';
        } elseif($item->id == '5') {
            $item_name = 'SC';
        } elseif($item->id == '6') {
            $item_name = 'DC';
        }
        
  
  
        $date_code = Carbon::parse($this->date_acquired)->format('mY');

        $currentMonthCount = Furniture::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $nextSequence = str_pad($currentMonthCount + 1, 3, '0', STR_PAD_LEFT);

        $acquiredDate = Carbon::parse($this->date_acquired);

        $now = Carbon::now();
        $years = $acquiredDate->diffInYears($now);
        $months = $acquiredDate->copy()->addYears($years)->diffInMonths($now);

        // Construct the age string
        $age = "{$years} year" . ($years != 1 ? 's' : '') . " and {$months} month" . ($months != 1 ? 's' : '');

        $this->tag_id = $company_name.'-'.$department_name.'-'.$date_code.'-'.$nextSequence.$item_name;


        return view('livewire.create-furnitures')->with([
            'users' => $users_arr,
            'age' => $age,
            'status_arr' => $status_arr,
            'status_arr' => $status_arr,
            'companies' => $companies_arr,
            'items' => $items_arr,
            'departments' => $departments_arr,
        ]);
    }
}
