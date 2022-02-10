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
    <!-- BEGIN PAGE TITLE-->
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
            <h3 class="page-title bold">Purchase Management
            </h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Production Purchase Unit List
                </div>
                    {{-- <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#add_procution_purchase_units">
                            Add New
                        <i class="fa fa-plus"></i> </a>
                    </div> --}}
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Department</th>
                                <th>Requested By</th>
                                <th>Remark</th>
                                <th>Items</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($requisition as $key=> $data)
                                <tr id="row1">
                                    <td>{{++ $key }}</td>
                                    <td class="text-align: center;"> {{$data->departments->name}}</td>
                                    <td class="text-align: center;"> {{$data->users->name}}</td>
                                    <td class="text-align: center;"> {{$data->remark}}</td>
                                    <td class="text-align: center;">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Sl.
                                                    </th>
                                                    <th>
                                                        Item Details
                                                    </th>
                                                    <th>
                                                        Demand Date
                                                    </th>
                                                    <th>
                                                        Quantity
                                                    </th>
                                                    <th>
                                                       Specification
                                                    </th>
                                                    <th>
                                                        Remark
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->items as $key2 => $item)
                                                    <tr>
                                                        <td>{{++$key2}}</td>
                                                        <td><ul><li>{{$item->pivot->image}}</li><li>{{$item->pivot->item_name}}</li><li>{{$item->pivot->item_type_name}}</li><li>{{$item->pivot->item_unit_name}}</li></ul></td>
                                                        <td>{{$item->pivot->demand_date}}</td>
                                                        <td>{{$item->pivot->quantity}}</td>
                                                        <td>{{$item->pivot->specification}}</td>
                                                        <td>{{$item->pivot->remark}}</td>
                                                        <td><button data-toggle="modal" href="#edit_items{{$item->pivot->id}}" class="btn btn-success">Edit</button><button data-toggle="modal" href="#delete_items{{$item->pivot->id}}" class="btn btn-danger">Delete</button></td>
                                                    </tr>
                                                    <div id="edit_items{{$item->pivot->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{route('purchase-requisition-item.update',$item->pivot->id)}}" method="POST">
                                                                    {{csrf_field()}}
                                                                    {{method_field('put')}}
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <h2 class="modal-title" style="color: rgb(75, 65, 65);">Add Products</h2>
                                                                    </div>
                                                                    <br>
                                                                    <div class="modal-body">
                                                                            @csrf
                                                                            <input type="hidden" name="requisition_item_id" value="{{$item->pivot->id}}">
                                                                            <div class="m-5 row">
                                                                                <div class="col-md-3">
                                                                                    <b>Image: </b><br>
                                                                                    {{$item->pivot->image}}<br>
                                                                                    <input class="form-control" type="file">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for="product">Item Types</label>
                                                                                    <select class="form-control type" name="type">
                                                                                        <option selected>--Select--</option>
                                                                                        @foreach ($types as $itemx)
                                                                                            @if ($item->pivot->item_type_id==$itemx->id)
                                                                                                <option value="{{$itemx->id}}" selected>{{$itemx->name}}</option>  
                                                                                            @else
                                                                                                <option value="{{$itemx->id}}">{{$itemx->name}}</option> 
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for="">Select Item</label>
                                                                                    <select class="form-control item" name="item" >
                                                                                        <option selected>Select</option>
                                                                                        @foreach ($requisition_item as $itemxx)
                                                                                            @if ($item->pivot->item_id==$itemxx->id)
                                                                                                <option value="{{$itemxx->id}}" selected>{{$itemxx->name}}</option>  
                                                                                            @else
                                                                                                <option value="{{$itemxx->id}}" selected>{{$itemxx->name}}</option>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for="">Unit</label>
                                                                                    <select class="form-control unit" name="unit">
                                                                                        <option selected>Select</option>
                                                                                        @foreach ($requisition_unit as $itemxxx)
                                                                                        @if ($item->pivot->item_unit_id==$itemxxx->id)
                                                                                            <option value="{{$itemxxx->id}}" selected>{{$itemxxx->name}}</option>  
                                                                                        @else
                                                                                            <option value="{{$itemxxx->id}}" selected>{{$itemxxx->name}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                        
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row" style="margin-top:2%">
                                                                                <label class="col-md-3 control-label">Demand Date :</span></label>
                                                                                <div class="col-md-6">
                                                                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                                        <input type="text" class="form-control" value="{{$item->pivot->demand_date}}" name="demand_date" placeholder="Demand Date" readonly >
                                                                                        <span class="input-group-btn">
                                                                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row" style="margin-top:2%">
                                                                                <label class="col-md-3 control-label">Quantity :</span></label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" value="{{$item->pivot->quantity}}" placeholder="quantity" name="quantity" class="form-control" id="quantity">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row" style="margin-top:2%">
                                                                                <label class="col-md-3 control-label">Specification :</span></label>
                                                                                <div class="col-md-6">
                                                                                    <input type="text" value="{{$item->pivot->specification}}" placeholder="specification" class="form-control" name="specification" id="quantity">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row" style="margin-top:2%">
                                                                                <label class="col-md-3 control-label">Remark :</span></label>
                                                                                <div class="col-md-6">
                                                                                    <textarea name="remark" id="" cols="30" rows="2.5">{{$item->pivot->remark}}</textarea>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="m-10 btn btn-success">Save</button>
                                                                        <button type="button" data-dismiss="modal" class="btn default cancel">Cancel</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="delete_items{{$item->pivot->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                {{-- <form action="{{route('purchase-requisition-item.update',$item->pivot->id)}}" method="POST"> --}}
                                                                    {{csrf_field()}}
                                                                    {{-- {{method_field('put')}} --}}
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <b><h3>Are You Sure?</h3></b>
                                                                    </div>
                                                                    <br>
                                                                    <div class="modal-body">
                                                                            @csrf
                                                                            <form action="{{route('purchase-requisition-item.destroy',[$item->pivot->id])}}" method="POST">
                                                                                @method('DELETE')
                                                                                @csrf
                                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                                            </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="text-align: center">
                                        <a class="btn btn-success"  data-toggle="modal" href="{{route('production-purchase-requisition.status_confirm',$data->id)}}"><i class="fa fa-edit"></i> Confirm</a>
                                        <a class="btn btn-info"  data-toggle="modal" href="#edit_procution_purchase_units{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn red" data-toggle="modal" href="#delete_procution_purchase_units{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr> 
                                    <div id="delete_procution_purchase_units{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer " >
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                    </div>
                                                    <div class="caption pull-right">
                                                        <form action="{{route('production-purchase-requisition.destroy',[$data->id])}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edit_procution_purchase_units{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update Procution Purchase Units</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('production-purchase-requisition.update', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Departments</label>
                                                            <div class="col-md-8">
                                                                {{-- <input type="text" class="form-control" value="{{$data->name}}" required name="name"> --}}
                                                                <select class="form-control" name="department" id="">
                                                                    @foreach ($dept as $item)
                                                                    @if ($data->department == $item->id)
                                                                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                                    @else    
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <br><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Remarks</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="{{$data->remark}}" required name="remark">
                                                            </div>
                                                            <br><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{-- {{ $requisition->links('vendor.pagination.custom') }} --}}
                        </div>
                    </div>
                </div>
                <div id="add_procution_purchase_units" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Procution Purchase Units</h4>
                            </div>
                            <br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('procution-purchase-units.store')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="procution_purchase_Units Name">
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
            $(".cancel").click(function(){
                location.reload(true);
            });
            $("#item").change(function(){
                item_id = $(this).find('option:selected').val();
                item_name = $(this).find('option:selected').text();
                item_unit_id = $("#unit").find('option:selected').val();
                item_unit_name = $("#unit").find('option:selected').text();
                // console.log(item_id);
            });
            var product_array = [];
            $(".type").change(function() {
             
                max = $(this).val();
                item_type_id = $(this).find('option:selected').val();
                item_type_name = $(this).find('option:selected').text();
                // console.log($(this).val());
                $.ajax({
                    type:"get",
                    url:"/admin/production-purchase-requisition/"+$(this).val(),
                    success:function(data){
                        console.log(data);
                        $(".item").html("");
                        $(".unit").html("");
                        let option="<option value=''>--Select--</option>";
                        $.each( data, function( key, data ) {
                            option+='<option data-name="'+data.name+'" value="'+data.id+'">'+data.name+'</option>';
                        });
                        let optionunit="<option value=''>--Select--</option>";
                        $.each( data, function( key, data ) {
                            optionunit='<option data-name="'+data.name+'" value="'+data.production_purchase_unit_id+'" selected>'+data.productionpurchaseunit.name+'</option>';
                        });
                        $('.item').append(option);
                        $(".unit").append(optionunit);
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
