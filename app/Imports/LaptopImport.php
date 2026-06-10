<?php

namespace App\Imports;

use App\Models\Laptop;
use App\Models\ShowAll;
use App\Models\Device;
use App\Models\User;
use App\Models\Department;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaptopImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $company = Company::where('name', $row['company'])->first();
        $device = Device::where('name', $row['device'])->first();
        $user = User::where('name', $row['employee'])->first();
        $department = Department::where('name', $row['department'])->first();

        return new Laptop([
            'company_id'    => $company->id ?? null,
            'tag_id'        => $row['tag_id'],
            'device_id'     => $device->id ?? null,
            'model'         => $row['model'],
            'serial'        => $row['serial'],
            'employee_id'   => $user->id ?? null,
            'department_id' => $department->id ?? null,
            'date_acquired' => $row['date_acquired'],
            'status'        => $row['status'] ?? 'Available',
            'amount'        => $row['amount'],
            'specification'        => $row['specification'],
            'os'        => $row['os'],
            'office'        => $row['office'],
            'inclusions'        => $row['inclusions'],
            'issued_date'        => $row['issued_date'],
            'note'        => $row['note'],
            'previous_owner'        => $row['previous_owner'],
            'ds'        => $row['ds'],

        ]);

        // return new ShowAll([
        //     'company_id'    => $company->id ?? null,
        //     'tag_id'        => $row['tag_id'],
        //     'device_id'     => $device->id ?? null,
        //     'model'         => $row['model'],
        //     'serial'        => $row['serial'],
        //     'employee_id'   => $user->id ?? null,
        //     'department_id' => $department->id ?? null,
        //     'date_acquired' => $row['date_acquired'],
        //     'status'        => $row['status'] ?? 'Available',
        //     'amount'        => $row['amount'],
        //     'specification'        => $row['specification'],
        //     'os'        => $row['os'],
        //     'office'        => $row['office'],
        //     'inclusions'        => $row['inclusions'],
        //     'issued_date'        => $row['issued_date'],
        //     'note'        => $row['note'],
        //     'previous_owner'        => $row['previous_owner'],
        //     'ds'        => $row['ds'],

        // ]);
    }
}
