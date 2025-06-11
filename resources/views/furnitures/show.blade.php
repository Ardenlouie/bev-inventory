@extends('adminlte::page')

@section('title')
Furnitures
@endsection

@section('css')
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Furnitures / Show</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('furnitures.index')}}" class="btn btn-danger"><i class="fas fa-arrow-left mr-1"></i>{{__('Back')}}</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="card card-warning card-outline">
        <div class="card-body box-profile">
               
            <div class="text-center">
                {!! DNS2D::getBarcodeHTML(config('app.url').'/show/furniture/'.encrypt($furnitures->id), 'QRCODE', 10, 10) !!}
                <a href="{{route('furnitures.downloadQrCode', [$furnitures->id])}}" class="btn btn-success">
                            Download QR Code
                </a>
            </div> 
         
            <h3 class="profile-username text-center">{{$furnitures->tag_id}}</h3>
            <h3 class="profile-username text-center">{{$furnitures->item->name}}</h3>
            <p class="text-muted text-center">{{$furnitures->item_name}}</p>
            <p class="text-muted text-center">{{$furnitures->specification}}</p>
            <p class="text-muted text-center">{{$furnitures->amount}}</p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>User</b> <a class="float-right">{{$furnitures->employee->name}}</a>
                </li>
                <li class="list-group-item">
                    <b>Department</b> <a class="float-right">{{$furnitures->department->name}}</a>
                </li>
                <li class="list-group-item">
                    <b>Inclusions</b><br> <span class="float-right">{{$furnitures->inclusions}}</span>
                </li>
                <li class="list-group-item">
                    <b>Note</b> <span class="float-right">{{$furnitures->note}}</span>
                </li>
                <li class="list-group-item">
                    <b>Age</b> <h3 class="float-right">{{$age}}</h3>
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