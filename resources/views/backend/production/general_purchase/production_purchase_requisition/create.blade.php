@extends('backend.master')
@section('site-title')
    Add Requisition
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
            <h3 class="page-title bold">Supply Management
            </h3>
            <!-- END PAGE TITLE-->
            
            <!--category table start-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Add Requisition</div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <form action="{{route('production-purchase-requisition.store')}}" class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-section">
                                <div class="row" style="margin-bottom: 1%">
                                    <label class="col-md-2 control-label pull-left bold">Select Department: </label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="department_id" id="department_id">
                                            <option value="">--select--</option>
                                            @foreach ($dept as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 control-label pull-left bold">Requested By : </label>
                                    <div class="col-md-6">
                                        <input class="form-control" value="{{Auth::user()->name}}" readonly type="text">
                                        <input class="form-control" name="requested_by" value="{{Auth::user()->id}}" type="hidden" id="requested_by">
                                    </div>
                                </div>
                            </div><br><br>
                        </div>
                        <div id="supplier_info">
                            
                        </div>
                        <div class="row" style="margin-top:2%">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><b>Product Info</b></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row" style="margin-bottom:2%">
                                            <div class="col-md-3">
                                                <label for="product">Item Types</label>
                                                <select class="form-control" id="type">
                                                    <option selected>--Select--</option>
                                                    @foreach ($types as $item)
                                                       <option value="{{$item->id}}">{{$item->name}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Select Item</label>
                                                <select class="form-control" id="item">
                                                    <option selected>Select</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="product">Demand Date</label>
                                                <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                    <input type="text" class="form-control" placeholder="date_of_test_inception" id="demand_date" readonly >
                                                    <span class="input-group-btn">
                                                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="product">Upload Image</label>
                                                <input class="form-control" type="file" id="image">
                                            </div>
                                        </div>
                                        <div class="row"  style="margin-bottom:2%">
                                            <div class="col-md-3">
                                                <label for="product">Quantity</label>
                                                <input type="text" placeholder="quantity" class="form-control" id="quantity">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Unit</label>
                                                <select class="form-control" id="unit">
                                                    <option selected>Select</option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product">Specification</label>
                                                <input placeholder="specification to specific.." type="text" class="form-control" id="specification">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <label for="product">Remark</label>
                                                <textarea placeholder="add remark,if there's any!!" class="form-control" name="" id="remark" cols="30" rows="3"></textarea>
                                            </div>
                                            <div class="col-md-2" style="margin-top: 6%">
                                                <button id="addbtn" type="button" class="btn btn-success">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin: 1%">
                            <div class="card m-2">
                                <div class="card-header">
                                    <h3><b>Requisition</b></h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered table-hover" id="mytable">
                                        <tr>
                                            <th>Item Details</th>
                                            <th>Demand Date</th>
                                            <th>Specification</th>
                                            <th>Quantity</th>
                                            <th>Remark</th>
                                            <th>Action</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row serviceRow redBorder"  id="orderBox">
                           
                        </div> --}}
                        <div class="form-action">
                                <div class="col-md-2">
                                    <input type="hidden" name="products"  id="products">
                                </div>
                            <div class="form-group">
                                <label class="col-md-1 control-label"><b>Remark</b></label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="remark" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
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
    {{-- <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
    </div> --}}

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function() {
            var max=0;
            var item_id,item_name,item_type_id,item_type_name,item_unit_id,item_unit_name,demand_date,image,quantity,specification,remark = null;
            function nullmaking(){

                $("#item").val(null);
                $("#type").val(null);
                $("#demand_date").val(null);
                $("#image").val(null);
                $("#quantity").val(null);
                $("#unit").val(null);
                $("#specification").val(null);
                $("#remark").val(null);
            }
            $("#item").change(function(){
                item_id = $(this).find('option:selected').val();
                item_name = $(this).find('option:selected').text();
                item_unit_id = $("#unit").find('option:selected').val();
                item_unit_name = $("#unit").find('option:selected').text();
                // console.log(item_id);
            });
            var product_array = [];
            $("#type").change(function() {
             
                max = $(this).val();
                item_type_id = $(this).find('option:selected').val();
                item_type_name = $(this).find('option:selected').text();
                // console.log($(this).val());
                $.ajax({
                    type:"get",
                    url:"/admin/production-purchase-requisition/"+$(this).val(),
                    success:function(data){
                        console.log(data);
                        $("#item").html("");
                        $("#unit").html("");
                        let option="<option value=''>Select</option>";
                        $.each( data, function( key, data ) {
                            option+='<option data-name="'+data.name+'" value="'+data.id+'">'+data.name+'</option>';
                        });
                        let optionunit="<option value=''>Select</option>";
                        $.each( data, function( key, data ) {
                            optionunit='<option data-name="'+data.name+'" value="'+data.production_purchase_unit_id+'" selected>'+data.productionpurchaseunit.name+'</option>';
                        });
                        $('#item').append(option);
                        $("#unit").append(optionunit);
                    }
                });
                // $.ajax({
                //     type:"get",
                //     url:"/admin/get-supplier-items/"+$(this).val(),
                //     success:function(data){
                //         console.log(data);
                //         $("#item").html("");
                //         let option="<option value=''>Select</option>";
                //         $.each( data, function( key, data ) {
                //             option+='<option data-name="'+data.name+'" data-unit_price="'+data.pivot.rate+'" data-grade_id="'+data.grade_id+'" value="'+data.id+'">'+data.name+'</option>';
                //         });
                //         $('#item').append(option);
                //     }
                // });
            });
            $("#addbtn").click(function() {
                product_array.push({"item_id":item_id,"item_name":item_name,"item_type_id":item_type_id,"item_type_name":item_type_name,"item_unit_id":item_unit_id,"item_unit_name":item_unit_name,"image":"abc.jpg","demand_date":$('#demand_date').val(),"quantity":$('#quantity').val(),"specification":$('#specification').val(),"remark":$('#remark').val(),"status":"stay"})
                $("#products").val('');
                $("#products").val(JSON.stringify(product_array));
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        if(product_array.length-1 == key){
                            $("table#mytable tr").last().after("<tr id='"+key+"'><td><ul><li>"+product.image+"</li><li>Item-name :"+product.item_name+"</li><li>Item type : "+product.item_type_name+"</li><li>Item Unit : "+product.item_unit_name+"</li></ul></td><td>"+product.demand_date+"</td><td>"+product.specification+"</td><td>"+product.quantity+"</td><td>"+product.remark+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $(".delete").click(function(){
                    product_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#products").val('');
                    $("#products").val(JSON.stringify(product_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
            });
        });
    </script>
@endsection
