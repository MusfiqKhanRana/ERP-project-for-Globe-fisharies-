@extends('backend.master')
@section('site-title')
    General purchase
@endsection
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
            <h3 class="page-title bold">General Purchase
                <small> General Stock </small>
            </h3>
            <hr>
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
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>General Stock
                </div>
                </div>
                <div class="portlet-body">
                    <div>
                    <form action="{{route('general.stock.store')}}" class="form-horizontal" method="POST">
                            {{ csrf_field() }}
                        <div class="row" style="margin-bottom: 2%">
                            <div class="col-md-2">
                                <input type="hidden" class="products" name="products"  id="products">
                                <label for="inputEmail1" class="control-label"><b>Disbursement:</b></label>
                            </div>
                            <div class="col-md-3">
                                <label for="inputEmail1" class="control-label">Date</label>
                                <input type="date" class="form-control disbursement_date" name="disbursement_date" placeholder="Type Item name">
                            </div>
                            <div class="col-md-3">
                                <label for="inputEmail1" class="control-label">Department</label>
                                <select class="form-control department" name="department" id="">
                                    <option value="">--Select--</option>
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputEmail1" class="control-label">Requested By</label>
                                <select class="form-control requested_by" name="requested_by" id="">
                                </select>
                            </div>
                        </div><hr>
                        <label  class="control-label"><b>Product Info : </b></label>
                        <div class="row">
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
                                <label for="">Unit</label>
                                <select class="form-control" id="unit">
                                    <option selected>Select</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="product">Quantity</label>
                                <input type="text" placeholder="quantity" class="form-control" id="quantity">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12" style="text-align:right;">
                                <button type="button" class="btn btn-success" id="addbtn">Add Item</button>
                            </div>
                        </div><br>
                        <label  class="control-label"><b>Item List : </b></label>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>Item Type</th>
                                            <th>Item Name</th>
                                            <th>Item Unit</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table> 
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="inputEmail1" class="control-label">Remark</label>
                                <textarea class="form-control" name="remarks" id="" cols="30" rows="3"></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12" style="text-align:right;">
                                <button type="submit" class="btn btn-success submit_btn">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div> <hr>
                </div>
            </div>
        </div>
     </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function() {
            var max=0;
            var item_id,item_name,item_type_id,item_type_name,item_unit_id,item_unit_name,quantity = null;
            function nullmaking(){

                $("#item").val(null);
                $("#type").val(null);
                $("#quantity").val(null);
                $("#unit").val(null);
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
            });
            $("#addbtn").click(function() {
                product_array.push({"item_id":item_id,"item_name":item_name,"item_type_id":item_type_id,"item_type_name":item_type_name,"item_unit_id":item_unit_id,"item_unit_name":item_unit_name,"quantity":$('#quantity').val(),"status":"stay"})
                $("#products").val('');
                $("#products").val(JSON.stringify(product_array));
                console.log(product_array);
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        if(product_array.length-1 == key){
                            $("table#mytable tr").last().after("<tr id='"+key+"'><td>"+product.item_type_name+"</td><td>"+product.item_name+"</td><td>"+product.item_unit_name+"</td><td>"+product.quantity+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
            // if ($(".disbursement_date").val()==null || $(".department").val()==null || $(".requested_by").val()==null || $(".products").val()==null) {
            //     $(".submit_btn").attr("disabled",true);
            //     console.log('good');
            // }
            // else{
            //     $(".submit_btn").attr("disabled",false);
            // };
            $(".department").on('change',function () {
                var dept_id = $(this).find('option:selected').val();
                console.log(dept_id);
                $.ajax({
                    type:"POST",
                    url:"{{route('general.stock.user.data_pass')}}",
                    data:{
                        'id' : dept_id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        var option = null;
                        $(".requested_by").html("");
                        $.each( data, function( key, product ) {
                            option+='<option data-name="'+product.name+'" value="'+product.id+'">'+product.name+'</option>';
                        });
                        $('.requested_by').append(option);
                    }
                });
            });
        });
    </script>
@endsection
