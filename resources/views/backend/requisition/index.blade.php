@extends('backend.master')
@section('site-title')
    Requisition
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
            @if ($requisition_Delivered_count > 0 || $requisition_processed_count>0 || $requisition_recieved_solved>0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            <li>You have Processing  Request ({{ $requisition_processed_count }})</li>
                            <li>You have Deliverd  Request ({{ $requisition_Delivered_count }})</li>
                            <li>You have Solved Request ({{ $requisition_recieved_solved }})</li>
                            <b><a href="{{route('requisition.status')}}">See details</a></b>
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
                                                Requisition Code
                                            </th>
                                            <th>
                                                Warehouse Name
                                            </th>
                                            <th>
                                                Party Name
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
                                                Payment Info.
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
                                                <td> {{$data->party->party_name}}</td>
                                                <td>
                                                    @if ($data->confirmed==false)
                                                        {{"Not Confirmed"}}
                                                    @else
                                                        Confirmed
                                                    @endif
                                                </td>
                                                <td> {{$data->clearance_date}} </td>
                                                <td>
                                                    {{$data->remark}}
                                                </td>
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
                                                    {{-- {{$data->products}} --}}
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
                                                                    Quantity(PKT)
                                                                </th>
                                                                <th>
                                                                    Weight(kg)
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
                                                            @foreach ($data->products as $key2 => $item)
                                                                <tr>
                                                                    <td>{{++$key2}}</td>
                                                                    <td>{{$item->processing_name}}</td>
                                                                    @if($item->supplyitem->market_name)
                                                                        <td>
                                                                            {{$item->supplyitem->market_name}}
                                                                        </td>
                                                                    @else
                                                                        <td>{{$item->supplyitem->name}}</td>        
                                                                    @endif
                                                                    <td>
                                                                        {{$item->pack->name}}
                                                                    </td>
                                                                    <td>
                                                                        {{$item->pivot->quantity}}
                                                                        @php
                                                                        $total_qty += $item->pivot->quantity;
                                                                        $weight = $item->pack->weight*$item->pivot->quantity;
                                                                        $total_weight += $item->pack->weight*$item->pivot->quantity;
                                                                        @endphp
                                                                    </td>
                                                                    <td>
                                                                        {{$weight}}
                                                                    </td>
                                                                    {{-- <td>{{$item->pivot->packet}}</td> --}}
                                                                    <td>
                                                                        <form action="{{route('requisition-product.destroy',$item->pivot->id)}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button type="submit" class="btn red"><i class="fa fa-trash"></i> Delete</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <th colspan="4">Total Pack & Weight</th>
                                                                <th  colspan="5">
                                                                   <span>{{ $total_qty}}pack</span> <span> & {{ $total_weight}}KG</span>     
                                                                </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    @if($data->confirmed == false)
                                                        <a class="btn purple" data-toggle="modal"  href="#ConfirmRequisitionModal{{$data->id}}"><i class="fa fa-check-circle-o"></i> confirm</a>
                                                        <a class="btn btn-primary addProduct" data-toggle="modal" href="#addProductModal{{$data->id}}"><i class="fa fa-plus"></i>Add Product</a>
                                                    @endif
                                                    <a class="btn blue-chambray"  data-toggle="modal" href="{{route('requisition.edit',$data)}}"><i class="fa fa-edit"></i> Edit</a>
                                                    <a class="btn red" data-toggle="modal" href="#deleteModal"><i class="fa fa-trash"></i> Delete</a>
                                                    <a class="btn btn-success" href="{{route('requisition.view.print',$data->id)}}" target="_blank"><b><i class="fa fa-print" aria-hidden="true"></i></b></a>
                                                </td>
                                            </tr>
                                            <div id="ConfirmRequisitionModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                {{csrf_field()}}
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn purple" href="{{route('requisition.confirm',$data->id)}}"><i class="fa fa-check-circle-o"></i>Confirm</a>               
                                                            <a type="button" data-dismiss="modal" class="btn default">Cancel</a>
                                                            <a class="btn btn-success"  href="{{route('requisition.view.print',$data->id)}}" target="_blank"><b><i class="fa fa-print" aria-hidden="true"></i></b></a>
                                                          
                                        
                                                            {{-- <a type="submit" href="{{route('customer.delete', $data)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                <form action="{{route('requisition-product.store')}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="requisition_id" value="{{$data->id}}">
                                                                    <input type="hidden" class="modalParty" value="{{$data->party->id}}">
                                                                    <div class="col-md-3">
                                                                        <label for="category">Party</label><br>
                                                                            Party Code : <b>{{$data->party->party_code}}</b>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="category">Product</label>
                                                                        <select class="form-control select2me productxx" name="product_id"  placeholder="Product" required>                
                                                                        </select>
                                                                    </div>
                                                                    {{-- <div class="col-md-3">
                                                                        <label for="">Packet</label>
                                                                        <input name="packet" class="form-control" type="number" required placeholder="Packet">
                                                                    </div> --}}
                                                                    <div class="col-md-3">
                                                                        <label for="">Packet</label>
                                                                        <input name="quantity" step="0.01" class="form-control qtyx" type="number" required placeholder="Quantity">
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <label for="">Weight</label>
                                                                        <input class="form-control weightx" step="0.01" type="number" required placeholder="Quantity">
                                                                    </div>
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
                                                            {{-- <br>
                                                            <form action="{{route('requisition.destroy',[$data])}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                            </form> --}}
                                                            {{-- <a type="submit" href="{{route('customer.delete', $data)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                                <button class="btn red"><i class="fa fa-trash"></i>Delete</button>               
                                                            </form>
                                                            {{-- <a type="submit" href="{{route('customer.delete', $data)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> --}}
                                                        </div>
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
                                <label for="inputEmail1" class="col-md-2 control-label">Warehouse<span class="required">* </span></label>
                                <div class="col-md-8">
                                    <select class="form-control select2me" id="warehouse" name="warehouse_id" required>
                                        <option value="">--select warehouse--</option>
                                        @foreach($warehouse as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Party<span class="required">* </span></label>
                                <div class="col-md-8">
                                    <select class="form-control select2me party_select" id="party" name="party_id" required>
                                        <option value="">--select Party(code)--</option>
                                        @foreach($party as $data)
                                            <option value="{{$data->id}}">{{$data->party_name}}({{$data->party_code}})</option>
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
                                <label for="inputEmail1" class="col-md-2 control-label">Expedted Receive Date<span class="required">* </span></label>
                                <div class="col-md-8">
                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                        <input type="text" class="form-control" name="clearance_date" id="clearance_date" required >
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                <div class="col-md-8">
                                    <textarea name="remark" id="" cols="50" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="inputEmail1" class="col-md-6 control-label"><b>Add Products</b></label><hr>
                                    <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px" >
                                            <div class="col-md-12" id="planDescriptionContainer">
                                                <div class="input-group">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="category">Product<span class="required">* </span></label>
                                                        <select class="form-control select2me product1" name="product_id[1]" id="product" placeholder="Product" required>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="">Catagory</label>
                                                        <input class="form-control catagory1" id="catagory1" type="text" value="" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="">Packet<span class="required">* </span></label>
                                                        <input name="quantity[1]" class="form-control qty1" id="qty1" type="number" required placeholder="Quantity">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="">Weight<sub>(kg)</sub></label>
                                                        <input class="form-control weight1" id="weight1" type="text" value="" readonly>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-danger margin-top-20 delete_desc" type="button"><i class='fa fa-times'></i></button>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top:20px;margin-bottom:20px"><b>Pack :</b><span class="span1" id="span1"></span> <span style="margin-left:20px"><b>Party_Price :</b></span> <span class="pprice1" id="pprice1"></span><span style="margin-left:5%"><b>Total:</b></span><span><input type="number" class="singleTotal1" value="0" readonly placeholder="total"></span></div>
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
                            <div class="input-group">
                                <div class="col-md-3">
                                    <label for="category">Total Amount :</label>
                                    <input name="totalamount" type="text" class="form-control totalprice" readonly value="">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Payment Method</label>
                                    <select class="form-control bank" name="payment_method">
                                        <option value="">--Select Method--</option>
                                        <option value="cash">Cash</option>
                                        <option value="bank">Bank</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Paid Amount</label>
                                    <input name="paid_amount" class="form-control paid_amount" type="number"placeholder="paid amount">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Due</label>
                                    <input class="form-control due_amount"type="text" readonly value="">
                                </div>
                            </div><br>
                            <div class="input-group accountnumber">
                                <div class="col-md-6">
                                    <label for="">Account_Number:</label>
                                    <input name="acc_number" type="text" class="form-control" value="" placeholder="account number">
                                </div>
                            </div><br>
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
        var check =0;
        var max = 1;
        var min = 0;
        var tp = [];
        var w =0;
        var w2=0;
        var qtyxx =0;
        var grandT=0;
        var T_price = 0;
        var categories = @json($category, JSON_PRETTY_PRINT);
        var party_id = null;
        function appendPlanDescField(container) {
            var options ="";
            for (let index = 0; index < categories.length; index++) {
                options+='<option value="'+categories[index].id+'">'+categories[index].name+'</option>'
            }
            container.append(
                '<div class="input-group">'+
                    '<div class="col-md-3">'+
                        '<label for="category">Product</label>'+
                        '<select class="form-control select2me product'+max+'" name="product_id['+max+']"  placeholder="Product" required>'+
                        '</select>'
                    +'</div>'+
                    '<div class="col-md-3">'+
                        '<label for="">Catagory</label>'+
                        '<input class="form-control catagory'+max+'" id="catagory" type="text" value="" readonly>'+ 
                    '</div>'+   
                    '<div class="col-md-3">'+
                        '<label for="">Packet</label>'+
                        '<input name="quantity['+max+']" class="form-control qty'+max+'" type="number" required placeholder="Quantity">'+
                    '</div>'+
                    '<div class="col-md-2">'+
                        '<label for="">Weight<sub>(kg)</sub></label>'+
                        '<input class="form-control weight'+max+'" id="weight'+max+'" type="text" value="" readonly>'+
                    '</div>'+
                    '<div class="col-md-1">'+
                        '<span class="input-group-btn">'+
                            '<button class="btn btn-danger margin-top-20 delete_desc" type="button"><i class="fa fa-times"></i></button>'+
                        '</span>'+
                    '</div> <br>'+
                    '<div class="col-md-12" style="margin-top:20px;margin-bottom:20px"><b>Pack :</b><span class="span'+max+'" id="span'+max+'"></span> <span style="margin-left:20px"><b>Party_Price :</b></span><span class="pprice'+max+'" id="pprice'+max+'"></span> <span style="margin-left:5%"><b>Total:</b></span><span><input type="number" readonly class="singleTotal'+max+'" value="0" placeholder="total"></span></div><hr>'+
                '</div>'
            );
        }
        $(document).ready(function(){
            $(document).on('click',".addProduct",function(){
                // console.log(max);
                var pId = 0;
                pId= $(".modalParty").val();
                 console.log(pId);
                partyFixed(pId);
                });
                $(document).on('change',".productxx",function(){
                   
                    w2=$(this).find(':selected').attr('data-pack_weight');
                     console.log(w2);
                    weightCount2()
                });
                $(document).on('keyup change',".qtyx",function(){
                    // console.log(max);
                    qtyxx=$(this).val();
                    weightCount2();
                });
                function weightCount2() {
                var weight=0;
              
                weight = w2 * qtyxx;
                console.log(weight);
                $(".weightx").val(weight);
                }
            $(".singleTotal"+max).val(0);
            $("#btnAddDescription").on('click', function () {
                max++;
                min++;
                appendPlanDescField($("#planDescriptionContainer"));
                partySelect(party_id);
                productload();
            });
            function partySelect(id){
                $.ajax({
                    type:"POST",
                    url:"{{route('product.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $('.product'+max).html("");
                        $('.product'+max).append(data.output);
                    }
                });
            }
           function partyFixed(id){
                $.ajax({
                    type:"POST",
                    url:"{{route('product.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('.productxx').html("");
                        $('.productxx').append(data.output);
                    }
                });
            }
            function productload() {
                $(document).on('change',".party_select",function(){
                    party_id = $(this).val();
                    partySelect(party_id);
                });
                $(document).on('change',".product"+max,function(){
                    tp[max] =0;
                    w=$(this).find(':selected').attr('data-pack_weight');
                    $(".catagory"+max).val($(this).find(':selected').attr('data-category_name'));
                    $(".span"+max).html($(this).find(':selected').attr('data-pack_name'));  
                    $(".pprice"+max).html($(this).find(':selected').attr('data-product_price'));
                    weightCount();
                    tp[max] = $(this).find(':selected').attr('data-product_price');
                });
                $(document).on('keyup change',".qty"+max,function(){
                    // console.log(max);
                    weightCount();
                    totalPrice();
                });
            }
            productload();
            function weightCount() {
                var weight=0;
              
                weight = w * $(".qty"+max).val();
                $(".weight"+max).val(weight);
            }
            function totalPrice() {
                // console.log(tp);
                T_price = tp[max] * $(".qty"+max).val();
                if(max==1){
                    $(".singleTotal"+max).val(T_price);
                    $(".totalprice").val(T_price);
                }
                if(max>1){
                    $(".singleTotal"+max).val(T_price);
                    grandT=0;
                    for (let i = 1; i <= max; i++) {
                        grandT+= parseInt($(".singleTotal"+i).val());
                    }
                    $(".totalprice").val(grandT);
                }
                dueCount();
            }
            $(document).on('click', '.delete_desc', function () {
                    $(this).closest('.input-group').remove();
                    max=max-1;
                    totalPrice()
            });
            $('.accountnumber').hide();
            $(".bank").change(function() {
                if($('.bank').val()=='bank'){
                    $(".accountnumber").show();
                }
                if($('.bank').val()=='cash'){
                    $(".accountnumber").hide();
                }
            });

        });
        $(document).on('change keyup', '.paid_amount', function() {
            dueCount();
        });
        function dueCount() {
            $(".due_amount").val(($(".totalprice").val())-($(".paid_amount").val()));
        }
    </script>
@endsection