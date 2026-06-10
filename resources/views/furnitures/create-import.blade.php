@extends('adminlte::page')

@section('title')
Furnitures
@endsection

@section('css')
@endsection

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Furnitures</h1>
    </div>

</div>
@endsection

@section('content')

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-file-upload"></i> Bulk Upload Laptops</h3>
        <div class="card-tools">
            <a href="{{asset('vendor/adminlte/dist/For Upload (Bev Inventory) - Furnitures.xlsx')}}" class="btn btn-success btn-sm">
                <i class="fa fa-download mr-1"></i>
                DOWNLOAD TEMPLATE
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('furnitures.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose Excel/CSV File</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="file" required>
                        <label class="custom-file-label" for="file">Browse file...</label>
                    </div>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
                <small class="text-muted">Columns must match: tag_id, serial, model, etc.</small>
            </div>
        </form>
    </div>
</div>



@endsection

@section('js')
<script>
    // This script makes the filename show up in the AdminLTE custom file input
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endsection

@section('footer')
@endsection

@section('right-sidebar')
sidebar
@endsection