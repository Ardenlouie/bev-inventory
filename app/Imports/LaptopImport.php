<?php

namespace App\Imports;

use App\Models\Laptop;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LaptopImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Laptop([
            'company_id'    => $row['company_id'],
            'tag_id'        => $row['tag_id'],
            'device_id'     => $row['device_id'],
            'model'         => $row['model'],
            'serial'        => $row['serial'],
            'employee_id'   => $row['employee_id'],
            'department_id' => $row['department_id'],
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
    }
}
