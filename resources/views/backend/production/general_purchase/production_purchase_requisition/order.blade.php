@extends('backend.master')
@section('site-title')
    Purchase List
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
                                <th>Invoice No.</th>
                                <th>Items</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($requisition as $key=> $data)
                                <tr id="row1">
                                    <td class="text-align: center;"> {{$data->requisition_code}}</td>
                                    <td class="text-align: center;">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Sl.
                                                    </th>
                                                    <th>
                                                        Supplier Info
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
                                                        Confirm Rate
                                                    </th>
                                                    <th>
                                                        Remark
                                                    </th>
                                                    {{-- <th>
                                                        Action
                                                    </th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->production_requisition_item as $key2 => $item)
                                                    <tr>
                                                        <td>{{++$key2}}</td>
                                                        <td class="text-align: center;"> 
                                                            <li>Supplier Name : {{$item->supplier->name}}</li> 
                                                            <li>Supplier Phone : {{$item->supplier->phone}}</li>
                                                            <li>Supplier Address : {{$item->supplier->address}}</li>
                                                            <li>Supplier Email : {{$item->supplier->email}}</li>
                                                        </td>
                                                        <td><ul><li>{{$item->image}}</li><li>{{$item->item_name}}</li><li>{{$item->item_type_name}}</li><li>{{$item->item_unit_name}}</li></ul></td>
                                                        <td>{{$item->demand_date}}</td>
                                                        <td>{{$item->quantity}}</td>
                                                        <td>{{$item->specification}}</td>
                                                        <td>{{$item->confirm_rate}}</td>
                                                        <td>{{$item->remark}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="text-align: center">
                                        @if ($data->status=='Confirm')
                                            <a class="btn btn-info" data-toggle="modal"  href="#make_purchase{{$data->id}}"><i class="fa fa-edit"></i>Make Purchase</a>
                                            {{-- <a class="btn btn-warning"  data-toggle="modal" href="#edit_procution_purchase_units{{$data->id}}"><i class="fa fa-edit"></i> View/Print</a> --}}
                                            <a class="btn purple"  href="{{route('production-purchase-requisition.print',$data->id)}}"><i class="fa fa-print"></i> View & Print</a>   
                                        @endif
                                        @if ($data->status=='Purchased')
                                        <a class="btn purple"  href="{{route('production-purchase-requisition.print',$data->id)}}"><i class="fa fa-print"></i> View & Print</a>   
                                        @endif
                                        {{-- <a class="btn red" data-toggle="modal" href="#delete_procution_purchase_units{{$data->id}}"><i class="fa fa-trash"></i> Delete</a> --}}
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
                                                            <label for="inputEmail1" class="col-md-2 control-label">Procution Purchase Units Name</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="{{$data->name}}" required name="name">
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
                                    <div id="make_purchase{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Confirm Requisition</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('production-purchase-requisition.status_purchased')}}">
                                                        {{csrf_field()}}
                                                        {{-- {{method_field('put')}} --}}
                                                        <div class="form-group">
                                                            <input type="hidden" value="{{$data->id}}" name="requisition_id">
                                                            <p>Department: {{$data->departments->name}}</p>
                                                            <p>Requested_by : {{$data->users->name}}</p>
                                                            <hr>
                                                            <div class="col-md-12" style="overflow: scroll;">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <b>Item Details</b>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <b>Demand Date</b>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <b>Quantity</b>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <b>supplier Info</b>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                @foreach ($data->production_requisition_item as $key2 => $item)
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <ul><li>{{$item->image}}</li><li>{{$item->item_name}}</li><li>{{$item->item_type_name}}</li><li>{{$item->item_unit_name}}</li></ul>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            {{$item->demand_date}}
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            {{$item->quantity}}
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <li>Supplier Name : {{$item->supplier->name}}</li> 
                                                                            <li>Supplier Phone : {{$item->supplier->phone}}</li>
                                                                            <li>Supplier Address : {{$item->supplier->address}}</li>
                                                                            <li>Supplier Email : {{$item->supplier->email}}</li>
                                                                            <input type="hidden" class="form-control" value="{{$item->id}}" name="id[]">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach           
                                                            </div>
                                                            <br><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> Confirm</button>
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
