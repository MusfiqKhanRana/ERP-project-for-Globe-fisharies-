

@extends('backend.master')
@section('site-title')
   requisition Edit
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">View/Edit
                <small> requisition-Edit </small>
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
                        <form action="{{route('requisition.update', $requisition)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-body">

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Category</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <select class="form-control select2me" id="department" name="category_id" required>
                                                        <option value="">--select--</option>
                                                        @foreach($category as $data)
                                                            <option value="{{$data->id}}" {{ $data->id == $requisition->category_id ? 'selected' : '' }}>{{$data->name}}</option>
                                                        @endforeach
                                                        {{csrf_field()}}
                                                    </select>
                                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Product</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <select class="form-control select2me" name="product_id" id="product" required>

                                                    </select>
                                                    {{csrf_field()}}
                                                    <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Quantity</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" placeholder="Quantity" value="{{$requisition->quantity}}" required name="quantity">
                                                    <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">requisition Address</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Pac Size" value="{{$requisition->pac_size}}" required name="pac_size">
                                                    <span class="input-group-addon"><i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group clearfix">
                                            <label class="col-md-3 control-label">Date</label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input type="text" class="form-control" name="clearance_date" value="{{$requisition->clearance_date}}"  readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                    </div>
                                                    <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i>
                                                    </span>
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var id = @json($requisition->id);
            $.ajax({
                type:"POST",
                url:"{{route('product.pass')}}",
                data:{
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    $('#product').html("");
                    $('#product').append(data.output);
                }
            });
            $(document).on('change','#department',function(){
                var id = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{route('product.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('#product').html("");
                        $('#product').append(data.output);
                    }
                });
            });

            // $(document).on('change','#product',function(){
            //     var id = $(this).val();
            //     $.ajax({
            //         type:"POST",
            //         url:"{{route('product.element.pass')}}",
            //         data:{
            //             'id' : id,
            //             '_token' : $('input[name=_token]').val()
            //         },
            //         success:function(data){
            //             $('#pranto').text(data.selling_price);
            //             $('#product_price').val(data.selling_price);
            //             $('#roy').text(data.unit);
            //         }
            //     });
            // });
        });
    </script>
@endsection
