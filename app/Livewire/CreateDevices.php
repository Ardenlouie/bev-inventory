<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Laptop;
use App\Models\Company;
use App\Models\Device;
use App\Models\User;
use App\Models\Department;
use Carbon\Carbon;
use Milon\Barcode\DNS2D;

class CreateDevices extends Component
{
    public $company_id=1, $date_acquired, $device_id=1;
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

        $devices = Device::all();
        $devices_arr = [];
        foreach($devices as $devicess) {
            $devices_arr[$devicess->id] = $devicess->name;
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
            'Available' => 'Available',
            'Defective' => 'Defective',
        ];
        $company = Company::where('id', $this->company_id)->first();

        $company_name = $company->name;
        
        $device = Device::where('id', $this->device_id)->first();
        if($device->id == '1'){
            $device_name = 'L';
        } elseif($device->id == '2') {
            $device_name = 'D';
        } elseif($device->id == '3') {
            $device_name = 'P';
        } elseif($device->id == '4') {
            $device_name = 'AP';
        } elseif($device->id == '5') {
            $device_name = 'S';
        } elseif($device->id == '6') {
            $device_name = 'PJ';
        } elseif($device->id == '7') {
            $device_name = 'SP';
        } elseif($device->id == '8') {
            $device_name = 'C';
        } elseif($device->id == '9') {
            $device_name = 'U';
        } elseif($device->id == '10') {
            $device_name = 'SV';
        } elseif($device->id == '11') {
            $device_name = 'TL';
        } 

  
        $date_code = Carbon::parse($this->date_acquired)->format('mY');

        $currentMonthCount = Laptop::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $nextSequence = str_pad($currentMonthCount + 1, 3, '0', STR_PAD_LEFT);

        $acquiredDate = Carbon::parse($this->date_acquired);

        $now = Carbon::now();
        $years = $acquiredDate->diffInYears($now);
        $months = $acquiredDate->copy()->addYears($years)->diffInMonths($now);

        // Construct the age string
        $age = "{$years} year" . ($years != 1 ? 's' : '') . " and {$months} month" . ($months != 1 ? 's' : '');
        

        $this->tag_id = $company_name.'-ITD-'.$date_code.'-'.$nextSequence.$device_name;

        $tag_device = explode('-' ,$this->tag_id);

      



        return view('livewire.create-devices')->with([
            'users' => $users_arr,
            'age' => $age,
            'status_arr' => $status_arr,
            'status_arr' => $status_arr,
            'companies' => $companies_arr,
            'devices' => $devices_arr,
            'departments' => $departments_arr,
        ]);
    }
}
