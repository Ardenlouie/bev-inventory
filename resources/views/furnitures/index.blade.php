@extends('adminlte::page')

@section('title')
Furnitures
@endsection

@section('css')
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Furnitures</h1>
    </div>
    @can('item edit')
    <div class="col-md-6 text-right">
        <a href="{{route('furnitures.create')}}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Add Furniture</a>
    </div>
    @endcan
</div>
@endsection

@section('content')
<div class="col-12">
    <livewire:all-furnitures />
</div>


@endsection

@section('js')

@endsection

@section('footer')
@endsection

@section('right-sidebar')
sidebar
@endsection