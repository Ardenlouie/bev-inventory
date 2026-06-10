<?php

namespace App\Imports;

use App\Models\Furniture;
use App\Models\ShowAll;
use App\Models\Item;
use App\Models\User;
use App\Models\Department;
use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class FurnitureImports implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $company = Company::where('name', $row['company'])->first();
        $item = Item::where('name', $row['item'])->first();
        $user = User::where('name', $row['employee'])->first();
        $department = Department::where('name', $row['department'])->first();

        return new Furniture([
            'company_id'    => $company->id ?? null,
            'tag_id'        => $row['tag_id'],
            'item_id'     => $item->id ?? null,
            'item_name' => $row['item_name'],
            'employee_id'   => $user->id ?? null,
            'department_id' => $department->id ?? null,
            'date_acquired' => $row['date_acquired'],
            'status'        => $row['status'] ?? 'Available',
            'amount'        => $row['amount'],
            'specification'        => $row['specification'],
            'inclusions'        => $row['inclusions'],
            'issued_date'        => $row['issued_date'],
            'note'        => $row['note'],
        ]);
   
    }
}
