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
                <small> Requisition-managment </small>

                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add Requisition
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
                                            <i class="fa fa-briefcase"></i>Requisition List
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
                                                    ID
                                                </th>
                                                <th>
                                                    Category
                                                </th>
                                                <th>
                                                    Product
                                                </th>
                                                <th>
                                                    Quantity
                                                </th>
                                                <th>
                                                    Pac Size
                                                </th>
                                                <th>
                                                    Clearence Date
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
                                                <td> {{$data->category->name}}</td>
                                                <td> {{$data->product->product_name}}</td>
                                                <td> {{$data->quantity}}</td>
                                                <td> {{$data->pac_size}}</td>
                                                <td>{{$data->clearance_date}}</td>
                                                <td>
                                                    @if($data->confirmed == false)
                                                        <a class="btn purple" href="{{route('requisition.confirm',$data->id)}}"><i class="fa fa-check-circle-o"></i> confirm</a>
                                                    @endif
                                                    <a class="btn blue-chambray"  data-toggle="modal" href="{{route('requisition.edit',$data)}}"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>

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
                                                            <form action="{{route('requisition.destroy',[$data])}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                            </form>
                                                            {{-- <a type="submit" href="{{route('customer.delete', $data)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> --}}
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

                            {{-- <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Product Name</label>
                                <div class="col-md-8">
                                    <select class="form-control select2me" name="product_id" id="product" required>

                                    </select>
                                    {{csrf_field()}}
                                </div>
                            </div> --}}

                            {{-- <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Product Quantity</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" placeholder="Quantity" required name="quantity">
                                </div>
                            </div> --}}

                            {{-- <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Pac Size</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" placeholder="Pac Size" required name="pac_size">
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Expedted Date</label>
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
                                                        <label for="">Quantity</label>
                                                        <input name="quantity[1]" class="form-control" type="text" required placeholder="Quantity">
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
                                                <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Food Item</button>
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
                    '<div class="col-md-3">'+
                        '<label for="">Quantity</label>'+
                        '<input name="quantity['+max+']" class="form-control" type="text" required placeholder="Quantity">'+
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