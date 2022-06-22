@extends('backend.master')
@section('site-title')
    Customer
@endsection
@section('main-content')
<style>
    /* ::placeholder {
  color: rgb(82, 78, 78);
  opacity: 1; /* Firefox */
} */

</style>
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
                                                Expected Date
                                            </th>
                                            <th>
                                                Remark
                                            </th>
                                            <th>
                                                paymentInfo
                                            </th>
                                            <th>
                                                Products
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                            <th style="background-color:#ED5D5D ; color:white;">
                                                Problem Massage 
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
                                                <td> {{$data->remark}} </td>
                                                <td>
                                                    <li>
                                                        Total_amount : {{$data->totalamount}}
                                                    </li>
                                                    <li>
                                                        Paid_amount : {{$data->paid_amount}}
                                                    </li>
                                                    <li>
                                                        @php
                                                         $duee_amount=0;    
                                                         $duee_amount = $data->totalamount-$data->paid_amount;
                                                        @endphp
                                                          Due_amount : {{$duee_amount }}
                                                    </li>
                                                    <li>
                                                        Payment_method : {{$data->payment_method}}
                                                    </li>
                                                    @if ($data->payment_method == 'bank')
                                                        <li>
                                                            ACC_number : {{$data->acc_number}}
                                                        </li>
                                                    @endif
                                                </td>
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
                                                                    Recieved Quantity
                                                                </th>
                                                                {{-- <th>
                                                                    Packet
                                                                </th> --}}
                                                                {{-- <th>
                                                                    Action
                                                                </th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $total_weight=0;
                                                                $total_qty=0;   
                                                                $weight1 =0;
                                                                $weight2 =0;
                                                                $weight3 =0; 
                                                            @endphp
                                                            @foreach ($data->products as $key2 => $item)
                                                            @if($item->pivot->received_quantity != $item->pivot->final_quantity)
                                                                <tr>
                                                                    <td>{{++$key2}}</td>
                                                                    <td>{{$item->processing_name}}</td>
                                                                    <td>{{$item->supplyitem->name}}</td>
                                                                    <td>{{$item->pack->name}}</td>
                                                                    <td>
                                                                        @php
                                                                            $weight1 = $item->pack->weight*$item->pivot->quantity; 
                                                                        @endphp
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th>{{$item->pivot->quantity}}pkt</th>
                                                                                <td>{{ $weight1}}kg</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $weight2 = $item->pack->weight*$item->pivot->final_quantity; 
                                                                        @endphp
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th>{{$item->pivot->final_quantity}}pkt</th>
                                                                                <td>{{ $weight2}}kg</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $total_qty += $item->pivot->received_quantity;
                                                                            $total_weight += $item->pack->weight*$item->pivot->received_quantity;
                                                                            $weight3 = $item->pack->weight*$item->pivot->received_quantity; 
                                                                        @endphp
                                                                        <table class="table table-hover">
                                                                            <tbody>
                                                                            <tr>
                                                                                <th>{{$item->pivot->received_quantity}}pkt</th>
                                                                                <td>{{ $weight3}}kg</td>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    {{-- <td>{{$item->pivot->packet}}</td> --}}
                                                                    {{-- <td>
                                                                        <form action="{{route('requisition-product.destroy',$item->pivot->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="submit" class="btn red"><i class="fa fa-trash"></i> Delete</button>
                                                                        </form>
                                                                    </td> --}}
                                                                </tr>
                                                        
                                                            @endif
                                                                <div id="basic{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" value="" id="delete_id">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <form action="{{route('requisition.receive.resolved')}}" method="POST">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                                    <h4 class="modal-title" style="color: rgb(75, 65, 65);"><b>Solve Imperfect Requisition</b></h4>
                                                                                </div>
                                                                                <br>
                                                                                <div class="modal-body">
                                                                                    @csrf
                                                                                    <input type="hidden" name="requisition_id" value="{{$data->id}}">
                                                                                    @foreach ($data->products as $keyupdated => $value)
                                                                                    @if($value->pivot->received_quantity != $value->pivot->final_quantity)
                                                                                        <div class="m-5 row">
                                                                                            <input type="hidden" name="requisition_product_id[{{$keyupdated}}]" value="{{$value->pivot->id}}">
                                                                                            <div class="col-md-5">
                                                                                                <b>Product Name: {{$value->supplyitem->name}}</b>
                                                                                            </div>
                                                                                            <div class="col-md-5">
                                                                                                <b>Provided Quantity: <span id="span">{{$value->pivot->final_quantity}}</span></b>
                                                                                            </div>
                                                                                        </div><br>
                                                                                        <div class="m-5 row">
                                                                                            <div class="col-md-5">
                                                                                                <b>Recieved Quantity: <span id="span">{{$value->pivot->received_quantity}}</span></b>
                                                                                            </div>
                                                                                            <div class="col-md-5">
                                                                                                <input name="resolve_quantity[{{$keyupdated}}]"  class="form-control" type="number" required placeholder="Resolve Quantity">
                                                                                            </div>
                                                                                            <br>
                                                                                            
                                                                                        </div>
                                                                                        <br>
                                                                                        <hr>
                                                                                        @endif
                                                                                    @endforeach
                                                                                    <div class="text-center">
                                                                                        <textarea name="resolve_massage" rows="10" cols="40" style="color: black"  placeholder="Give Resolve Note"></textarea>
                                                                                    </div>
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
                                                            <tr>
                                                                <th colspan="4">total Pack & Weight</th>
                                                                <th  colspan="6" style="text-align: right">
                                                                   <span>{{ $total_qty}}pack</span> <span> & {{ $total_weight}}KG</span>     
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary"  data-toggle="modal" href="#basic{{$data->id}}">Solve</button><br>
                                                    <a class="btn btn-success" href="{{route('requisition.view.print',$data->id)}}" target="_blank"><b><i class="fa fa-print" aria-hidden="true"></i></b></a>
                                                </td>
                                                <td style="background-color:#ED5D5D ; color:white;">
                                                        {{$data->imperfect_massage}}
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
                                            <div id="confirmProductModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                {{csrf_field()}}
                                                <input type="hidden" value="" id="delete_id">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{route('requisition.delivery.confirm')}}" method="POST">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Confirm Recieved Product</h2>
                                                            </div>
                                                            <br>
                                                            <div class="modal-body">
                                                                    @csrf
                                                                    <input type="hidden" name="requisition_id" value="{{$data->id}}">
                                                                    @foreach ($data->products as $keyupdated => $value)
                                                                        <div class="m-5 row">
                                                                            {{-- <input type="hidden" name="requisition_product_id[{{$keyupdated}}]" value="{{$value->pivot->id}}"> --}}
                                                                            <div class="col-md-4">
                                                                                <b>Product Name: {{$value->supplyitem->name}}</b>
                                                                            </div>
                                                                            <div id="prev_qty" class="col-md-4">
                                                                                <b>Provided Quantity: {{$value->pivot->quantity}}</b>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <input id="received_quantity" name="received_quantity[{{$keyupdated}}]" value="{{$value->pivot->received_quantity}}" class="form-control" type="number" required placeholder="Recieved Quantity">
                                                                            </div>
                                                        
                                                                            <div class="col-md-4 ml-5" id="textarea">
                                                                            <br>
                                                                            <hr>
                                                                                <textarea name="imperfect_massage" id="imperfect_massage"  placeholder="Describe delevery imperfection..." cols="30" rows="10"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="product_id[]" value="{{$value->product_id}}">
                                                                        <input type="hidden" name="id[]" value="{{$value->pivot->id}}">
                                                                        <input type="hidden" name="buying_price[]" value="{{$value->buying_price}}">
                                                                        <input type="hidden" name="warehouse_id[]" value="{{$data->warehouse_id}}">
                                                                        {{-- <input type="hidden" name="requisition_id[]" value="{{$data->id}}"> --}}
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
                                            <div id="sss" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title"><b>Solve Imperfect Requisition</b></h4>
                                                        </div>
                                                        <form class="form-horizontal" role="form" method="post" action="{{route('requisition.store')}}">
                                                            {{csrf_field()}}
                                                            <br>
                                                            <div class="form-group">
                                                                    <div class="modal-body">
                                                                        @csrf
                                                                        <input type="hidden" name="requisition_id" value="{{$data->id}}">
                                                                        @foreach ($data->products as $keyupdated => $value)
                                                                            <div class="m-5 row">
                                                                                <input type="hidden" name="requisition_product_id[{{$keyupdated}}]" value="{{$value->pivot->id}}">
                                                                                <div class="col-md-4">
                                                                                    <b>Product Name: {{$value->supplyitem->name}}</b>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <b>Provided Quantity: <span class="provided_quantity">{{$value->pivot->final_quantity}}</span></b>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <input name="received_quantity[{{$keyupdated}}]" value="{{$value->pivot->received_quantity}}" data-provided="{{$value->pivot->final_quantity}}" class="form-control received_quantity" type="number" required placeholder="Available Quantity">
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                        <br>
                                                                        <div class="imperfect_note">
                                                                            <Span> <b style="color: red">There is Imperfect !!</b> </Span><br><textarea name="imperfect_massage" rows="10" cols="40"  placeholder="Give Imparfect Note"></textarea>
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