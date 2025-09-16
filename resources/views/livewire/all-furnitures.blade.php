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
                        <h6 for="">Item</h6>
                        <select name="" class="form-control form-control-md text-uppercase" wire:model.lazy="item_id">
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
                        @foreach($furnitures as $key => $furniture)
                   
                        <li class="list-group-item pb-0 mb-1 border border-primary text-center ">
                            <div class="row ">
                                <div class="col-lg-2 text-center border-bottom pb-1"> 
                                    @if($furniture->company_id == 1)
                                    <img src="{{asset('/vendor/adminlte/dist/img/bevi.jpg')}}" alt="product photo" class="product-img" height="50" width="100">
                                    @elseif($furniture->company_id == 2)
                                    <img src="{{asset('/vendor/adminlte/dist/img/beva.jpg')}}" alt="product photo" class="product-img" height="50" width="100">
                                    @elseif($furniture->company_id == 3)
                                    <img src="{{asset('/vendor/adminlte/dist/img/pbb.png')}}" alt="product photo" class="product-img" height="50" width="100">
                                    @else
                                    @endif
                                    <br>
                                    {{$furniture->tag_id}}<br>
                                </div>
                                <div class="col-lg-1 text-center border-bottom pb-1">
                                    <b></b><br> 
                                    <b>{{$furniture->item->name}}</b><br> 
                                </div>
                                <div class="col-lg-2 text-center border-bottom pb-1">
                                    <b>ITEM NAME:</b><br> 
                                    <b>{{$furniture->item_name}}</b><br> 
                                </div>
                            
                                <div class="col-lg-3 text-center border-bottom pb-1">
                                    <b>SPECIFICATION:</b><br> 
                                    <b>{{$furniture->specification}}</b><br> 
                                </div>
                                <div class="col-lg-3 text-center border-bottom pb-1">
                                    <b>
                                        @if($furniture->status == null)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif($furniture->status == 'Assigned')
                                            <span class="badge badge-success">Assigned</span>
                                        @elseif($furniture->status == 'Available')
                                            <span class="badge badge-warning">Available</span>
                                        @else
                                        @endif
                                    </b><br> 
                                    <b>{{$furniture->employee->name}}</b><br> 
                                    <b>{{$furniture->department->name}}</b><br> 

                                </div>
                                <div class="col-lg-1 text-center border-bottom pb-1">
                                    <b></b><br> 
                                    <b>  
                                    <a href="{{route('furnitures.show', [$furniture->id])}}" class="btn btn-info btn-xs mb-0 ml-0">
                                        <i class="fa fa-list"></i>
                                        VIEW
                                    </a>
                                    @can('item edit')
                                        <a href="{{route('furnitures.edit', [$furniture->id])}}" class="btn btn-success btn-xs mb-0 ml-0">
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
                    <a href="{{route('export.furnitures')}}" class="btn btn-success float-right"><i class="fa fa-file-export"></i> Export</a>

                    {{$furnitures->links()}}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>