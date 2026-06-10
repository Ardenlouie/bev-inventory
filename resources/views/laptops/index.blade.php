@extends('layouts.app')

@section('title')
Devices
@endsection

@section('css')
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Devices</h1>
    </div>
    @can('item edit')
    <div class="col-md-6 text-right">
        <a href="{{route('device.import')}}" class="btn bg-navy"><i class="fas fa-upload mr-1"></i>Bulk Upload</a>
        <a href="{{route('laptops.create')}}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Add Device</a>
    </div>
    @endcan
</div>
@endsection

@section('content_body')
<div class="col-12">
    <livewire:all-devices />

</div>


@endsection

@push('js')
<script>
    $(function() {
        $('body').on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            Livewire.dispatch('setDeleteModel', {type: 'Laptop', model_id: id});
            $('#modal-delete').modal('show');
        });
    });
</script>
@endpush

@section('footer')
@endsection

@section('right-sidebar')
sidebar
@endsection