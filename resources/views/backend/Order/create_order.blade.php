@extends('backend.master')
@section('site-title')
    Order Management
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Order Management
            </h3>
            <!-- END PAGE TITLE-->
            
            <!--category table start-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Product Order </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <form action="{{route('order.store')}}" class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-section">
                                <button type="button" class="btn dark pull-right " id="addbtn">Add Another Item <i class= 'fa fa-plus'> </i> </button>
                                <a class="btn btn-primary " data-toggle="modal" href="#basic">
                                    New Customer
                                    <i class="fa fa-plus"></i>
                                </a>
                                <label class="col-md-2 control-label pull-left bold">Customer Select: </label>
                                <div class="col-md-6">
                                    <select class="select2Ajax form-control" name="customer_id" id="customer_id"></select>
                                </div>
                            </div><br><br>
                        </div>
                        <div id="customer_info">
                            {{-- <div class="col-md-3 text-center">
                                <span> <b>cusotmer Name:</b> this is good</span>
                            </div> --}}
                        </div>
                        <div class="row" style="margin-top:2%">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><b>Product Info</b></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Category</label>
                                                <select class="form-control" id="category">
                                                    <option selected>Select</option>
                                                    @foreach($category as $data)
                                                        <option value="{{$data->id}}" data-name="{{$data->name}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product">Product</label>
                                                <select class="form-control product_id" id="product">
                                                    @foreach ($category as $data)
                                                        @foreach ($data->product as $product)
                                                            <option value="{{$product->id}}" class="{{$data->id}}" title="{{$product->pack->name}}" data-pack_name="{{$product->pack->name}}" data-online_selling_price="{{$product->online_selling_price}}" data-inhouse_selling_price="{{$product->inhouse_selling_price}}" data-pack_weight="{{$product->pack->weight}}" data-pack_id="{{$product->pack->id}}" data-id="{{$data->id}}" data-name="{{$product->product_name}}">{{$product->product_name}} - {{$product->pack->name}} </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product">Pack Size</label>
                                                <input type="text" class="form-control" id="pack_size" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product">Rate (TK)</label>
                                                <input type="text" class="form-control" id="rate" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><b>Quantity & Price</b></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Quantity In Packet</label>
                                                <input type="number" id="quantity_pkt" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Quantity In KG</label>
                                                <input type="number" id="quantity_kg" class="form-control" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="discount"> Discount </label>
                                                <span class="discount_in_percentage">
                                                    <input type="text" class="form-control"  placeholder="discount in %" id="percentage_id"/>
                                                </span>
                                                <span class="discount_in_amount">
                                                    <input type="text" class="form-control" placeholder="discount in amount" id="amount_id"/>
                                                </span>
                                                <fieldset class="radio-inline question coupon_question2">
                                                    <input class="form-check-input want_in_amount" type="checkbox">Want in Amount ? 
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" id="price" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-2">
                                <div class="col-md-11">
                                    <label>Category</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-10">
                                    <label>Product:</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="col-md-10"style="margin-left:-20px">
                                    <label>Rate:</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-10">
                                    <label>Quantity:</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-10">
                                    <label>Discount:</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="col-md-10">
                                    <label>Price:</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="col-md-10">
                                    <label>Action</label>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row" style="margin: 1%">
                            <div class="card m-2">
                                <div class="card-header">
                                    <h3><b>Products</b></h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered table-hover" id="mytable">
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Product Name</th>
                                            <th>Pack Size</th>
                                            <th>Quantity(Packet)</th>
                                            <th>Quantity(KG)</th>
                                            <th>Rate</th>
                                            <th>Discount(Percentage)</th>
                                            <th>Discount(Amount)</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <th colspan="8" style="text-align: right;">Sub Total</th>
                                            <th><span id="intotal_amount">0</span></th>
                                            <th></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row serviceRow redBorder"  id="orderBox">
                            {{-- <div class="col-md-2">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <select class="form-control" name="category_id[1]" id="category1" required>
                                            <option selected>Select</option>
                                            @foreach($category as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                            {{csrf_field()}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <select class="form-control product_id1" name="product_id[1]" id="product1" required>
                                            @foreach ($category as $data)
                                                @foreach ($data->product as $product)
                                                    <option value="{{$product->id}}" class="{{$data->id}}" title="{{$product->pack->name}}">{{$product->product_name}}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 ">
                                <div class="form-group">
                                    <div class="col-md-10 product_price1" style="margin-left:-20px">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control service_qty1" placeholder="Quantity" required id="service_qty[]" name="service_quantity[1]">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <span class="discount_in_percentage1">
                                            <input type="text" class="form-control"  name="discount_in_percentage[1]" placeholder="discount in %" id="percentage_id1"/>
                                        </span>
                                        <span class="discount_in_amount1">
                                            <input type="text" class="form-control" name="discount_in_amount[1]" placeholder="discount in amount" id="amount_id1"/>
                                        </span>
                                        <fieldset class="radio-inline question coupon_question2">
                                            <input class="form-check-input want_in_amount1" type="checkbox">Want in Amount ? 
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control amount" placeholder="Total" id="amount1" readonly name="service_amount[1]" >
                                    </div>	
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <button type="button" class="btn removeService red btn-block" id="removeService" disabled="disabled"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-action">
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label"><b>Total Discount</b></label>
                                    <input type="number" id="grand_discount" class="form-control"  name="total_discount">
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"><b>Grand Total</b></label>
                                    <input type="number" id="grand_total" class="form-control" value="0" readonly>
                                    <input type="hidden" name="products" value="" id="products">
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"><b>Payment Method</b></label>
                                    <select name="payment_method" class="form-control payment_method">
                                        <option value="Cash">Cash</option>
                                        <option value="Bkash">Bkash</option>
                                        <option value="Nagad">Nagad</option>
                                        <option value="Rocket">Rocket</option>
                                    </select>
                                </div>
                                {{-- <div class="transaction_number">
                                    <div class="col-md-3">
                                        <label class="control-label"><b>Transaction Number</b></label>
                                        <input type="text" class="form-control" name="trx_number">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><b>Transaction ID</b></label>
                                        <input type="text" class="form-control" name="trx_id">
                                    </div>
                                </div> --}}
                                <div class="col-md-2">
                                    <label class="control-label"><b>Paid Amount</b></label>
                                    <input type="number" class="form-control" id="paid_amount" name="paid_amount">
                                </div>
                                <div class="col-md-2">
                                    <label class="control-label"><b>Due</b></label>
                                    <input type="number" value="0" id="grand_due_amount" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <fieldset class="radio-inline question">
                                    <input class="form-check-input want_delivery_charge" type="checkbox">Want to add delivery charge ? 
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1 control-label"><b>Remark</b></label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="remark" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group add_delivery_charge">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-success pull-left">Add Delivery Charge</button>
                                        </div>
                                        <!-- /btn-group -->
                                        {{-- <input type="text" class="form-control total" id="total" name="total_amount" style="font-size:25px; font-weight: bold" readonly>  --}}
                                        {{-- <input type="number" class="from-control" style="font-size:19px; font-weight: bold" placeholder="Total discount in amount" name="total_discount"> --}}
                                        <input type="number" id="delivery_charge" class="from-control" style="font-size:19px; font-weight: bold" placeholder="Delivery Charge" name="delivery_charge">
                                    </div>
                                </div>
                                {{-- <div class="col-md-3">
                                    <input type="number" class="from-control" style="font-size:17px; font-weight: bold" placeholder="Total discount in amount" name="total_discount">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="from-control" style="font-size:17px; font-weight: bold" placeholder="Delivery Charge" name="delivery_charge">
                                </div> --}}
                                <div class="col-md-3 pull-right">
                                    <button type="submit" class="btn purple btn-block ">Submit</button>
                                </div>
                            </div>
                        </div>
                        <!--End Form Footer Area-->
                    </form>
                </div>

            </div>
            <!--category table end-->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Customer</h4>
                </div>
                <form class="form-horizontal" role="form" method="post" action="{{route('customer.detail.store')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Full Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder=" Name" required name="full_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Designation</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="Designation" name="designation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Phone</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" placeholder=" Phone" required name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" placeholder=" Email" required name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Address</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder=" Address" name="address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Area Name</label>
                        <div class="col-md-8">
                                <select class="custom-select form-control mr-sm-2" name="area_id" id="inlineFormCustomSelect">
                                  <option selected>Choose...</option>
                                  @foreach ($areas as $area)
                                    <option value="{{$area->id}}">{{$area->name}}</option>    
                                  @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Customer Type</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <label class="radio-inline">
                                    <input type="radio" value="inhouse" name="customer_type" checked>Inhouse
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="online" name="customer_type">Online
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="modern_trade" name="customer_type">Modern Trade
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="sample" name="customer_type">Sample
                                </label>
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-7 control-label">Suggestions or topics you would like to be included:</label>
                        <div class="col-md-12">
                            <div class="col-md-12 ">
                                <input type="text" class="form-control" placeholder="Your Text (Not Required)" name="include_word">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                        <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function() {
            function nullmaking(){

                $("#category").val(null);
                $("#product").val(null);
                $("#pack_size").val(null);
                $("#rate").val(null);
                $("#quantity_pkt").val(null);
                $("#quantity_kg").val(null);
                $("#percentage_id").val(null);
                $("#amount_id").val(null);
                $("#price").val(null);
            }
            $("#product").chained("#category");
            var category_id,category_name,discount_in_amount,discount_in_percentage,product_id,total_price,packet_quantity,product_name,product_online_rate,product_inhouse_rate,product_pack_name,product_pack_weight,product_pack_id,inhouse_rate,online_rate = null;
            var product_array = [];
            $('#product').change(function(){
                product_id = $(this).val();
                product_name = $(this).find(':selected').data("name");
                product_pack_id = $(this).find(':selected').data("pack_id");
                product_pack_name = $(this).find(':selected').data("pack_name");
                product_pack_weight = $(this).find(':selected').data("pack_weight");
                product_online_rate = $(this).find(':selected').data("online_selling_price");
                product_inhouse_rate = $(this).find(':selected').data("inhouse_selling_price");
                $('#pack_size').val(product_pack_name);
                $("#rate").empty();
                var customer_type = $('#customer_type').html();
                var selling_price = null;
                if(customer_type=="inhouse"){
                    selling_price = product_inhouse_rate;
                }
                else if(customer_type == "online"){
                    selling_price = product_online_rate;
                }
                $("#rate").val(selling_price);
                // console.log(product_online_rate,product_inhouse_rate,product_id,product_name,product_pack_id,product_pack_name,product_pack_weight);
            })
            $('#quantity_pkt').keyup(function(){
                packet_quantity = $(this).val();
                $("#quantity_kg").val(packet_quantity*product_pack_weight);
                $("#price").val(packet_quantity * $("#rate").val());
                total_price = $("#price").val();
            })
            $('#category').change(function(){
                category_id = $(this).val();
                category_name = $(this).find(':selected').data("name");
            })
            $(document).on('keyup','#percentage_id',function() {
                let main_price = total_price - (total_price*$(this).val())/100;
                $('#price').val(main_price);
                discount_in_percentage = $(this).val()
            });
            $(document).on('keyup','#amount_id',function() {
                let main_price = total_price - ($(this).val());
                discount_in_amount = $(this).val();
                $('#price').val(main_price);
            });
            $('.discount_in_amount').hide();
            $(".want_in_amount").click(function() {
                if($(this).is(":checked")) {
                    $(".discount_in_amount").show();
                    $(".discount_in_percentage").hide();
                    $('#percentage_id').val('');
                    discount_in_percentage = 0;
                } else {
                    $(".discount_in_amount").hide();
                    $(".discount_in_percentage").show();
                    discount_in_amount = 0;
                    $('#amount_id').val('');
                }
            });
            $("#addbtn").click(function() {
                product_array.push({"category_id":category_id,"category_name":category_name,"product_id":product_id,"product_name":product_name,"pack_size":$('#pack_size').val(),"quantity_packet":$('#quantity_pkt').val(),"quantity_kg":$('#quantity_kg').val(),"rate":$('#rate').val(),"percentage_discount":$('#percentage_id').val(),"amount_discount":$('#amount_id').val(),'total_price':$('#price').val(),"status":"stay"})
                $("#products").val('');
                $("#products").val(JSON.stringify(product_array));
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        if(product_array.length-1 == key){
                            $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+product.category_name+"</td><td>"+product.product_name+"</td><td>"+$('#pack_size').val()+"</td><td>"+$('#quantity_pkt').val()+"</td><td>"+$('#quantity_kg').val()+"</td><td>"+$('#rate').val()+"</td><td>"+$('#percentage_id').val()+"</td><td>"+$('#amount_id').val()+"</td><td>"+$('#price').val()+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $("#intotal_amount").html("")
                $("#intotal_amount").html(total())
                $("#grand_total").val(total())
                $(".delete").click(function(){
                    product_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#products").val('');
                    $("#products").val(JSON.stringify(product_array));
                    $("#intotal_amount").html("")
                    $("#intotal_amount").html(total())
                    $("#grand_total").val(total())
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
            });
            function total() {
                var inTotal = 0;
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        inTotal+= parseInt(product.total_price);
                    }
                    
                });
                return inTotal;
            }
            $(".transaction_number").hide();
            $('.payment_method').change(function(){
                var input = $(this).val();
                if (input=="Bkash" || input=="Nagad" || input=="Rocket"){
                    $(".transaction_number").show();
                }else{
                    $(".transaction_number").hide();
                }
            })
            $('#grand_discount').keyup(function(){
                let grand_total = parseInt($("#intotal_amount").html())-$(this).val();
                $("#grand_total").val(grand_total);
            })
            $('#paid_amount').keyup(function(){
                let grand_total = $("#grand_total").val()-$(this).val();
                $("#grand_due_amount").val(grand_total);
            })
            // $(document).on('click', '#due', function () {
            //     $("#due_amount").show();
            // });
            // $(document).on('click', '#paid', function () {
            //     $("#due_amount").hide();
            // });
            //Commom Script
            $('.dpicker').datepicker({
                autoclose: true
            });
            var currentDate = new Date();
            $(".createdpicker").datepicker("setDate",currentDate);
            $("#loader").css("display",'none');
            $("#myDiv").removeAttr("style");
            $("#addService").removeAttr("disabled");
            $('.add_delivery_charge').hide();

            $(".want_delivery_charge").click(function() {
                if($(this).is(":checked")) {
                    $(".add_delivery_charge").show();
                } else {
                    $(".add_delivery_charge").hide();
                    $("#delivery_charge").val('');
                }
            });
            $("#customer_id").change(function() {
                $.ajax({
                    type:"POST",
                    url:"{{route('customer.info')}}",
                    data:{
                        'id' : $(this).val(),
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $("#customer_info").empty();
                        var $results = $('#customer_info');
                        var $userDiv = $results.append('<div class="user-div"></div>')
                        $( '<div class="row">'+
                            '<div class="col-md-3 text-center"><span> <b>cusotmer Name: </b>'+data.full_name+'</span></div>'
                            +'<div class="col-md-3 text-center"><span> <b>cusotmer Address: </b>'+data.address+'</span></div>'
                            +'<div class="col-md-3 text-center"><span> <b>cusotmer Phone: </b>'+data.phone+'</span></div>'
                            +'<div class="col-md-3 text-center"><span> <b>cusotmer Type: </b><span id="customer_type">'+data.customer_type+'</span></span></div>'
                        +'</div>').appendTo( ".user-div" );
                    }
                });
            });
        });

        $('.select2Ajax').select2({
            placeholder: 'Select an item',
            ajax: {
                url: "{{route('select2.autocomplete.ajax')}}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.full_name + " | "+item.customer_type+" | "+item.phone+" | "+item.area.name,
                                title:item.phone,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endsection
