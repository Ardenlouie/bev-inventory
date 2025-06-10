@extends('adminlte::page')

@section('title')
BEV INVENTORY
@endsection

@section('css')
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1></h1>
    </div>

</div>
@endsection

@section('content')
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
</div>


@endsection

@section('js')

@endsection

@section('footer')
@endsection

@section('right-sidebar')
sidebar
@endsection