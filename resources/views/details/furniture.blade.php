@extends('adminlte::auth.auth-page')

@section('auth_body')
  <div class="row">
    <div class="card card-outline text-dark col-md-12">
        <div class="card-body box-profile ">
      
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



@stop
