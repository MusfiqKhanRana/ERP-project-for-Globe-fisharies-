@extends('backend.master')
@section('site-title')
    Customer
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
            <h3 class="page-title bold">Requisition
                <small> Requisition-Report</small>
                {{-- <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add Requisition
                    <i class="fa fa-plus"></i>
                </a> --}}
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
                                <i class="fa fa-briefcase"></i>Requisition Reports
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
                                                Requisition Code
                                            </th>
                                            <th>
                                                Warehouse Name
                                            </th>
                                            <th>
                                                Party Code
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Clearence Date
                                            </th>
                                            <th>
                                                Products
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requisition as $key=> $data)
                                            <tr id="row1">
                                                <td>{{$data->requisition_id}}</td>
                                                <td> {{$data->warehouse->name}}</td>
                                                <td> {{$data->party->party_code}}</td>
                                                <td>
                                                    {{$data->status}}                       
                                                </td>
                                                <td> {{$data->clearance_date}} </td>
                                                <td> 
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Sl.
                                                                </th>
                                                                <th>
                                                                    Category
                                                                </th>
                                                                <th>
                                                                    Product
                                                                </th>
                                                                <th>
                                                                    Pack Size
                                                                </th>
                                                                <th>
                                                                    Requested Quantity
                                                                </th>
                                                                <th>
                                                                    Provided Quantity
                                                                </th>
                                                                <th>
                                                                    Packet
                                                                </th>
                                                                {{-- <th>
                                                                    Action
                                                                </th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($data->products as $key2 => $item)
                                                                <tr>
                                                                    <td>{{++$key2}}</td>
                                                                    <td>{{$item->category->name}}</td>
                                                                    <td>{{$item->product_name}}</td>
                                                                    <td>{{$item->pack->name}}</td>
                                                                    <td>{{$item->pivot->quantity}}</td>
                                                                    <td>{{$item->pivot->final_quantity}}</td>
                                                                    <td>{{$item->pivot->packet}}</td>
                                                                    {{-- <td>
                                                                        <form action="{{route('requisition-product.destroy',$item->pivot->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="submit" class="btn red"><i class="fa fa-trash"></i> Delete</button>
                                                                        </form>
                                                                    </td> --}}
                                                                </tr>
                                                                <div id="addProductModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" value="" id="delete_id">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <form action="{{route('requisition.receive.updatesubmitted')}}" method="POST">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Add Products</h2>
                                                                                </div>
                                                                                <br>
                                                                                <div class="modal-body">
                                                                                    @csrf
                                                                                    <input type="hidden" name="requisition_id" value="{{$data->id}}">
                                                                                    @foreach ($data->products as $keyupdated => $value)
                                                                                        <div class="m-5 row">
                                                                                            <input type="hidden" name="requisition_product_id[{{$keyupdated}}]" value="{{$value->pivot->id}}">
                                                                                            <div class="col-md-4">
                                                                                                <b>Product Name: {{$value->product_name}}</b>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <b>Provided Quantity: {{$value->pivot->quantity}}</b>
                                                                                            </div>
                                                                                            <div class="col-md-4">
                                                                                                <input name="final_quantity[{{$keyupdated}}]" value="{{$value->pivot->final_quantity}}" class="form-control" type="number" required placeholder="Available Quantity">
                                                                                            </div>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <br>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" class="m-10 btn btn-success">Save</button>
                                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    @if($data->status == "Deliverd")
                                                        <form action="{{route('requisition.delivery.confirm')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="products" value="{{$data->products}}">
                                                            <input type="hidden" name="warehouse_id" value="{{$data->warehouse_id}}">
                                                            <input type="hidden" name="requisition_id" value="{{$data->id}}">
                                                            <button type="submit" class="btn purple" href=""><i class="fa fa-check-circle-o"></i> Confirm Delivery</button>
                                                        </form>
                                                        <br>
                                                        <a class="btn red" data-toggle="modal" href="#addProductModal{{$data->id}}"><i class="fa fa-undo"></i> Return </a>
                                                    @endif
                                                    {{-- <a class="btn blue-chambray"  data-toggle="modal" href="{{route('requisition.edit',$data)}}"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a> --}}
                                                </td>
                                            </tr>
                                            <div id="addProductModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                                <form action="{{route('requisition.delivery.return')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="requisition_id" value="{{$data->id}}">
                                                                    <div class="col-md-12">
                                                                        <label for="category"><b>Return Note</b> </label><br>
                                                                        <textarea rows="7" cols="50" name="return_note"></textarea>
                                                                    </div>
                                                                    {{-- <div class="col-md-3">
                                                                    </div> --}}
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                            <form action="{{route('requisition.destroy',[$data])}}" method="POST">
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
                                <div class="row">
                                    {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                                    {{ $requisition->links('vendor.pagination.custom') }}
                                </div>
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
                            <h4 class="modal-title">Add New Requisition</h4>
                        </div>
                        <form class="form-horizontal" role="form" method="post" action="{{route('requisition.store')}}">
                            {{csrf_field()}}
                            <br>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Warehouse</label>
                                <div class="col-md-8">
                                    <select class="form-control select2me" id="warehouse" name="warehouse_id" required>
                                        <option value="">--select--</option>
                                        @foreach($warehouse as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Party</label>
                                <div class="col-md-8">
                                    <select class="form-control select2me" id="party" name="party_id" required>
                                        <option value="">--select--</option>
                                        @foreach($party as $data)
                                            <option value="{{$data->id}}">{{$data->party_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Expedted Receive Date</label>
                                <div class="col-md-8">
                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                        <input type="text" class="form-control" name="clearance_date"  readonly >
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="inputEmail1" class="col-md-6 control-label">Add Products</label>
                                    <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px" >
                                            <div class="col-md-12" id="planDescriptionContainer">
                                                <div class="input-group">
                                                    <div class="col-md-3">
                                                        <label for="category">Category</label>
                                                        <select class="form-control select2me category1" id="department" name="category_id[1]" required>
                                                            <option value="">--select--</option>
                                                            @foreach($category as $data)
                                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="category">Product</label>
                                                        <select class="form-control select2me product1" name="product_id[1]" id="product" placeholder="Product" required>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Packet</label>
                                                        <input name="packet[1]" class="form-control" type="number" required placeholder="Packet">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Quantity (Kg)</label>
                                                        <input name="quantity[1]" class="form-control" type="number" required placeholder="Quantity">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-danger margin-top-20 delete_desc" type="button"><i class='fa fa-times'></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-12 text-right margin-top-10">
                                                <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Product</button>
                                            </div>
                                        </div>
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        var max = 1;
        var categories = @json($category, JSON_PRETTY_PRINT);
        function appendPlanDescField(container) {
            var options ="";
            for (let index = 0; index < categories.length; index++) {
                options+='<option value="'+categories[index].id+'">'+categories[index].name+'</option>'
            }
            container.append(
                '<div class="input-group">'+
                    '<div class="col-md-3">'+
                        '<label for="category">Category</label>'+
                        '<select class="form-control select2me category'+max+'"  name="category_id['+max+']" required>'+
                            '<option value="">--select--</option>'+options+
                        '</select>'
                    +'</div>'+
                    '<div class="col-md-3">'+
                        '<label for="category">Product</label>'+
                        '<select class="form-control select2me product'+max+'" name="product_id['+max+']"  placeholder="Product" required>'+
                        '</select>'
                    +'</div>'+
                    '<div class="col-md-3">'
                        +'<label for="">Packet</label>'+
                        '<input name="packet['+max+']" class="form-control" type="number" required placeholder="Packet">'+
                    '</div>'+
                    '<div class="col-md-3">'+
                        '<label for="">Quantity</label>'+
                        '<input name="quantity['+max+']" class="form-control" type="number" required placeholder="Quantity">'+
                    '</div>'+
                    '<div class="col-md-3">'+
                        '<span class="input-group-btn">'+
                            '<button class="btn btn-danger margin-top-20 delete_desc" type="button"><i class="fa fa-times"></i></button>'+
                        '</span>'+
                    '</div>'+
                '</div>'

            );
        }
        $(document).ready(function(){
            $("#btnAddDescription").on('click', function () {
                max++;
                appendPlanDescField($("#planDescriptionContainer"));
                $(document).on('change',".category"+max,function(){
                    console.log(max);
                    var id = $(this).val();
                    $.ajax({
                        type:"POST",
                        url:"{{route('product.pass')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val()
                        },
                        success:function(data){
                            $('.product'+max).html("");
                            $('.product'+max).append(data.output);
                        }
                    });
                });
            });
            $(document).on('change',".category"+max,function(){
                console.log(max);
                var id = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{route('product.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('.product'+max).html("");
                        $('.product'+max).append(data.output);
                    }
                });
            });
            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').remove();
            });
        });
    </script>
@endsection