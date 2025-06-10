@extends('adminlte::page')

@section('title')
Refreshables
@endsection

@section('css')
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Refreshables / Show</h1>
    </div>

</div>
@endsection

@section('content')
<div class="col-12">
    <livewire:refreshables :refreshable="$refreshable" />

</div>

@endsection

@section('js')

@endsection

@section('footer')
@endsection

@section('right-sidebar')
sidebar
@endsection