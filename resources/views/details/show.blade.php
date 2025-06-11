@extends('adminlte::auth.auth-page')

@section('auth_body')
  <div class="row">
    <div class="card card-outline text-dark col-md-12">
        <div class="card-body box-profile">
      
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



@stop
