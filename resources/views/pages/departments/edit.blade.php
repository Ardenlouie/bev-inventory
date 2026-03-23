@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'DEPARTMENT EDIT')
@section('content_header_title', 'DEPARTMENTS')
@section('content_header_subtitle', 'DEPARTMENT EDIT')

{{-- Content body: main page content --}}
@section('content_body')
    {{ html()->form('POST', route('department.update', encrypt($department->id)))->open() }}
        <div class="card">
            <div class="card-header py-2">
                <div class="row">
                    <div class="col-lg-6 align-middle">
                        <strong class="text-lg">DEPARTMENT EDIT</strong>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="{{route('department.index')}}" class="btn btn-secondary btn-xs">
                            <i class="fa fa-caret-left"></i>
                            BACK
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            {{ html()->label('PREFIX', 'prefix')->class(['mb-0']) }}
                            {{ html()->input('text', 'prefix', $department->prefix)->placeholder('Prefix')->class(['form-control', 'form-control-sm', 'is-invalid' => $errors->has('prefix')]); }}
                            <small class="text-danger">{{$errors->first('prefix')}}</small>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            {{ html()->label('NAME', 'name')->class(['mb-0']) }}
                            {{ html()->input('text', 'name', $department->name)->placeholder('Name')->class(['form-control', 'form-control-sm', 'is-invalid' => $errors->has('name')]); }}
                            <small class="text-danger">{{$errors->first('name')}}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                {{ html()->submit('<i class="fa fa-save"></i> SAVE DEPATMENT')->class(['btn', 'btn-primary', 'btn-sm']) }}
            </div>
        </div>
    {{ html()->form()->close() }}
@stop

{{-- Push extra CSS --}}
@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}
@push('js')
    <script>
        $(function() {
            $('body').on('click', '.btn-role', function(e) {
                e.preventDefault();
                $(this).toggleClass('btn-success').toggleClass('btn-default');

                // get all selected
                var role_ids = [];
                $('body').find('.btn-role').each(function() {
                    var id = $(this).data('id');
                    if($(this).hasClass('btn-success')) {
                        role_ids.push(id);
                    }
                });

                var roles = role_ids.join(',');
                $('#role_ids').val(roles);
            });
        })
    </script>
@endpush