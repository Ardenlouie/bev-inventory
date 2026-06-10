@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'DEPARTMENT LIST')
@section('content_header_title', 'DEPARTMENTS')
@section('content_header_subtitle', 'DEPARTMENT LIST')

{{-- Content body: main page content --}}
@section('content_body')
    <div class="card">
        <div class="card-header py-2">
            <div class="row">
                <div class="col-lg-6 align-middle">
                    <strong class="text-lg">DEPARTMENT LIST</strong>
                </div>
                <div class="col-lg-6 text-right">
                    @can('company create')
                        <a href="{{route('department.create')}}" class="btn btn-primary btn-xs">
                            <i class="fa fa-file"></i>
                            NEW DEPARTMENT
                        </a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            
            <div class="row">
                <div class="col-12 table-responsive p-1 bg-gray rounded">
                    <table class="table table-sm table-striped table-hover bg-white mb-0">
                        <thead class="tex-center bg-dark">
                            <tr class="text-center">
                                <th>PREFIX</th>
                                <th>NAME</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td class="align-middle text-center">
                                        {{$department->prefix}}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{$department->name}}
                                    </td>
                                    <td class="align-middle text-right p-0 pr-1">
                                        @can('company edit')
                                            <a href="{{route('department.edit', encrypt($department->id, 'roles'))}}" class="btn btn-success btn-xs mb-0 ml-0">
                                                <i class="fa fa-pen-alt"></i>
                                                EDIT
                                            </a>
                                        @endcan
                                        @can('company delete')
                                            <a href="" class="btn btn-danger btn-xs mb-0 ml-0 btn-delete" data-id="{{encrypt($department->id)}}">
                                                <i class="fa fa-trash-alt"></i>
                                                DELETE
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="card-footer">
            {{$departments->links()}}
        </div>
    </div>
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
            $('body').on('click', '.btn-delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Livewire.dispatch('setDeleteModel', {type: 'Department', model_id: id});
                $('#modal-delete').modal('show');
            });
        });
    </script>
@endpush