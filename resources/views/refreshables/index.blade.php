@extends('adminlte::page')

@section('title')
Refreshables
@endsection

@section('css')
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Refreshables</h1>
    </div>

</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">List of Refreshables</h3>
      <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
             

            </div>
      </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-bordered text-nowrap table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($refreshables as $refreshable)
                <tr>
                    <td class="align-middle">
                        <a href="{{route('refreshables.show', $refreshable->id)}}" title="view" >{{$refreshable->name}}</a>

                    </td>
                    <td class="align-middle">{{$refreshable->department->name}}</td>
                </tr>    
                @endforeach   
            </tbody>
        </table>

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