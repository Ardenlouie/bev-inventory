@extends('adminlte::page')

@section('title')
BEV INVENTORY
@endsection

@section('css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1></h1>
    </div>

</div>
@endsection

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-bold text-slate-800">Infrastructure Breakdown</h2>
    <p class="text-slate-500 text-sm">Click a location to view floors, then click a floor to view detailed computer counts.</p>
</div>
<div class="row mb-6">
    <div class="col-6">
        <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
            <button onclick="toggleContainer('hq-floors', 'hq-arrow')" class="w-full flex items-center justify-between p-5 bg-white hover:bg-slate-50 text-left font-semibold text-slate-700 focus:outline-hidden cursor-pointer">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-amber-100 text-amber-600 rounded-lg">
                        <i class="fa-solid fa-building text-xl"></i>
                    </div>
                    <div>
                        <span class="block text-xl font-bold text-slate-800">BEVI Beauty Elements Ventures Incorporated</span>
                        <span class="text-xs text-slate-400 font-normal">9002-1 Aranga, San Antonio, Makati City, Metro Manila</span>
                    </div>
                </div>
                <i id="hq-arrow" class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-200 text-sm"></i>
            </button>
            <div id="hq-floors" class="hidden border-t border-slate-100 bg-slate-50/50 divide-y divide-slate-100">
                <div>
                    <button onclick="toggleContainer('hq-f1-details', 'hq-f1-arrow')" class="w-full flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 pl-16 hover:bg-slate-100/80 text-left cursor-pointer gap-4 sm:gap-0">
                        <div>
                            <p class="font-semibold text-slate-700">1st Floor - Lobby</p>
                            <p class="text-xs text-slate-400">Click to view items</p>
                        </div>
                        
                        <div class="flex items-center space-x-4 w-full sm:w-auto justify-between sm:justify-end">
                            <div class="grid grid-cols-2 gap-2 text-center text-xs font-bold">
                                <span class="bg-amber-100 text-amber-800 px-3 py-1.5 rounded-lg border border-amber-200 flex items-center justify-center gap-1.5">
                                    <i class="fa-solid fa-laptop text-amber-600"></i>
                                    {{$first_bevi_count}} IT Equipments
                                </span>
                                
                                <span class="bg-slate-100 text-slate-700 px-3 py-1.5 rounded-lg border border-slate-200 flex items-center justify-center gap-1.5">
                                    <i class="fa-solid fa-chair text-slate-500"></i>
                                    0 Furnitures
                                </span>
                            </div>
                            
                            <i id="hq-f1-arrow" class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-200 text-xs hidden sm:block"></i>
                        </div>
                    </button>
                    <div id="hq-f1-details" class="hidden bg-white pl-20 pr-6 py-3 text-sm text-slate-600 space-y-2 border-t border-slate-100">
                        @foreach($first_bevi as $first_floor)
                            <div class="flex justify-between py-1 border-b border-slate-50">
                                <span>
                                    <i class="fa-solid fa-laptop mr-2 text-slate-400"></i>{{$first_floor->name}}
                                </span> 
                                <span class="font-mono font-semibold">10 units</span>
                            </div>
                        @endforeach
                    </div>
               

                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="bg-white rounded-xl shadow-xs border border-slate-200 overflow-hidden">
            <!-- Location Header (Clickable) -->
            <button onclick="toggleContainer('branch-floors', 'branch-arrow')" class="w-full flex items-center justify-between p-5 bg-white hover:bg-slate-50 text-left font-semibold text-slate-700 focus:outline-hidden cursor-pointer">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-amber-100 text-amber-600 rounded-lg">
                        <i class="fa-solid fa-city text-xl"></i>
                    </div>
                    <div>
                        <span class="block text-xl font-bold text-slate-800">BIGi / Basic Integrated Global Inc.</span>
                        <span class="text-xs text-slate-400 font-normal">1262 Batangas st, corner Honduras, Brgy. San Isidro, Makati City, Metro Manila</span>
                    </div>
                </div>
                <i id="branch-arrow" class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-200 text-sm"></i>
            </button>

            <!-- Floors Container (Initially Hidden) -->
            <div id="branch-floors" class="hidden border-t border-slate-100 bg-slate-50/50 divide-y divide-slate-100">
                
                <!-- Branch - Ground Floor Dropdown -->
                <div>
                    <button onclick="toggleContainer('br-g-details', 'br-g-arrow')" class="w-full flex justify-between items-center p-4 pl-16 hover:bg-slate-100/80 text-left cursor-pointer">
                        <div>
                            <p class="font-semibold text-slate-700">Ground Floor - Logistics</p>
                            <p class="text-xs text-slate-400">Click to view items</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full border border-amber-200">
                                15 Computers
                            </span>
                            <i id="br-g-arrow" class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-200 text-xs"></i>
                        </div>
                    </button>
                    <!-- Ground Floor Inner Details -->
                    <div id="br-g-details" class="hidden bg-white pl-20 pr-6 py-3 text-sm text-slate-600 space-y-2 border-t border-slate-100">
                        <div class="flex justify-between py-1 border-b border-slate-50"><span><i class="fa-solid fa-print mr-2 text-slate-400"></i>Rugged Shipping Terminals</span> <span class="font-mono font-semibold">12 units</span></div>
                        <div class="flex justify-between py-1 border-b border-slate-50"><span><i class="fa-solid fa-desktop mr-2 text-slate-400"></i>Manager Desktops</span> <span class="font-mono font-semibold">3 units</span></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3 ">
    <div class="info-box bg-gradient-info">
        <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-laptop"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Laptops</span>
        <span class="info-box-number">{{$laptops}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-danger">
        <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fas fa-desktop"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Desktops</span>
        <span class="info-box-number">{{$desktops}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-success ">
        <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-print"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Printers</span>
        <span class="info-box-number">{{$printers}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-primary ">
        <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-wifi"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Access Points</span>
        <span class="info-box-number">{{$aps}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-navy ">
        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-ethernet"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Switches</span>
        <span class="info-box-number">{{$switches}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-secondary ">
        <span class="info-box-icon bg-gradient-secondary elevation-1"><i class="fas fa-tv"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Projectors</span>
        <span class="info-box-number">{{$projectors}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-dark">
        <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-mobile"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Smartphones</span>
        <span class="info-box-number">{{$smartphones}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-light elevation-1"><i class="fas fa-camera"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">CCTV</span>
        <span class="info-box-number">{{$cctvs}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-orange">
        <span class="info-box-icon bg-gradient-orange elevation-1"><i class="fas fa-database"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">UPS</span>
        <span class="info-box-number">{{$ups}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-pink">
        <span class="info-box-icon bg-gradient-pink elevation-1"><i class="fas fa-server"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Servers</span>
        <span class="info-box-number">{{$servers}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-purple">
        <span class="info-box-icon bg-gradient-purple elevation-1"><i class="fas fa-tools"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Tools</span>
        <span class="info-box-number">{{$tools}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-lime">
        <span class="info-box-icon bg-gradient-lime elevation-1"><i class="fas fa-phone"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Telephones</span>
        <span class="info-box-number">{{$telephone}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-maroon">
        <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-fingerprint"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">Biometrics</span>
        <span class="info-box-number">{{$biometrics}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
     <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3 bg-gradient-teal">
        <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-box"></i></span>

        <div class="info-box-content">
        <span class="info-box-text">External Drive</span>
        <span class="info-box-number">{{$external}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>


@endsection

@section('js')
<script>
    function toggleContainer(containerId, arrowId) {
        const container = document.getElementById(containerId);
        const arrow = document.getElementById(arrowId);
        
        if (container.classList.contains('hidden')) {
            container.classList.remove('hidden');
            arrow.classList.add('rotate-180'); 
        } else {
            container.classList.add('hidden');
            arrow.classList.remove('rotate-180'); 
        }
    }
</script>
@endsection

@section('footer')
@endsection

@section('right-sidebar')
sidebar
@endsection