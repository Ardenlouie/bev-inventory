@extends('adminlte::page')

@section('title')
Devices
@endsection

@section('css')
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Devices / Create</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('laptops.index')}}" class="btn btn-danger"><i class="fas fa-arrow-left mr-1"></i>{{__('Back')}}</a>
    </div>
</div>
@endsection

@section('content')


    <livewire:create-devices />

 
@endsection

@section('js')

@endsection

@section('footer')
@endsection

@section('right-sidebar')
sidebar
@endsection