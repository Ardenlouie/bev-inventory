<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Furniture;
use App\Models\Company;
use Carbon\Carbon;

class ShowDetailController extends Controller
{

    public function index($id)
    {
        $devices = Laptop::findOrFail(decrypt($id));

        $now = Carbon::now();
        $acquiredDate = Carbon::parse($devices->date_acquired);

        $years = $acquiredDate->diffInYears($now);
        $months = $acquiredDate->copy()->addYears($years)->diffInMonths($now);

        // Construct the age string
        $age = "{$years} year" . ($years != 1 ? 's' : '') . " and {$months} month" . ($months != 1 ? 's' : '');

        return view('details.show')->with([
            'devices' => $devices,
            'age' => $age,

        ]);
    }

    public function furniture($id)
    {
        $furnitures = Furniture::findOrFail(decrypt($id));

        $now = Carbon::now();
        $acquiredDate = Carbon::parse($furnitures->date_acquired);

        $years = $acquiredDate->diffInYears($now);
        $months = $acquiredDate->copy()->addYears($years)->diffInMonths($now);

        // Construct the age string
        $age = "{$years} year" . ($years != 1 ? 's' : '') . " and {$months} month" . ($months != 1 ? 's' : '');

        return view('details.furniture')->with([
            'furnitures' => $furnitures,
            'age' => $age,

        ]);
    }



}
