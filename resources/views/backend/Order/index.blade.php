@extends('backend.master')
@section('site-title')
    Order Management
@endsection
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <h3 class="page-title bold">Order List</h3>
            <a class="btn btn-danger" href="{{route('order-history.index',"status=Pending")}}"><i class="fa fa-spinner"></i> Pending Order ({{$pendingcount}})</a>
            <a class="btn btn-primary"  href="{{route('order-history.index',"status=Confirm")}}"><i class="fa fa-check-circle"></i> Confirm Order List ({{$confirmcount}})</a>
            <a class="btn btn-success" href="{{route('order-history.index',"status=Delivered")}}"><i class="fa fa-cart-plus"></i> Delivery List ({{$delivery_count}})</a>
                <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box grey-salt">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-clipboard "></i>History List
                            </div>
                        </div>
                        <div  class="portlet-body" style="overflow: auto">
                            <table class="table table-striped table-bordered table-hover" id="notices">
                                <thead>
                                <tr>
                                    {{-- <th> Date </th> --}}
                                    <th> Sl. </th>
                                    <th>Name</th>
                                    <th> Customer Type </th> 
                                    <th> Status </th>
                                    <th> Remark</th>
                                    <th> Delivery Charge</th>
                                    <th> Discount <small>(Order wise)</small></th>
                                    <th style="text-align: center"> Product</th>
                                    @if (request()->query('status')=="Confirm" || request()->query('status')=="Delivered")
                                        <th >Payment info </th>
                                    @endif
                                    <th style="text-align: center"> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $total_amount_modal = 0;
                                @endphp
                                @foreach($order as $key=>$data)
                                    @php
                                        $color = '';
                                        $textcolor = '';
                                        if ($data->status == 'Confirm') {
                                            $color = '';
                                            $textcolor = "";
                                        }
                                    @endphp
                                    <tr style="background-color: {{$color}}; color:{{$textcolor}}">
                                        {{-- <td>{{$data->created_at}}</td> --}}
                                        <td>{{++$key}}</td>
                                        <td>{{$data->customer->full_name}}</td>
                                        <td>{{$data->customer->customer_type}}</td>
                                        <td>{{$data->status }}</td>
                                        <td>{{$data->remark}}</td>
                                        <td>
                                            @if ($data->delivery_charge)
                                                {{$data->delivery_charge}}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->total_discount)
                                                {{$data->total_discount}}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>s.l</th>
                                                        <th>Category</th>
                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>Discount <small>(Product Wise)</small></th>
                                                        <th>Selling Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $total_amount = 0;
                                                        $intotal_amount = 0;
                                                    @endphp
                                                    @foreach($data->products as $key2=> $item)
                                                        <tr>
                                                            <th>{{++$key2}}</th>
                                                            <th>{{$item->category->name}}</th>
                                                            <th>{{$item->product_name}}</th>
                                                            <th>{{$item->pivot->quantity}}</th>
                                                            <th>
                                                                @php
                                                                    if($item->pivot->discount_in_amount){
                                                                        echo $item->pivot->discount_in_amount." TK";
                                                                    }
                                                                    elseif ($item->pivot->discount_in_percentage) {
                                                                        echo $item->pivot->discount_in_percentage." Percent";
                                                                    }
                                                                @endphp
                                                            </th>
                                                            <th>
                                                                {{$item->pivot->selling_price}}
                                                                @php
                                                                    $total_amount += $item->pivot->selling_price;
                                                                @endphp
                                                            </th>
                                                            @if ($data->status == "Pending")
                                                                <th>
                                                                    <form action="{{route('order.destroy',$item->pivot->id)}}" method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit" class="btn red"><i class="fa fa-trash"></i> Delete</button>
                                                                    </form>
                                                                </th>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <th colspan="5">total Amount <small> (Inc. Delivary Charge and Discount)</small></th>
                                                        <th>
                                                            @php
                                                                $intotal_amount=$total_amount+$data->delivery_charge-$data->total_discount;
                                                            @endphp
                                                            {{$total_amount+$data->delivery_charge-$data->total_discount}}
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        @if($data->status=="Confirm")
                                            <td>
                                                <ul>
                                                    <li><p>Method: {{$data->payment_method}}</p></li>
                                                    <li><p>Paid Amount: {{$data->paid_amount}}</p></li>
                                                    <li><p>Due: {{$intotal_amount - $data->paid_amount}}</p></li>
                                                    @if ($data->payment_method != "Cash")
                                                        <li><p>Transaction Number: {{$data->trx_number}}</p></li>
                                                        <li><p>Transaction ID: {{$data->trx_id}}</p> </li>
                                                    @endif
                                                </ul>
                                            </td>
                                        @endif
                                        <td style="text-align: center">
                                            @if($data->status == 'Pending')
                                                <a class="btn purple" href="{{route('order.confirm',$data->id)}}"><i class="fa fa-check-circle-o"></i> confirm</a>
                                                <a class="btn blue-chambray" href="{{route('order.edit',$data->id)}}" ><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn btn-primary" data-toggle="modal" href="#addProductModal{{$data->id}}"><i class="fa fa-plus"></i>Add Product</a>
                                                <a class="btn btn-primary" data-toggle="modal" href="#addDiscount{{$data->id}}"><i class="fa fa-plus"></i>Add Discount</a>
                                                <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                            @endif
                                            @if ($data->status == 'Confirm')
                                                <a class="btn btn-primary" data-toggle="modal" href="#paymentInfo{{$data->id}}"><i class="fa fa-plus"></i> Payment Info</a>
                                                @if ($data->payment_method)
                                                    <a class="btn btn-success" data-toggle="modal" href="#confirmdelevery{{$data->id}}"><i class="fa fa-cart-plus"></i> Confirm Delivery</a>  
                                                @endif
                                            @endif
                                            @if ($data->status == 'Delivered')
                                                <a class="btn btn-primary" data-toggle="modal" href="#paymentInfo{{$data->id}}"><i class="fa fa-plus"></i>Success</a>
                                                <a class="btn btn-primary" data-toggle="modal" href="#paymentInfo{{$data->id}}"><i class="fa fa-plus"></i>Return</a>
                                                <a class="btn btn-primary" data-toggle="modal" href="#paymentInfo{{$data->id}}"><i class="fa fa-plus"></i>Cancel</a>
                                                {{-- @if ($data->payment_method)
                                                    <a class="btn btn-success" data-toggle="modal" href="#confirmdelevery{{$data->id}}"><i class="fa fa-cart-plus"></i> Confirm Delivery</a>  
                                                @endif --}}
                                            @endif
                                        </td>
                                    </tr>
                                    {{-- <div id="editOrderyModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update Party</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('order.update', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}

                                                        <div class="form-body">
                                                            <div class="form-section">
                                                                <label class="col-md-2 control-label pull-left bold">Customer Select: </label>
                                                                <div class="col-md-10">
                                                                    <select class="select2Ajax form-control" name="customer_id" value = "{{$data->customer_id }}" required  id="customer_id"></select>
                                                                </div>
                                                            </div><br><br>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$data->remark}}" required name="remark">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Delivery Charge</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$data->delivery_charge}}" required name="delivery_charge">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div id="paymentInfo{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Payment Info</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('order.payment')}}">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$data->id}}" name="order_id">
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Total Amount</label>
                                                            <div class="col-md-8">
                                                                {{$total_amount+$data->delivery_charge}} <b>TK.</b> <small>(Inc. Delivery Charge)</small>
                                                                {{-- <input type="text" class="form-control" value="{{$data->product_name}}" name="name" required> --}}
                                                            </div><br><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Payment Method</label>
                                                            <div class="col-md-8">
                                                                <select name="payment_method" class="form-control payment_method">
                                                                    <option value="Cash">Cash</option>
                                                                    <option value="Bkash">Bkash</option>
                                                                    <option value="Nagad">Nagad</option>
                                                                    <option value="Rocket">Rocket</option>
                                                                </select>
                                                                {{-- <input type="text" class="form-control" value="{{$data->product_name}}" name="name" required> --}}
                                                            </div><br><br>
                                                        </div>
                                                        <div class="transaction_number">
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-4 control-label">Transaction Number *</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="trx_number">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-4 control-label">Transaction Id *</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" name="trx_id">
                                                                </div><br><br>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Paid Amount</label>
                                                            <div class="col-md-8">
                                                                <input type="number" class="form-control" name="paid_amount">
                                                            </div><br><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="addDiscount{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Confirm Delivery</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('order.discount')}}">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Total Amount</label>
                                                            <div class="col-md-8">
                                                                <span>{{$total_amount}}</span>
                                                                {{-- <input type="text" class="form-control" value="{{$data->product_name}}" name="name" required> --}}
                                                            </div><br><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Discount(In Amount)</label>
                                                            <div class="col-md-8">
                                                                <input type="hidden" value="{{$data->id}}" name="order_id">
                                                                <input type="text" class="form-control" value="{{$data->total_discount}}" name="total_discount" required>
                                                            </div><br><br>
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
                                    <div id="confirmdelevery{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Confirm Delivery</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('order.delivery.confirm')}}">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <input type="hidden" value="{{$data->id}}" name="order_id">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Total Amount</label>
                                                            <div class="col-md-8">
                                                                {{$total_amount+$data->delivery_charge-$data->total_discount}} <b>TK.</b> <small>(Inc. Delivery Charge and Discount)</small>
                                                                {{-- <input type="text" class="form-control" value="{{$data->product_name}}" name="name" required> --}}
                                                            </div><br><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Total Paid</label>
                                                            <div class="col-md-8">
                                                                {{$data->paid_amount}} <b>TK.</b> <small>({{$data->payment_method}})</small>
                                                                {{-- <input type="text" class="form-control" value="{{$data->product_name}}" name="name" required> --}}
                                                            </div><br><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Total Due</label>
                                                            <div class="col-md-8">
                                                                {{$intotal_amount - $data->paid_amount}} <b>TK.</b> <small>(Inc. Delivery Charge and Discount)</small>
                                                                {{-- <input type="text" class="form-control" value="{{$data->product_name}}" name="name" required> --}}
                                                            </div><br><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</button>
                                                        </div>
                                                    </form>
            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="addProductModal{{$data->id}}" class="modal fade " tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                        <form action="{{route('order.store')}}" method="POST">
                                                            @csrf
                                                            
                                                            <div class="col-md-3">
                                                                <label for="product">Warehouse</label>
                                                                <select class="form-control" name="warehouse_id" id="warehouse" required>
                                                                    <option selected>Select</option>
                                                                    @foreach($warehouse as $data)
                                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                                    @endforeach
                                                                    {{csrf_field()}}
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label >Product</label>
                                                                <select class="form-control  product_id" name="product_id" placeholder="Product" required>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="">Quantity</label>
                                                                <input name="quantity" class="form-control" type="number" required placeholder="Quantity">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="col-md-2 control-label">Discount: </label>
                                                                <span class="disper">
                                                                    <input type="text" class="form-control"  name="discount_in_percentage" placeholder="discount in %" id="coupon_1"/>
                                                                </span>
                                                                <span class="amount1">
                                                                    <input type="text" class="form-control" name="discount_in_amount" placeholder="discount in amount" id="coupon_2"/>
                                                                </span>
                                                                <fieldset class="radio-inline question coupon_question2">
                                                                    <input class="form-check-input amountxx" type="checkbox">Want in Amount ? 
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="">Price</label>
                                                                <input type="text" class="form-control " placeholder="Total"  readonly name="price" >
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
                                                    <form action="{{route('order-history.destroy',[$data->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div id="deleteproductModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                    <form action="{{route('order.destroy',[$item->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div id="confirmProductModal" class="modal fade " tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Confirm Order List</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                    <div class="m-5 row">
                                                        {{-- <form action="{{route('order.store')}}" method="POST">
                                                            @csrf
                                                            
                                                            <div class="col-md-3">
                                                                <label for="product">Warehouse</label>
                                                                <select class="form-control" name="warehouse_id" id="warehouse" required>
                                                                    <option selected>Select</option>
                                                                    @foreach($warehouse as $data)
                                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                                    @endforeach
                                                                    {{csrf_field()}}
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label >Product</label>
                                                                <select class="form-control  product_id" name="product_id" placeholder="Product" required>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="">Quantity</label>
                                                                <input name="quantity" class="form-control" type="number" required placeholder="Quantity">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="col-md-2 control-label">Discount: </label>
                                                                <span class="disper">
                                                                    <input type="text" class="form-control"  name="discount_in_percentage" placeholder="discount in %" id="coupon_1"/>
                                                                </span>
                                                                <span class="amount1">
                                                                    <input type="text" class="form-control" name="discount_in_amount" placeholder="discount in amount" id="coupon_2"/>
                                                                </span>
                                                                <fieldset class="radio-inline question coupon_question2">
                                                                    <input class="form-check-input amountxx" type="checkbox">Want in Amount ? 
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="">Price</label>
                                                                <input type="text" class="form-control " placeholder="Total"  readonly name="price" >
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label><span>&nbsp;</span></label><br>
                                                                <button class="m-10 btn btn-success">Save</button>
                                                            </div>
                                                        </form> --}}
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
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".transaction_number").hide();
            $('.payment_method').change(function(){
                var input = $(this).val();
                if (input=="Bkash" || input=="Nagad" || input=="Rocket"){
                    $(".transaction_number").show();
                }else{
                    $(".transaction_number").hide();
                }
            })
            $("#warehouse").change(function(){
                var id = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{route('order.product.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('.product_id').empty();
                        $('.product_id').append($('<option>', { 
                            value: '',
                            text : "--select--"
                        }));
                        $.each(data, function (i, item) {
                            var name_quantity = item.product_name;
                            $('.product_id').append($('<option>', { 
                                value: item.id,
                                text : name_quantity
                            }));
                        });
                    }
                });
            });
        });
    </script>
    <script>
         $("#addService").click(function(){
                max++;
                appendPlanDescField($("#orderBox"));
                $('.discount_in_amount').hide();
                $(".want_in_amount").click(function() {
                    if($(this).is(":checked")) {
                        $(".discount_in_amount").show();
                        $(".discount_in_percentage").hide();
                        $('#percentage_id').val('');
                    } else {
                        $(".discount_in_amount").hide();
                        $(".discount_in_percentage").show();
                        $('#amount_id').val('');
                    }
                });
    </script>
    <script>
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
                    var $results = $('.product_price');
                    var $userDiv = $results.append('<div class="user-div'"></div>')
                    $("<input type='radio' class='selling_price' name='selling_price' id='a' value='"+data.inhouse_selling_price+"'> <span>Inhouse:"+data.inhouse_selling_price+"</span>").appendTo( ".user-div" );
                $("<input type='radio' class='selling_price' name='selling_price' id='b' value='"+data.online_selling_price+"'> <span>Online:"+data.online_selling_price+"</span>").appendTo( ".user-div" );
                $("<input type='radio' class='selling_price' name='selling_price' id='c' value='"+data.retail_selling_price+"'> <span>Retail:"+data.retail_selling_price+"</span>").appendTo( ".user-div" );
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
    </script>
    <script>
    $(".amount1").hide();
        $(".amountxx").click(function() {
            if($(this).is(":checked")) {
                $(".amount1").show();
                $(".disper").hide();
                $('#coupon_1').val('');
            } else {
                $(".amount1").hide();
                $(".disper").show();
                $('#coupon_2').val('');
            }
        });
    </script>
@endsection
