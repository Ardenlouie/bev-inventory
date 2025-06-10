<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add Device</h3>
    </div>
    <div class="card-body">

        {!! Form::open(['method' => 'POST', 'route' => ['laptops.store'], 'id' => 'add_device']) !!}
        {!! Form::close() !!}

        <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('company_id', 'Company') !!}
                    {!! Form::select('company_id', $companies,'',['class' => 'form-control'.($errors->has('company_id') ? ' is-invalid' : ''), 'form' => 'add_device', 'wire:model.lazy' => 'company_id']) !!}
                    <p class="text-danger mt-1">{{$errors->first('company_id')}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('device_id', 'Device') !!}
                    {!! Form::select('device_id', $devices,'',['class' => 'form-control'.($errors->has('device_id') ? ' is-invalid' : ''), 'form' => 'add_device', 'wire:model.lazy' => 'device_id']) !!}
                    <p class="text-danger mt-1">{{$errors->first('device_id')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('date_acquired', 'Date Acquired') !!}
                    {!! Form::date('date_acquired',$date_acquired,['class' => 'form-control'.($errors->has('date_acquired') ? ' is-invalid' : ''), 'form' => 'add_device', 'wire:model.lazy' => 'date_acquired']) !!}
                    <p class="text-danger mt-1">{{$errors->first('date_acquired')}}</p>
                </div>
            </div>
             <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('issued_date', 'Issued Date') !!}
                    {!! Form::date('issued_date','',['class' => 'form-control'.($errors->has('issued_date') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
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
                    {!! Form::label('model', 'Model') !!}
                    {!! Form::text('model','',['class' => 'form-control'.($errors->has('model') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('model')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('specification', 'Specification') !!}
                    {!! Form::text('specification','',['class' => 'form-control'.($errors->has('specification') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('specification')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('serial', 'Serial') !!}
                    {!! Form::text('serial','',['class' => 'form-control'.($errors->has('serial') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('serial')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('os', 'OS') !!}
                    {!! Form::text('os','',['class' => 'form-control'.($errors->has('os') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('os')}}</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('office', 'MS Office') !!}
                    {!! Form::text('office','',['class' => 'form-control'.($errors->has('office') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('office')}}</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {!! Form::label('amount', 'Amount(PHP)') !!}
                    {!! Form::number('amount','', ['class' => 'form-control'.($errors->has('amount') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('amount')}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('inclusions', 'Inclusions') !!}
                    {!! Form::text('inclusions','',['class' => 'form-control'.($errors->has('inclusions') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('inclusions')}}</p>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    {!! Form::label('employee_id', 'User') !!}
                    {!! Form::select('employee_id', $users,'',['class' => 'form-control'.($errors->has('employee_id') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('employee_id')}}</p>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('department_id', 'Department') !!}
                    {!! Form::select('department_id', $departments,'',['class' => 'form-control'.($errors->has('department_id') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('department_id')}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('note', 'Note') !!}
                    {!! Form::text('note','',['class' => 'form-control'.($errors->has('note') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('note')}}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! Form::label('previous_owner', 'Previous Owner') !!}
                    {!! Form::text('previous_owner','',['class' => 'form-control'.($errors->has('previous_owner') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
                    <p class="text-danger mt-1">{{$errors->first('previous_owner')}}</p>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-2">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', $status_arr,'',['class' => 'form-control'.($errors->has('status') ? ' is-invalid' : ''), 'form' => 'add_device']) !!}
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
            <input type="hidden" name="age" form="add_device" value="{{$age}}"> 
               
        </div>

    </div>
    @if(!empty($qr_link))
    <div class="card">
        <div class="card-body text-center">
            {!! DNS2D::getBarcodeSVG($qr_link, 'QRCODE', $this->size, $this->size) !!}
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-success" wire:click.prevent="DownloadSVG">
                <i class="fa fa-download"></i>
                DOWNLOAD SVG
            </button>
        </div>
    </div>
    @endif
    <div class="card-footer text-right">
        {!! Form::submit('Add Device', ['class' => 'btn btn-primary', 'form' => 'add_device']) !!}
    </div>
</div>