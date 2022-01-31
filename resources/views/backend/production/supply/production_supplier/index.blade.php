@extends('backend.master')
@section('site-title')
    Supplier
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
                        // swal("{{Session::get('msg')}}","", "success");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: "{{Session::get('msg')}}",
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
                </script>
            @endif
            <h3 class="page-title bold form-inline">Supplier
                <small> Management </small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add New Supplier
                    <i class="fa fa-plus"></i>
                </a>
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
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Items List
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            sl
                                        </th>
                                        <th>
                                            Supplier Name
                                        </th>
                                        <th>
                                            Supplier Mobile
                                        </th>
                                        <th>
                                            Supplier Email
                                        </th>
                                        <th>
                                            Supplier Address
                                        </th>
                                        <th>
                                            Supplier Items
                                        </th>
                                        <th style="text-align: center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $key=>$supplier)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$supplier->name}}</td>
                                            <td>{{$supplier->phone}}</td>
                                            <td>{{$supplier->address}}</td>
                                            <td>{{$supplier->email}}</td>
                                            <td>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Sl.
                                                            </th>
                                                            <th>
                                                                Name
                                                            </th>
                                                            <th>
                                                                details
                                                            </th>
                                                            {{-- <th>
                                                                Supplier ID
                                                            </th> --}}
                                                            <th>
                                                                Grade name
                                                            </th>
                                                            <th>
                                                                Rate
                                                            </th>
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                         $total_weight=0;
                                                         $total_qty=0;   
                                                         $weight = 0;
                                                        @endphp
                                                        @foreach ($supplier->supplier_items as $key2 => $item)
                                                            <tr>
                                                                <td>{{++$key2}}</td>
                                                                <td>
                                                                    {{$item->name}}
                                                                </td>
                                                                <td>
                                                                    {{$item->details}}
                                                                </td>
                                                                {{-- <td>{{$item->pivot->production_supplier_id}}</td> --}}
                                                                <td>{{$item->grade->name}}</td>
                                                                <td>
                                                                    {{$item->pivot->rate}}
                                                                </td>
                                                                <td>
                                                                    {{-- <form action="{{route('production-Supplier-item-destroy',$item->pivot->id)}}" method="get"> --}}
                                                                        {{-- @method('DELETE')
                                                                        @csrf --}}
                                                                        <a href="{{route('production-Supplier-item.destroy',$item->pivot->id)}}" class="btn red"><i class="fa fa-trash"></i> Delete</a>
                                                                    {{-- </form> --}}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="text-align: center">
                                                <a class="btn btn-info"  data-toggle="modal" href="#editareaModal{{$supplier->id}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn red" data-toggle="modal" href="#deleteareaModal{{$supplier->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                @if ($supplier->activated == 0)
                                                    <a href="{{route('production-supplier.activate',$supplier->id)}}" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>Activate</a>
                                                @endif
                                                @if ($supplier->activated == 1)
                                                    <a href="{{route('production-supplier.deactivate',$supplier->id)}}" class="btn btn-warning"><i class="fa fa-times" aria-hidden="true"></i>Deactivate</a>
                                                @endif
                                            </td>
                                        </tr>
                                        <div id="deleteareaModal{{$supplier->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                            <form action="{{route('production-supplier.destroy',[$supplier->id])}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editareaModal{{$supplier->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Update Area</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" role="form" method="post" action="{{route('supply-item.update', $supplier)}}">
                                                            {{csrf_field()}}
                                                            {{method_field('put')}}
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Item Name</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$supplier->name}}" required name="name">
                                                                </div>
                                                                <br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$supplier->details}}" required name="details">
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
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New Customer</h4>
                        </div>
                        <br>
                        <form class="form-horizontal" role="form" method="post" action="{{route('production-supplier.store')}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Supplier Name" name="supplier_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Contract Number</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Contract Number" name="supplier_mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Address</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Address" name="supplier_address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Email</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Email" name="supplier_email">
                                </div>
                            </div>
                            <input type="hidden" value="" id="provided_item" name="provided_item">
                            <div class="form-group" style="padding:2%">
                                <label for="inputEmail1" class="col-md-2 control-label">Add Item</label>  
                                <div class="row">
                                    <div class="col-md-3">
                                        <select class="form-control" name="supply_item_id" id="select_item">
                                            <option value="">--Select Item--</option>
                                            @foreach ($items as $item)
                                                <option value="{{$item->id}}" data-grade_name="{{$item->grade->name}}" data-grade_id="{{$item->grade->id}}" data-item_name="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" id="select_grade" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="Rate" id="suppliers_rate" name="rate">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-success" id="add_items">add</button>
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Provided Item</label>
                                <div class="col-md-8">
                                    <table  class="table table-striped table-bordered table-hover" id="mytable">
                                        <tr>
                                            <th>Item</th>
                                            <th>Grade</th>
                                            <th>Rate</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>

                                        </tr>
                                    </table>
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
    @endsection
    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function () {
           var item_name,item_id,grade_name,grade_id,rate = null;
           var items_array = [];
           function nullmaking(){
                $("#select_item").val(null);
                $("#select_grade").val(null);
                $("#suppliers_rate").val(null);
            }
            $("#select_item").change(function(){
                item_id = $(this).val();
                item_name = $(this).find(':selected').data("item_name");
                grade_name = $(this).find(':selected').data("grade_name");
                $("#select_grade").val(grade_name);
                console.log(grade_name);
            });
            // $("#select_grade").change(function(){
            //     grade_id = $(this).val();
            //     grade_name = $(this).find(':selected').data("grade_name");
            //     console.log(grade_id);
            // });
           $("#add_items").click(function(){
                items_array.push({"item_id":item_id,"item_name":item_name,"grade_name":grade_name,"rate":$("#suppliers_rate").val(),"status":"stay"});
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $.each( items_array, function( key, item ) {
                    if (item.status == "stay") {
                        if(items_array.length-1 == key){
                            $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+item.item_name+"</td><td>"+item.grade_name+"</td><td>"+item.rate+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $(".delete_item").click(function(){
                    items_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#provided_item").val('');
                    $("#provided_item").val(JSON.stringify(items_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
           });
            
        });
    </script>

@endsection