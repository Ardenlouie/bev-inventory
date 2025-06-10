<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Company;

class ShowDetailController extends Controller
{

    public function index($id)
    {
        $devices = Laptop::findOrFail(decrypt($id));

        return view('details.show')->with([
            'devices' => $devices,

        ]);
    }



}
