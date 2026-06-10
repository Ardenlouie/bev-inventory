<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShowAll;
use App\Models\Laptop;
use App\Models\Furniture;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class ShowDetailController extends Controller
{

    public function index($id)
    {
        $db = Session::get('db_connection', 'mysql');
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
        $db = Session::get('db_connection', 'mysql');

        $furnitures = Furniture::on($db)->findOrFail(decrypt($id));

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
