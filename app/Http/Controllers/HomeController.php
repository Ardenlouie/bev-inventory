<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Furniture;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $all_devices = Laptop::all()->map(function ($item) {
            $item->asset_type = 'IT Equipment';
            return $item;
        });

        $all_furnitures = Furniture::all()->map(function ($item) {
            $item->asset_type = 'Furniture';
            return $item;
        });

         $all_furnituress = Furniture::all()->map(function ($item) {
            $item->asset_type = 'Furniture';
            return $item;
        });

        $all_inventory = $all_devices->concat($all_furnitures);

        $laptops = $all_devices->where('device_id', 1)->count();
        $desktops = $all_devices->where('device_id', 2)->count();
        $printers = $all_devices->where('device_id', 3)->count();
        $aps = $all_devices->where('device_id', 4)->count();
        $switches = $all_devices->where('device_id', 5)->count();
        $projectors = $all_devices->where('device_id', 6)->count();
        $smartphones = $all_devices->where('device_id', 7)->count();
        $cctvs = $all_devices->where('device_id', 8)->count();
        $ups = $all_devices->where('device_id', 9)->count();
        $servers = $all_devices->where('device_id', 10)->count();
        $tools =  $all_devices->where('device_id', 11)->count();
        $telephone = $all_devices->where('device_id', 12)->count();
        $biometrics = $all_devices->where('device_id', 13)->count();
        $external = $all_devices->where('device_id', 14)->count();

        $first_bevi = $all_inventory->where('department_id', 1);
        $first_bevi_laptop = $first_bevi->where('device_id', 1);
        $first_bevi_count = $first_bevi->count();

        $second_bevi = Laptop::whereIn('department_id', [3, 4, 12])->get();
        $second_bevi_count = $second_bevi->count();

        $third_bevi = Laptop::whereIn('department_id', [1])->get();
        $third_bevi_count = $third_bevi->count();

        $fourth_bevi = Laptop::whereIn('department_id', [6, 5])->get();
        $fourth_bevi_count = $fourth_bevi->count();

        $fifth_bevi = Laptop::whereIn('department_id', [10, 13])->get();
        $fifth_bevi_count = $fifth_bevi->count();


        return view('home')->with([
            'all_devices' => $all_devices,
            'all_furnitures' => $all_furnitures,
            'all_inventory' => $all_inventory,
            'laptops' => $laptops,
            'desktops' => $desktops,
            'printers' => $printers,
            'aps' => $aps,
            'switches' => $switches,
            'projectors' => $projectors,
            'smartphones' => $smartphones,
            'cctvs' => $cctvs,
            'ups' => $ups,
            'servers' => $servers,
            'tools' => $tools,
            'telephone' => $telephone,
            'biometrics' => $biometrics,
            'external' => $external,
            'first_bevi' => $first_bevi,
            'first_bevi_count' => $first_bevi_count,
            'second_bevi' => $second_bevi,
            'second_bevi_count' => $second_bevi_count,
            'third_bevi' => $third_bevi,
            'third_bevi_count' => $third_bevi_count,
            'fourth_bevi' => $fourth_bevi,
            'fourth_bevi_count' => $fourth_bevi_count,
            'fifth_bevi' => $fifth_bevi,
            'fifth_bevi_count' => $fifth_bevi_count,
            
        ]);
    }
}
