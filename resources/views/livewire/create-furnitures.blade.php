<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Furniture</h3>
    </div>
    <div class="card-body">

        {!! Form::open(['method' => 'POST', 'route' => ['furnitures.store'], 'id' => 'add_furniture']) !!}
        {!! Form::close() !!}

        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('company_id', 'Company') !!}
                    {!! Form::select('company_id', $companies,'',['class' => 'form-control'.($errors->has('company_id') ? ' is-invalid' : ''), 'form' => 'add_furniture', 'wire:model.lazy' => 'company_id']) !!}
                    <p class="text-danger mt-1">{{$errors->first('company_id')}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('item_id', 'Item') !!}
                    {!! Form::select('item_id', $items,'',['class' => 'form-control'.($errors->has('item_id') ? ' is-invalid' : ''), 'form' => 'add_furniture', 'wire:model.lazy' => 'item_id']) !!}
                    <p class="text-danger mt-1">{{$errors->first('item_id')}}</p>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('date_acquired', 'Date Acquired') !!}
                    {!! Form::date('date_acquired',$date_acquired,['class' => 'form-control'.($errors->has('date_acquired') ? ' is-invalid' : ''), 'form' => 'add_furniture', 'wire:model.lazy' => 'date_acquired']) !!}
                    <p class="text-danger mt-1">{{$errors->first('date_acquired')}}</p>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('issued_date', 'Issued Date') !!}
                    {!! Form::date('issued_date','',['class' => 'form-control'.($errors->has('issued_date') ? ' is-invalid' : ''), 'form' => 'add_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('issued_date')}}</p>
                </div>
            </div>
            <div class="col-md-1">
                <div class="form-group">
                    <div class="col-lg-2 col-md-6 col-sm-12" wire:loading><i class="spinner-border"></i></div>

                </div>
            </div>
        </div>
        <div class="row">
          
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('item_name', 'Item Name') !!}
                    {!! Form::text('item_name','',['class' => 'form-control'.($errors->has('item_name') ? ' is-invalid' : ''), 'form' => 'add_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('item_name')}}</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    {!! Form::label('specification', 'Specification') !!}
                    {!! Form::text('specification','',['class' => 'form-control'.($errors->has('specification') ? ' is-invalid' : ''), 'form' => 'add_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('specification')}}</p>
                </div>
            </div>
        
        </div>
        <div class="row">
        
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('amount', 'Amount(PHP)') !!}
                    {!! Form::number('amount','', ['class' => 'form-control'.($errors->has('amount') ? ' is-invalid' : ''), 'form' => 'add_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('amount')}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('inclusions', 'Inclusions') !!}
                    {!! Form::text('inclusions','',['class' => 'form-control'.($errors->has('inclusions') ? ' is-invalid' : ''), 'form' => 'add_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('inclusions')}}</p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('employee_id', 'User') !!}
                    {!! Form::select('employee_id', $users,'',['class' => 'form-control'.($errors->has('employee_id') ? ' is-invalid' : ''), 'form' => 'add_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('employee_id')}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('department_id', 'Department') !!}
                    {!! Form::select('department_id', $departments,'',['class' => 'form-control'.($errors->has('department_id') ? ' is-invalid' : ''), 'form' => 'add_furniture', 'wire:model.lazy' => 'department_id']) !!}
                    <p class="text-danger mt-1">{{$errors->first('department_id')}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('note', 'Note') !!}
                    {!! Form::text('note','',['class' => 'form-control'.($errors->has('note') ? ' is-invalid' : ''), 'form' => 'add_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('note')}}</p>
                </div>
            </div>
         
        </div>
         <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', $status_arr,'',['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''), 'form' => 'add_furniture']) !!}
                    <p class="text-danger mt-1">{{$errors->first('status')}}</p>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('tag_id', 'Tag ID No.') !!}

                    <h3>{{$tag_id}}</h3>
                </div>
            </div>
            <!-- <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('qr_code', 'QR Code') !!}
                    {!! DNS2D::getBarcodeHTML(config('app.url').'/show/detail/'.encrypt($tag_id), 'QRCODE', 5, 5) !!}
                    <h3></h3>
     
                </div>
            </div> -->
             <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('age', 'Age') !!}
                    <h3>{{$age}}</h3>
                </div>
            </div>
       <div>
</div>
            <input type="hidden" name="age" form="add_furniture" value="{{$age}}"> 
            <input type="hidden" name="tag_id" form="add_furniture" value="{{$tag_id}}"> 

        </div>
    </div>
    <div class="card-footer text-right">
        {!! Form::submit('Add Furniture', ['class' => 'btn btn-primary', 'form' => 'add_furniture']) !!}
    </div>
</div>