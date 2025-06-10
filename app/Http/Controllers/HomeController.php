<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

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
        $laptops = Laptop::where('device_id', 1)->count();
        $desktops = Laptop::where('device_id', 2)->count();
        $printers = Laptop::where('device_id', 3)->count();
        $aps = Laptop::where('device_id', 4)->count();
        $switches = Laptop::where('device_id', 5)->count();
        $projectors = Laptop::where('device_id', 6)->count();
        $smartphones = Laptop::where('device_id', 7)->count();
        $cctvs = Laptop::where('device_id', 8)->count();
        $ups = Laptop::where('device_id', 9)->count();
        $servers = Laptop::where('device_id', 10)->count();

        return view('home')->with([
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
            
        ]);
    }
}
