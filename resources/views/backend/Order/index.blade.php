@extends('backend.master')
@section('site-title')
    Order Management
@endsection
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('main-content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Order Management</h3>

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box grey-salt">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-clipboard"></i>History List
                            </div>
                        </div>

                        <div class="portlet-body">


                            <table class="table table-striped table-bordered table-hover" id="notices">
                                <thead>
                                <tr>
                                    {{-- <th> Date </th> --}}
                                    <th> ID </th>
                                    <th>Name</th>
                                    <th> Customer Type </th> 
                                    <th> Status </th>
                                    <th> Remark</th>
                                    <th style="text-align: center"> Product</th>
                                    <th style="text-align: center"> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $key=>$data)
                                    @php
                                        $color = '';
                                        $textcolor = '';
                                        if ($data->status == 'Confirm') {
                                            $color = '#c9e3c1';
                                            $textcolor = "black";
                                        }
                                    @endphp
                                    <tr style="background-color: {{$color}}; color:{{$textcolor}}">
                                        {{-- <td>{{$data->created_at}}</td> --}}
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->customer->full_name}}</td>
                                        <td>{{$data->customer->customer_type}}</td>
                                        <td>{{$data->status }}</td>
                                        <td>{{$data->remark}}</td>
                                        <td>
                                            <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>s.l</th>
                                                    <th>Category</th>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data->products as $key2=> $item)
                                                    <tr>
                                                        <th>{{++$key2}}</th>
                                                        <th>{{$item->category->name}}</th>
                                                        <th>{{$item->product_name}}</th>
                                                        <th>{{$item->pivot->quantity}}</th>
                                                        <th>
                                                            <form action="{{route('order.destroy',$item->pivot->id)}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn red"><i class="fa fa-trash"></i> Delete</button>
                                                            </form>
                                                        </th>
                                                    </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                        </td>
                                        <td style="text-align: center">
                                            @if($data->status == 'Pending')
                                                <a class="btn purple" href="{{route('order.confirm',$data->id)}}"><i class="fa fa-check-circle-o"></i> confirm</a>
                                            @endif
                                            <a class="btn blue-chambray"  data-toggle="modal" href=""><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn btn-primary" data-toggle="modal" href="#addProductModal{{$data->id}}"><i class="fa fa-plus"></i>Add Product</a>
                                            <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    {{-- <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update User</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('user-type.update', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">User Name</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="{{$data->name}}" required name="name">
                                                            </div><br><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                        </div>
                                                    </form>
            
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div id="addProductModal{{$data->id}}" class="modal fade " tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Add Products</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                    <div class="m-5 row">
                                                        <form action="{{route('order.store')}}" method="POST">
                                                            @csrf
                                                            
                                                            <div class="col-md-3">
                                                                <label for="product">Warehouse</label>
                                                                <select class="form-control" name="warehouse_id" id="warehouse" required>
                                                                    <option selected>Select</option>
                                                                    @foreach($warehouse as $data)
                                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                                    @endforeach
                                                                    {{csrf_field()}}
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label >Product</label>
                                                                <select class="form-control  product_id" name="product_id" placeholder="Product" required>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-md-3">
                                                                <label for="">Quantity</label>
                                                                <input name="quantity" class="form-control" type="number" required placeholder="Quantity">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="">Discount</label>
                                                                <input name="discount" class="form-control" type="number" required placeholder="Discount">
                                                                {{-- <span class="discount_in_percentage1">
                                                                    <input type="text" class="form-control"  name="discount_in_percentage[1]" placeholder="discount in %" id="percentage_id1"/>
                                                                </span> --}}
                                                                <span class="discount_in_amount1">
                                                                    <input type="text" class="form-control" name="discount_in_amount[1]" placeholder="discount in amount" id="amount_id1"/>
                                                                </span>
                                                                <fieldset class="radio-inline question coupon_question2">
                                                                    <input class="form-check-input want_in_amount1" type="checkbox">Want in Amount ? 
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label >Rate</label>
                                                                {{-- <input name="rate" class="form-control" type="number" required placeholder="Rate"> --}}
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="">Price</label>
                                                                <input type="text" class="form-control amount" placeholder="Total" id="amount1" readonly name="service_amount[1]" >
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label><span>&nbsp;</span></label><br>
                                                                <button class="m-10 btn btn-success">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    {{-- <br>
                                                    <form action="{{route('requisition.destroy',[$data])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form> --}}
                                                    {{-- <a type="submit" href="{{route('customer.delete', $data)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <br>
                                                    <form action="{{route('order-history.destroy',[$data->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div id="deleteproductModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <br>
                                                    <form action="{{route('order.destroy',[$item->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#warehouse").change(function(){
                var id = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{route('order.product.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('.product_id').empty();
                        $('.product_id').append($('<option>', { 
                            value: '',
                            text : "--select--"
                        }));
                        $.each(data, function (i, item) {
                            var name_quantity = item.product_name;
                            $('.product_id').append($('<option>', { 
                                value: item.id,
                                text : name_quantity
                            }));
                        });
                    }
                });
            });
        });
    </script>
    <script>
         $("#addService").click(function(){
                max++;
                appendPlanDescField($("#orderBox"));
                $('.discount_in_amount').hide();
                $(".want_in_amount").click(function() {
                    if($(this).is(":checked")) {
                        $(".discount_in_amount").show();
                        $(".discount_in_percentage").hide();
                        $('#percentage_id').val('');
                    } else {
                        $(".discount_in_amount").hide();
                        $(".discount_in_percentage").show();
                        $('#amount_id').val('');
                    }
                });
    </script>
    <script>
        $(document).on('change',product_id,function(){
            var id = $(this).val();
            $.ajax({
                type:"POST",
                url:"{{route('warehouse.product.price')}}",
                data:{
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    var $results = $('.product_price');
                    var $userDiv = $results.append('<div class="user-div'"></div>')
                    $("<input type='radio' class='selling_price' name='selling_price' id='a' value='"+data.inhouse_selling_price+"'> <span>Inhouse:"+data.inhouse_selling_price+"</span>").appendTo( ".user-div" );
                $("<input type='radio' class='selling_price' name='selling_price' id='b' value='"+data.online_selling_price+"'> <span>Online:"+data.online_selling_price+"</span>").appendTo( ".user-div" );
                $("<input type='radio' class='selling_price' name='selling_price' id='c' value='"+data.retail_selling_price+"'> <span>Retail:"+data.retail_selling_price+"</span>").appendTo( ".user-div" );
                    // $('.product_price'+ max).append(
                    //     $('<input>').prop({
                    //         type: 'radio',
                    //         id: 'price',
                    //         name: 'selling_price',
                    //         value: data.inhouse_selling_price
                    //     })
                    // ).append(
                    //     $('<label>').prop({
                    //         for: 'Price'
                    //     }).html('inhouse_selling_price'+ "(" + data.inhouse_selling_price +")" )
                    // ).append(
                    //     $('<br>')
                    // );
                }
            });
        });
    </script>
    <script>
        $(".answer11").hide();
    $(".coupon_question11").click(function() {
        if($(this).is(":checked")) {
            $(".answer11").show();
            $(".answer22").hide();
        } else {
            $(".answer11").hide();
            $(".answer22").show();
        }
    });
    $(".rxyz2").hide();
        $(".xyz2").click(function() {
            if($(this).is(":checked")) {
                $(".rxyz2").show();
                $(".rxyz1").hide();
                $('#coupon_field_1').val('');
            } else {
                $(".rxyz2").hide();
                $(".rxyz1").show();
                $('#coupon_field_2').val('');
            }
        });
    </script>
@endsection
