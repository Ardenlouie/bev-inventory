@extends('adminlte::page')

@section('title')
Devices
@endsection

@section('css')

@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Devices / Edit</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('laptops.index')}}" class="btn btn-danger"><i class="fas fa-arrow-left mr-1"></i>{{__('Back')}}</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Device</h3>
    </div>
    <div class="card-body">

        {!! Form::open(['method' => 'POST', 'route' => ['laptops.update', $device->id], 'id' => 'update_device']) !!}
        {!! Form::close() !!}

        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('company_id', 'Company') !!}
                    {!! Form::select('company_id', $companies, $device->company_id, ['class' => 'form-control'.($errors->has('company_id') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('company_id')}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('device_id', 'Device') !!}
                    {!! Form::select('device_id', $devices, $device->device_id, ['class' => 'form-control'.($errors->has('device_id') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('device_id')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('date_acquired', 'Date Acquired') !!}
                    {!! Form::date('date_acquired', $acquiredDate, ['class' => 'form-control'.($errors->has('date_acquired') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('date_acquired')}}</p>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('issued_date', 'Issued Date') !!}
                    {!! Form::date('issued_date', $issuedDate, ['class' => 'form-control'.($errors->has('issued_date') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('issued_date')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('tag_id', 'Tag ID No.') !!}
                    <h3>{{$device->tag_id}}</h3>
                    <p class="text-danger mt-1">{{$errors->first('tag_id')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('model', 'Model') !!}
                    {!! Form::text('model', $device->model, ['class' => 'form-control'.($errors->has('model') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('model')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('specification', 'Specification') !!}
                    {!! Form::text('specification', $device->specification, ['class' => 'form-control'.($errors->has('specification') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('specification')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('serial', 'Serial') !!}
                    {!! Form::text('serial', $device->serial, ['class' => 'form-control'.($errors->has('serial') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('serial')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('os', 'OS') !!}
                    {!! Form::text('os', $device->os, ['class' => 'form-control'.($errors->has('os') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('os')}}</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('office', 'MS Office') !!}
                    {!! Form::text('office', $device->office, ['class' => 'form-control'.($errors->has('office') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('office')}}</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('amount', 'Amount(PHP)') !!}
                    {!! Form::number('amount', $device->amount, ['class' => 'form-control'.($errors->has('amount') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('amount')}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('inclusions', 'Inclusions') !!}
                    {!! Form::text('inclusions', $device->inclusions, ['class' => 'form-control'.($errors->has('inclusions') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('inclusions')}}</p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('employee_id', 'User') !!}
                    {!! Form::select('employee_id', $users, $device->employee_id, ['class' => 'form-control'.($errors->has('employee_id') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('employee_id')}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('department_id', 'Department') !!}
                    {!! Form::select('department_id', $departments, $device->department_id, ['class' => 'form-control'.($errors->has('department_id') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('department_id')}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('note', 'Note') !!}
                    {!! Form::text('note', $device->note, ['class' => 'form-control'.($errors->has('note') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('note')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('previous_owner', 'Previous Owner') !!}
                    {!! Form::text('previous_owner', $device->previous_owner, ['class' => 'form-control'.($errors->has('previous_owner') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('previous_owner')}}</p>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', $status_arr, $device->status, ['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''), 'form' => 'update_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('status')}}</p>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('age', 'Age') !!}
                    <h3>{{$age}}</h3>
                    <input type="hidden" name="age" form="update_device" value="{{$age}}"> 
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        {!! Form::submit('Update', ['class' => 'btn btn-primary', 'form' => 'update_device']) !!}
    </div>
</div>


@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.select2').select2({

        });
    });
</script>





@endsection

@section('footer')
@endsection

@section('right-sidebar')
sidebar
@endsection