@extends('adminlte::page')

@section('title')
Furnitures
@endsection

@section('css')

@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Furnitures / Edit</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{route('furnitures.index')}}" class="btn btn-danger"><i class="fas fa-arrow-left mr-1"></i>{{__('Back')}}</a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Device</h3>
    </div>
    <div class="card-body">

        {!! Form::open(['method' => 'POST', 'route' => ['furnitures.update', $furniture->id], 'id' => 'update_furniture']) !!}
        {!! Form::close() !!}

        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('company_id', 'Company') !!}
                    {!! Form::select('company_id', $companies, $furniture->company_id, ['class' => 'form-control'.($errors->has('company_id') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('company_id')}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('item_id', 'Item') !!}
                    {!! Form::select('item_id', $items, $furniture->item_id, ['class' => 'form-control'.($errors->has('item_id') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('item_id')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('date_acquired', 'Date Acquired') !!}
                    {!! Form::date('date_acquired', $acquiredDate, ['class' => 'form-control'.($errors->has('date_acquired') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('date_acquired')}}</p>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('issued_date', 'Issued Date') !!}
                    {!! Form::date('issued_date', $issuedDate, ['class' => 'form-control'.($errors->has('issued_date') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('issued_date')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('tag_id', 'Tag ID No.') !!}
                    {!! Form::text('tag_id', $furniture->tag_id, ['class' => 'form-control'.($errors->has('tag_id') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('tag_id')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('item_name', 'Item Name') !!}
                    {!! Form::text('item_name', $furniture->item_name, ['class' => 'form-control'.($errors->has('item_name') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('item_name')}}</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    {!! Form::label('specification', 'Specification') !!}
                    {!! Form::text('specification', $furniture->specification, ['class' => 'form-control'.($errors->has('specification') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('specification')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('amount', 'Amount(PHP)') !!}
                    {!! Form::number('amount', $furniture->amount, ['class' => 'form-control'.($errors->has('amount') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('amount')}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('inclusions', 'Inclusions') !!}
                    {!! Form::text('inclusions', $furniture->inclusions, ['class' => 'form-control'.($errors->has('inclusions') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('inclusions')}}</p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('employee_id', 'User') !!}
                    {!! Form::select('employee_id', $users, $furniture->employee_id, ['class' => 'form-control'.($errors->has('employee_id') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('employee_id')}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('department_id', 'Department') !!}
                    {!! Form::select('department_id', $departments, $furniture->department_id, ['class' => 'form-control'.($errors->has('department_id') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('department_id')}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('note', 'Note') !!}
                    {!! Form::text('note', $furniture->note, ['class' => 'form-control'.($errors->has('note') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('note')}}</p>
                </div>
            </div>
        
        </div>
         <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', $status_arr, $furniture->status, ['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''), 'form' => 'update_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('status')}}</p>
                </div>
            </div>
              <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('age', 'Age') !!}
                    <h3>{{$age}}</h3>
                    <input type="hidden" name="age" form="update_furniture" value="{{$age}}"> 
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        {!! Form::submit('Update', ['class' => 'btn btn-primary', 'form' => 'update_furniture']) !!}
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