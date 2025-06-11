<div>
        <div class="card shadow">
            <div class="card-body">
                <!-- Loading Indicator -->
                
                <div class="row mb-2">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">Search</h6>
                            <input type="text" placeholder="Search" class="form-control form-control-md" wire:model.live ="search">
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">Company</h6>
                            <select name="" class="form-control form-control-md text-uppercase" wire:model.lazy="company_id">
                                    <option value="">ALL</option>
                                @foreach($company as $companies)
                                    <option value="{{$companies->id}}">{{$companies->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">Device</h6>
                            <select name="" class="form-control form-control-md text-uppercase" wire:model.lazy="device_id">
                                    <option value="">ALL</option>
                                @foreach($variants as $variant)
                                    <option value="{{$variant->id}}">{{$variant->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">Status</h6>
                            <select name="" class="form-control form-control-md text-uppercase" wire:model.lazy="status">
                                    <option value="">ALL</option>
                                    <option value="Assigned">Assigned</option>
                                    <option value="Available">Available</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-6 col-sm-12">
                        <div class="form-group">
                            <h6 for="">Items Per Page</h6>
                            <select class="form-control form-control-md" wire:model.lazy="item_per_page">
                                <option value="all">All</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12" wire:loading><i class="spinner-border"></i></div>

                </div>
                    <ul class="list-group">
                  
                            @foreach($devices as $key => $device)
                            <li class="list-group-item pb-0 mb-1 border border-primary text-center ">
                                <div class="row ">
                                    <div class="col-lg-2 text-center border-bottom pb-1"> 
                                        @if($device->company_id == 1)
                                        <img src="{{asset('/vendor/adminlte/dist/img/bevi.jpg')}}" alt="product photo" class="product-img" height="50" width="100">
                                        @elseif($device->company_id == 2)
                                        <img src="{{asset('/vendor/adminlte/dist/img/beva.jpg')}}" alt="product photo" class="product-img" height="50" width="100">
                                        @elseif($device->company_id == 3)
                                        <img src="{{asset('/vendor/adminlte/dist/img/pbb.png')}}" alt="product photo" class="product-img" height="50" width="100">
                                        @else
                                        @endif
                                        <br>
                                        {{$device->tag_id}}<br>
                                    </div>
                                    <div class="col-lg-1 text-center border-bottom pb-1">
                                        <b></b><br> 
                                        <b>{{$device->device->name}}</b><br> 
                                    </div>
                                    <div class="col-lg-2 text-center border-bottom pb-1">
                                        <b>MODEL:</b><br> 
                                        <b>{{$device->model}}</b><br> 
                                    </div>
                                    <div class="col-lg-3 text-center border-bottom pb-1">
                                        <b>SPECIFICATION:</b><br> 
                                        <b>{{$device->specification}}</b><br> 
                                    </div>
                                    <div class="col-lg-3 text-center border-bottom pb-1">
                                        <b>
                                            @if($device->status == null)
                                                <span class="badge badge-danger">Pending</span>
                                            @elseif($device->status == 'Assigned')
                                                <span class="badge badge-success">Assigned</span>
                                            @elseif($device->status == 'Available')
                                                <span class="badge badge-warning">Available</span>
                                            @else
                                            @endif
                                        </b><br> 
                                        <b>{{$device->employee->name}}</b><br> 
                                        <b>{{$device->department->name}}</b><br> 

                                    </div>
                                    <div class="col-lg-1 text-center border-bottom pb-1">
                                        <b></b><br> 
                                        <b>  
                                        <a href="{{route('laptops.show', [$device->id])}}" class="btn btn-info btn-xs mb-0 ml-0">
                                            <i class="fa fa-list"></i>
                                            VIEW
                                        </a>
                                        @can('item edit')
                                            <a href="{{route('laptops.edit', [$device->id])}}" class="btn btn-success btn-xs mb-0 ml-0">
                                                <i class="fa fa-pen-alt"></i>
                                                EDIT
                                            </a>
                                        @endcan
                                        @can('item delete')
                                            <!-- <a href="#" class="btn btn-danger btn-xs mb-0 ml-0 btn-delete" data-id="">
                                                <i class="fa fa-trash-alt"></i>
                                                DELETE
                                            </a> -->
                                        @endcan
                                         </b><br> 
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>         
                @if($item_per_page != 'all')
                <div class="row">
                    <div class="col-12">
                        {{$devices->links()}}
                    </div>
                </div>
                @endif
            </div>
        </div>
</div>