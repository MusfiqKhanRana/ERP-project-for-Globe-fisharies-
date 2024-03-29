

@extends('backend.master')
@section('site-title')
    Product Edit
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">View/Edit
                <small> Product-Edit </small>
            </h3>
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
        @endif
            <!-- END PAGE TITLE-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet-body" style="height: auto;">
                                        <form action="{{route('product.update', $product->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('PUT')}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-body">
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Select Category</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="category_id">
                                                                    <option>--Select--</option>
                                                                    @foreach($category as $a)
                                                                        <option value="{{$a->id}}" {{ ( $a->id == $product->category_id) ? 'selected' : '' }}>{{$a->name}}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Product ID</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="product_id" value="{{$product->product_id}}">
                                                                    <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Product Name</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
                                                                    <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Buying Price</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="buying_price" value="{{$product->buying_price}}">
                                                                    <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="selling_price" value="0">
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Online Selling Price</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="online_selling_price" value="{{$product->online_selling_price}}">
                                                                    <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Inhouse Selling Price</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="inhouse_selling_price" value="{{$product->inhouse_selling_price}}">
                                                                    <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Retail Selling Price</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="retail_selling_price" value="{{$product->retail_selling_price}}">
                                                                    <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Unit</label>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <select class="form-control" name="unit">
                                                                        <option value="{{$product->unit}}">{{$product->unit}}</option>
                                                                        <option value="Kilogram">Kilogram</option>
                                                                        <option value="Feet">Feet</option>
                                                                        <option value="Pieces">Pieces</option>
                                                                        <option value="Liter">Liter</option>
                                                                        <option value="Pound">Lb</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Pack Size</label>
                                                            <div class="col-md-9">
                                                                <div class="form-group">
                                                                    <select name="pack_id" id="subCategory" class="form-control">
                                                                        <option value="0">-- Select Pack Size --</option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Safety Stock</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" name="safety_stock" value="{{$product->safety_stock}}">
                                                                    <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group clearfix">
                                                            <label class="col-md-3 control-label">Image</label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <img style="weidth: 120px; height: 100px; border-radius: 15px;" src="{{asset('assets/images/product/images').'/'.$product->image}}">
                                                                    <input class="form-control text-capitalize" placeholder="" type="file" required name="image">
                                                                    <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i></span>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group clearfix">
                                                            <div class="col-md-12">
                                                                <button class="btn btn-info col-md-12" type="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                                    Update</button>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#subCategory').find('option').not(':first').remove();
    
        $.ajax({
        url:"{{route('packsize')}}",
        type:'get',
        dataType:'json',
        success:function (response) {
            var id2 = {!! json_encode($product->pack_id) !!};
            if (response.data.length>0) {
                for (var i = 0; i<response.data.length; i++) {
                    var id = response.data[i].id;
                    var name = response.data[i].name;
                    var option = null;
                    if(id==id2){
                            option = "<option value='"+id+"' selected>"+name+"</option>";  
                    }
                    else{
                            option = "<option value='"+id+"'>"+name+"</option>"; 
                    }
                    $("#subCategory").append(option);
                }
            }
        }
        })
    });
    </script>
@endsection
