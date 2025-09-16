@extends('adminlte::page')

@section('title')
Devices
@endsection

@section('css')
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Devices / Show</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('laptops.index', ['device-page' => request('device-page', 1)])}}" class="btn btn-danger"><i class="fas fa-arrow-left mr-1"></i>{{__('Back')}}</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="card card-warning card-outline">
        <div class="card-body box-profile">
               
            <div class="text-center">
                {!! DNS2D::getBarcodeHTML(config('app.url').'/show/detail/'.encrypt($devices->id), 'QRCODE', 10, 10) !!}
                <a href="{{route('laptops.downloadQrCode', [$devices->id])}}" class="btn btn-success">
                            Download QR Code
                </a>
            </div> 
         
            <h3 class="profile-username text-center">{{$devices->tag_id}}</h3>
            <h3 class="profile-username text-center">{{$devices->device->name}}</h3>
            <p class="text-muted text-center">{{$devices->model}}</p>
            <p class="text-muted text-center">{{$devices->serial}}</p>
            <p class="text-muted text-center">{{$devices->specification}}</p>
            <p class="text-muted text-center">{{$devices->amount}}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>User</b> <a class="float-right">{{$devices->employee->name}}</a>
                </li>
                <li class="list-group-item">
                    <b>Department</b> <a class="float-right">{{$devices->department->name}}</a>
                </li>
                <li class="list-group-item">
                    <b>Inclusions</b><br> <span class="float-right">{{$devices->inclusions}}</span>
                </li>
                <li class="list-group-item">
                    <b>Note</b> <span class="float-right">{{$devices->note}}</span>
                </li>
                <li class="list-group-item">
                    <b>Age</b> <h3 class="float-right">{{$age}}</h3>
                </li>
                <li class="list-group-item">
                    <b>Previous Owner</b> <span class="float-right">{{$devices->previous_owner}}</span>
                </li>
            </ul>
        </div>
    </div>
</div>



 
@endsection

@section('js')

@endsection

@section('footer')
@endsection

@section('right-sidebar')
sidebar
@endsection