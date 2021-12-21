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
                                
                                    <button type="button" class="btn dark pull-right " id="addService" disabled="disabled">Add Another Item <i class= 'fa fa-plus'> </i> </button>
                                    <a class="btn btn-primary " data-toggle="modal" href="#basic">
                                        New Customer
                                        <i class="fa fa-plus"></i>
                                    </a>
                                    <label class="col-md-2 control-label pull-left bold">Customer Select: </label>
                                    <div class="col-md-6">
                                        <select class="select2Ajax form-control" name="customer_id"></select>
    
                                    </div>
                                </div><br><br>
                                {{-- <div class="form-group clearfix">
                                    <label class="col-md-1 control-label">Trasaction Select</label>
                                    <div class="col-md-6">
                                        <label class="radio-inline">
                                            <input id="due" type="radio" value="0" name="status">Unsubscribe</label>

                                        <div class="row" style="display: none" id="due_amount">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">From Date:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input class="form-control" type="text" name="form_date" id="from_date" placeholder="From Date" readonly />                                                 <span class="input-group-btn">
                                                     <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                     </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"  >
                                                <label class="control-label col-md-4">To Date:</label>
                                                <div class="col-md-8">
                                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input class="form-control" type="text" name="to_date" id="from_date" placeholder="From Date" readonly />                                                 <span class="input-group-btn">
                                                     <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                     </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="radio-inline"><input type="radio" id="paid" value="1" required name="status">Subscribe</label>
                                    </div>
                            </div> --}}
                        </div>

                            <div class="row" style="margin-top:5%">
                                <div class="col-md-2">
                                    <div class="col-md-11">
                                        <label>Warehouse</label>
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
                                </div>
                            </div>

                            <div class="row serviceRow redBorder"  id="orderBox">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <select class="form-control" name="warehouse_id[1]" id="department1" required>
                                                <option selected>Select</option>
                                                @foreach($warehouse as $data)
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
                                            <select class="form-control product_id1" name="product_id[1]" required>
                                                
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
                                </div>
                            </div>

                        <div class="form-action">
                            <div class="form-group">
                                <label class="col-md-1 control-label"><b>Remark</b></label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="remark" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-success pull-left">Total Amount</button>
                                        </div>
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control total" id="total" name="total_amount" style="font-size:25px; font-weight: bold" readonly>
                                    </div>
                                </div>
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
                            <input type="text" class="form-control" placeholder="Customer Name" required name="full_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Designation</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="Customer Name" name="designation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Phone</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" placeholder="Customer Phone" required name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" placeholder="Customer Email" required name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Address</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="Customer Address" name="address">
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
    <script>
        

        jQuery(document).ready(function() {
            var max = 1;
            var warehouse = @json($warehouse, JSON_PRETTY_PRINT);
            var price = 0;
            var quantity = 0;
            var amount = 0;
            var total = 0;
            var total_price =0;
            var dis_a =0;
            var in_total_amount=0;
            $(document).on('click', '#due', function () {
                $("#due_amount").show();
            });
            $(document).on('click', '#paid', function () {
                $("#due_amount").hide();
            });
            //Commom Script
            $('.dpicker').datepicker({
                autoclose: true
            });
            var currentDate = new Date();
            $(".createdpicker").datepicker("setDate",currentDate);
            $("#loader").css("display",'none');
            $("#myDiv").removeAttr("style");
            $("#addService").removeAttr("disabled");
            function appendPlanDescField(container) {
                var options ="";
                for (let index = 0; index < warehouse.length; index++) {
                    options+='<option value="'+warehouse[index].id+'">'+warehouse[index].name+'</option>'
                }
                container.after(
                    '<div class="row serviceRow redBorder"  id="orderBox">'+
                        '<hr>'+
                        '<div class="col-md-2">'+
                            '<div class="form-group">'+
                                '<div class="col-md-10">'+
                                    '<select class="form-control" name="warehouse_id['+max+']" id="department'+max+'" required>'+
                                        '<option>--select--</option>'+options
                                    +'</select>'
                                +'</div>'
                            +'</div>'
                        +'</div>'+
                        '<div class="col-md-2">'+
                            '<div class="form-group">'+
                                '<div class="col-md-10">'+
                                    '<select class="form-control product_id'+max+'" name="product_id['+max+']" required>'+
                                    '</select>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-1 ">'+
                            '<div class="form-group">'+
                                '<div class="col-md-10 product_price'+max+'" style="margin-left:-20px">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                            '<div class="form-group">'+
                                '<div class="col-md-10">'+
                                    '<input type="text" class="form-control service_qty'+max+'" placeholder="Quantity" required id="service_qty[]" name="service_quantity['+max+']">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                            '<div class="form-group">'+
                                '<div class="col-md-10">'+
                                    '<span class="discount_in_percentage'+max+'">'+
                                         '<input type="text" class="form-control" name="discount_in_percentage['+max+']" placeholder="discount in %" id="percentage_id'+max+'"/>'+
                                    '</span>'+
                                    '<span class="discount_in_amount'+max+'">'+
                                        '<input type="text" class="form-control" name="discount_in_amount['+max+']" placeholder="discount in amount" id="amount_id'+max+'"/>'+
                                    '</span>'+
                                    '<fieldset class="radio-inline question coupon_question2">'+
                                        '<input class="form-check-input want_in_amount'+max+'" type="checkbox">Want in Amount ? '+
                                    '</fieldset>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-2">'+
                            '<div class="form-group">'+
                                '<div class="col-md-10">'+
                                    '<input type="text" class="form-control amount" placeholder="Total" id="amount'+max+'" readonly name="service_amount['+max+']" >'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-1">'+
                            '<div class="form-group">'+
                                '<div class="col-md-10">'+
                                    '<button type="button" class="btn removeService red btn-block" id="removeService" disabled="disabled"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                                '</div>'+
                            '</div>'+
                        '<div>'+
                    '</div>'
                    // '<div class="input-group">'+
                    //     '<div class="col-md-3">'+
                    //         '<label for="category">Category</label>'+
                    //         '<select class="form-control select2me category'+max+'"  name="category_id['+max+']" required>'+
                    //             '<option value="">--select--</option>'+options+
                    //         '</select>'
                    //     +'</div>'+
                    //     '<div class="col-md-3">'+
                    //         '<label for="category">Product</label>'+
                    //         '<select class="form-control select2me product'+max+'" name="product_id['+max+']"  placeholder="Product" required>'+
                    //         '</select>'
                    //     +'</div>'+
                    //     '<div class="col-md-3">'
                    //         +'<label for="">Packet</label>'+
                    //         '<input name="packet['+max+']" class="form-control" type="number" required placeholder="Packet">'+
                    //     '</div>'+
                    //     '<div class="col-md-3">'+
                    //         '<label for="">Quantity</label>'+
                    //         '<input name="quantity['+max+']" class="form-control" type="number" required placeholder="Quantity">'+
                    //     '</div>'+
                    //     '<div class="col-md-3">'+
                    //         '<span class="input-group-btn">'+
                    //             '<button class="btn btn-danger margin-top-20 delete_desc" type="button"><i class="fa fa-times"></i></button>'+
                    //         '</span>'+
                    //     '</div>'+
                    // '</div>'
                );
            }
            $("#addService").click(function(){
                max++;
                appendPlanDescField($("#orderBox"));
                $('.discount_in_amount'+max).hide();
                $(".want_in_amount"+max).click(function() {
                    if($(this).is(":checked")) {
                        $(".discount_in_amount"+max).show();
                        $(".discount_in_percentage"+max).hide();
                        $('#percentage_id'+max).val('');
                    } else {
                        $(".discount_in_amount"+max).hide();
                        $(".discount_in_percentage"+max).show();
                        $('#amount_id'+max).val('');
                    }
                });
                var department = '#department' + max;
                $(document).on('change',department,function(){
                    var id = $(this).val();
                    $.ajax({
                        type:"POST",
                        url:"{{route('warehouse.product.pass')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val()
                        },
                        success:function(data){
                            $('.product_id'+max).empty();
                            $('.product_id'+max).append($('<option>', { 
                                value: '',
                                text : "--select--"
                            }));
                            $.each(data, function (i, item) {
                                var name_quantity = item.product_name;
                                $('.product_id'+max).append($('<option>', { 
                                    value: item.id,
                                    text : name_quantity
                                }));
                            });
                        }
                    });
                });
                var product_id = '.product_id' + max;
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
                            var $results = $('.product_price'+ max);
                            var $userDiv = $results.append('<div class="user-div'+ max +'"></div>')
                            $("<input type='radio' class='selling_price"+max+"' name='selling_price' id='a"+max+"' value='"+data.inhouse_selling_price+"'> <span>Inhouse:"+data.inhouse_selling_price+"</span>").appendTo( ".user-div"+max );
                        $("<input type='radio' class='selling_price"+max+"' name='selling_price' id='b"+max+"' value='"+data.online_selling_price+"'> <span>Online:"+data.online_selling_price+"</span>").appendTo( ".user-div"+max );
                        $("<input type='radio' class='selling_price"+max+"' name='selling_price' id='c"+max+"' value='"+data.retail_selling_price+"'> <span>Retail:"+data.retail_selling_price+"</span>").appendTo( ".user-div"+max );
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
                reloadMax();
                // var serviceRowQty = $('.serviceRow').length;
                // $("#orderBox:last").clone(true).insertAfter("div.serviceRow:last");
                // $("div.serviceRow:last input").val('');
                // $("div.serviceRow:last textarea").val('');
                // $("div.serviceRow:last select").prop('selectedIndex',0);
                // $("div.serviceRow:last label").text('');
                $("div.serviceRow .removeService").prop('disabled', false);
                return false;

            });

            $(document).on("click" , "#removeService" , function()  {
                var pTotal = parseInt($('.total').val());
                var tr = $(this).parent().parent().parent().parent();
                var amount = parseInt(tr.find('.amount').val());
                var total = pTotal - amount;
                $('.total').val(total);
                var serviceRowQty = $('.serviceRow').length;
                if (serviceRowQty == 1){
                    $("div.serviceRow .removeService").prop('disabled', true);
                    return false;
                    $(".serviceRow").css("display", "block");
                }else{
                    $(this).closest('.serviceRow').remove();
                    if(serviceRowQty==1){
                        $("div.serviceRow .removeService").prop('disabled', true);
                        return false
                    }else{
                        $("div.serviceRow .removeService").prop('disabled', false);
                    }
                    return false;
                }
                alert();
                return false;
            });

            function totalamount(t){
                var t = 0;

                $('.amount').each(function(i,e){
                    var amt = $(this).val();
                    t += parseInt(amt);
                });
                total = t;
                $('.total').val(t);
            }
            $(document).on('change','#department'+max,function(){
                var id = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{route('warehouse.product.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('.product_id'+max).empty();
                        $('.product_id'+max).append($('<option>', { 
                            value: '',
                            text : "--select--"
                        }));
                        $.each(data, function (i, item) {
                            var name_quantity = item.product_name;
                            $('.product_id'+max).append($('<option>', { 
                                value: item.id,
                                text : name_quantity
                            }));
                        });
                    }
                });
            });
            $(document).on('change','.product_id'+max,function(){
                var id = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{route('warehouse.product.price')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        var $results = $('.product_price'+ max);
                        var $userDiv = $results.append('<div class="user-div'+ max +'"></div>')
                        $("<input type='radio' class='selling_price"+max+"' name='selling_price' id='a"+max+"' value='"+data.inhouse_selling_price+"'> <span>Inhouse:"+data.inhouse_selling_price+"</span>").appendTo( ".user-div"+max );
                        $("<input type='radio' class='selling_price"+max+"' name='selling_price' id='b"+max+"' value='"+data.online_selling_price+"'> <span>Online:"+data.online_selling_price+"</span>").appendTo( ".user-div"+max );
                        $("<input type='radio' class='selling_price"+max+"' name='selling_price' id='c"+max+"' value='"+data.retail_selling_price+"'> <span>Retail:"+data.retail_selling_price+"</span>").appendTo( ".user-div"+max );
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

            $('.discount_in_amount'+max).hide();

            $(".want_in_amount"+max).click(function() {
                if($(this).is(":checked")) {
                    $(".discount_in_amount"+max).show();
                    $(".discount_in_percentage"+max).hide();
                    $('#percentage_id'+max).val('');
                    $('#amount').val(total_price);
                } else {
                    $(".discount_in_amount"+max).hide();
                    $(".discount_in_percentage"+max).show();
                    $('#amount_id'+max).val('');
                    $('#amount').val(total_price);
                }
            });
            reloadMax();
            function reloadMax(){
                $(document).on('change', '.selling_price'+max, function () {
                    price = $(this).val();
                });
                $(document).on('keyup','.service_qty'+max,function() {
                    quantity = $(this).val();
                    amount = $('#amount'+max).val(price*quantity);
                    total+=price*quantity;
                    total_price= $('#amount'+max).val();
                    $('#total').val(total);
                });
                $(document).on('keyup','#percentage_id'+max,function() {
                    let discount = total_price - (total_price*$(this).val())/100;
                    in_total_amount+=discount;
                    $('#amount'+max).val(discount);
                    $('#total').val(in_total_amount);
                });
                $(document).on('keyup','#amount_id'+max,function() {
                    let discount = total_price - ($(this).val());
                    in_total_amount+=discount;
                    $('#amount'+max).val(discount);
                    $('#total').val(in_total_amount);
                });
            }
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
                        text: item.full_name,
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
