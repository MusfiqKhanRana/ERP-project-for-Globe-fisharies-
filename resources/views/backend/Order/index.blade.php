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
            <a class="btn btn-danger" href="{{route('order-history.index',"status=Pending")}}"><i class="fa fa-spinner"></i> Pending Orders ({{$pendingcount}})</a>
            {{-- <a class="btn btn-primary"  href="{{route('order-history.index',"status=Confirm")}}"><i class="fa fa-check-circle"></i> Confirm Order List ({{$confirmcount}})</a> --}}
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
                                    <th>Customer Name</th>
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
                                                        <th>Sl.</th>
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
                                                     @if ($item->pivot->status == "Received" || $item->pivot->status == Null)
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
                                                                            <a class="btn blue-chambray" data-toggle="modal" href="#editOrderProductModal{{$item->pivot->id}}" ><i class="fa fa-edit"></i> Edit</a>
                                                                        </form>
                                                                    </th>
                                                                @endif
                                                                @if ($data->status == "Delivered")
                                                                    <th>
                                                                        <a class="btn blue-chambray" data-toggle="modal" href="#returnSingleOrderModal{{$item->pivot->id}}" ><i class="fa fa-repeat" aria-hidden="true"></i>Return</a>
                                                                    </th>
                                                                @endif
                                                        </tr> 
                                                        @endif                                                                                                                    
                                                        <div id="returnSingleOrderModal{{$item->pivot->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <h4 class="modal-title" style="color: red"><b>Do you want to Cancel this delivery?</b></h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal" role="form" method="post" action="{{route('order.singleProduct.Return')}}">
                                                                            {{csrf_field()}}
                                                                            <input type="hidden" value="{{$item->pivot->id}}" name="productOrder_id">
                                                                            <div class="form-group">
                                                                                <textarea style="margin-left: 10%" name="single_cancel_massage" id="" cols="40" rows="5" placeholder="give a cancel Massage(Optional)"></textarea>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                                <button type="submit" class="btn red-flamingo"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="editOrderProductModal{{$item->pivot->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <h4 class="modal-title"> Update Ordered Product ({{$item->product_name}}) </h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal" role="form" method="post" action="{{route('order.product.updated', $item->pivot->id)}}">
                                                                            {{csrf_field()}}
                                                                            {{method_field('put')}}
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="inputEmail1" class="col-md-2 control-label">Quantity</label>
                                                                                    <div class="col-md-10">
                    
                                                                                        <input type="text" class="form-control" value="{{$item->pivot->quantity}}" required name="quantity">
                                                                                        <input type="hidden" value="{{$item->pivot->id}}">
                                                                                    </div>
                                                                                </div>
                                                                            </div><br><br><br>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    {{-- @php
                                                                                        $discount_amount = 0;
                                                                                        $discount_type = null;
                                                                                        if($item->pivot->discount_in_amount){
                                                                                            $discount_amount = $item->pivot->discount_in_amount;
                                                                                            $discount_type = "Amount";
                                                                                        }
                                                                                        elseif ($item->pivot->discount_in_percentage) {
                                                                                            $discount_amount =$item->pivot->discount_in_percentage;
                                                                                            $discount_type = "Percentage";
                                                                                        }
                                                                                    @endphp --}}
                                                                                    @if($item->pivot->discount_in_amount>0)
                                                                                    <label for="inputEmail1" class="col-md-2 control-label">Discount (Amount)</label>
                                                                                    @else 
                                                                                    <label for="inputEmail1" class="col-md-2 control-label">Discount (Percent)</label>
                                                                                    @endif
                                                                                    <div class="col-md-10">
                                                                                       @if ($item->pivot->discount_in_amount>0)
                                                                                       <input type="text" class="form-control" value="{{$item->pivot->discount_in_amount}}" required name="discount_in_amount"> 
                                                                                       @else 
                                                                                        <input type="text" class="form-control" value="{{$item->pivot->discount_in_percentage}}" required name="discount_in_percentage"> 
                                                                                       @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div><br><br><br>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="inputEmail1" class="col-md-2 control-label">Selling Price</label>
                                                                                    <div class="col-md-10">
                                                                                        <input type="text" class="form-control" value="{{$item->pivot->selling_price}}" required name="selling_price">
                                                                                        <input type="hidden" value="{{$item->pivot->id}}">
                                                                                    </div>
                                                                                </div>
                                                                            </div><br><br><br>
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
                                                    <tr>
                                                        <th colspan="5">Total Amount <small> (Inc. Discount)</small></th>
                                                        <th>
                                                            @php
                                                                $intotal_amount=$total_amount-$data->total_discount;
                                                            @endphp
                                                            {{$total_amount-$data->total_discount}}
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        @if($data->status=="Confirm" || $data->status == "Delivered")
                                            <td>
                                                <ul>
                                                    <li><p>Method: {{$data->payment_method}}</p></li>
                                                    <li><p>Paid Amount: {{$data->paid_amount}}</p></li>
                                                    <li><p>Due: {{$intotal_amount - $data->paid_amount}}</p></li>
                                                    {{-- @if ($data->payment_method != "Cash")
                                                        <li><p>Transaction Number: {{$data->trx_number}}</p></li>
                                                        <li><p>Transaction ID: {{$data->trx_id}}</p> </li>
                                                    @endif --}}
                                                </ul>
                                            </td>
                                        @endif
                                        <td style="text-align: center" class="align-middle" >
                                            
                                            <table>
                                                <tbody>
                                                    @if($data->status == 'Pending')
                                                    <tr>
                                                        <td>
                                                            <a class="btn btn-success" data-toggle="modal" href="#confirmdelevery{{$data->id}}"><i class="fa fa-cart-plus"></i> Confirm Delivery</a>  
                                                        </td>
                                                        <td>
                                                            <a class="btn blue-chambray" name ="customer_id" href="{{route('order.updated.edit',$data->id)}}" ><i class="fa fa-edit"></i> Edit</a>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary" data-toggle="modal" href="#addProductModal{{$data->id}}"><i class="fa fa-plus"></i>Add Product</a>
                                                        </td>
                                                    </tr>
                                                    <tr class="ml-auto mr-auto mt-auto" style="text-align: center">
                                                        {{-- <td>
                                                            <a class="btn btn-primary" data-toggle="modal" href="#addDiscount{{$data->id}}"><i class="fa fa-plus"></i>Add Discount</a>
                                                        </td> --}}
                                                        <td>
                                                            <form action="{{route('order.test.delete',$data->id)}}" method="POST">
                                                                @method('POST')
                                                                @csrf
                                                                <button type="submit" class="btn red"><i class="fa fa-trash"></i> Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    {{-- @if ($data->status == 'Confirm')
                                                        <a class="btn btn-primary" data-toggle="modal" href="#paymentInfo{{$data->id}}"><i class="fa fa-plus"></i> Payment Info</a>
                                                        @if ($data->payment_method)
                                                            <a class="btn btn-success" data-toggle="modal" href="#confirmdelevery{{$data->id}}"><i class="fa fa-cart-plus"></i> Confirm Delivery</a>  
                                                        @endif
                                                    @endif --}}
                                                    @if ($data->status == 'Delivered')
                                                        <a class="btn btn-success" data-toggle="modal" href="#deliveryConfirm{{$data->id}}"><i class="fa fa-check" aria-hidden="true"></i> Success</a>
                                                        <a class="btn btn-primary" data-toggle="modal" href="#deliveryReturn{{$data->id}}"><i class="fa fa-repeat" aria-hidden="true"></i> Return</a>
                                                        <a class="btn btn-danger" data-toggle="modal" href="#deliveryCancel{{$data->id}}"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</a>

                                                        {{-- @if ($data->payment_method)
                                                            <a class="btn btn-success" data-toggle="modal" href="#confirmdelevery{{$data->id}}"><i class="fa fa-cart-plus"></i> Confirm Delivery</a>  
                                                        @endif --}}
                                                    @endif
                                                </tbody>
                                            </table>
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
                                    <div id="deliveryConfirm{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title" style="color: red"><b>Do you want to confirm this delivery?</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('order.delivery.success')}}">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$data->id}}" name="order_id">
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Order #Code : </label>
                                                            <div class="col-md-8">
                                                                <b>111212</b>
                                                                {{-- <input type="text" class="form-control" value="{{$data->product_name}}" name="name" required> --}}
                                                            </div><br><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Due Amount</label>
                                                            <div class="col-md-8">
                                                                <input type="number" value="{{$intotal_amount - $data->paid_amount}}" readonly class="form-control">
                                                            </div><br><br>
                                                        </div>
                                                        <input type="hidden" name="totalpaid" value="{{$intotal_amount}}">
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label">Payment Method</label>
                                                            <div class="col-md-8">
                                                                <select name="payment_method" class="form-control payment_method">
                                                                    <option {{ ($data->payment_method) == 'Cash' ? 'selected' : '' }} value="Cash">Cash</option>
                                                                    <option {{ ($data->payment_method) == 'Bkash' ? 'selected' : '' }} value="Bkash">Bkash</option>
                                                                    <option {{ ($data->payment_method) == 'Nagad' ? 'selected' : '' }} value="Nagad">Nagad</option>
                                                                    <option {{ ($data->payment_method) == 'Rocket' ? 'selected' : '' }} value="Rocket">Rocket</option>
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
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="deliveryReturn{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title" style="color: red"><b>Do you want to Return this delivery?</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('order.delivery.return')}}">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$data->id}}" name="order_id">
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-4 control-label"><b> Order #Code :  <b>111212</b></b></label>
                                                        </div><br><br>
                                                        <div class="from-group">
                                                            <label for="col-md-4 control-label"><b>Remark : </b></label><br>
                                                            <textarea name="return_remark" id="" cols="40" rows="5" placeholder="give a return remark"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="deliveryCancel{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title" style="color: red"><b>Do you want to Cancel this delivery?</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('order.delivery.cancel')}}">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$data->id}}" name="order_id">
                                                        <div class="form-group">
                                                            <textarea style="margin-left: 10%" name="cancelMassage" id="" cols="40" rows="5" placeholder="give a cancel Massage(Optional)"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-check" aria-hidden="true"></i> Confirm</button>
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
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-check" aria-hidden="true"></i> Update</button>
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
                                                        <form action="{{route('single.Product.Order.Store')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="order_id" value="{{$data->id}}">
                                                            <input type="hidden" name="customer_id" value="{{$data->customer->id}}">
                                                            <input type="hidden" class="customer_typexx" value="{{$data->customer->customer_type}}">
                                                            <div class="row" style="padding:3%;">
                                                                <div class="col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h4><b>Product Info</b></h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="">Category</label>
                                                                                    <select name="category_id" class="form-control category">
                                                                                        <option selected>Select</option>
                                                                                        @foreach($category as $data)
                                                                                            <option value="{{$data->id}}" data-name="{{$data->name}}">{{$data->name}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="product">Product</label>
                                                                                        <select class="form-control add_product" name="product_id"  id="product" placeholder="Product" required>
                                                                                            {{-- <option selected>Select</option> --}}
                                                                                        </select>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="product">Pack Size</label>
                                                                                    <input type="text" class="form-control pack_size" readonly>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="product">Rate (TK)</label>
                                                                                    <input  type="text" class="form-control rate" id="rate" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h4><b>Quantity & Price</b></h4>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="">Quantity(pkt)</label>
                                                                                    <input name="quantity" type="number" id="quantity_pkt" class="form-control quantity_pkt">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="">Quantity In KG</label>
                                                                                    <input type="number" id="quantity_kg" class="form-control quantity_kg" readonly>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="discount"> Discount </label>
                                                                                    <span class="discount_in_percentage">
                                                                                        <input name="discount_in_percentage" type="text" class="form-control"  placeholder="discount in %" id="percentage_id"/>
                                                                                    </span>
                                                                                    <span class="discount_in_amount">
                                                                                        <input name="discount_in_amount" type="text" class="form-control" placeholder="discount in amount" id="amount_id"/>
                                                                                    </span>
                                                                                    <fieldset class="radio-inline question coupon_question2">
                                                                                        <input class="form-check-input want_in_amount" type="checkbox">Want in Amount ? 
                                                                                    </fieldset>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="price">Price</label>
                                                                                    <input name="selling_price" type="text" class="form-control pricex" id="price" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                    <div id="delete_order_Modal{{$data->id}}" class="modal fade " tabindex="-1" data-backdrop="static" data-keyboard="false">
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
            // console.log("this is good");
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
            $(".category").change(function() {
                var id = $(this).val();
                $.ajax({
                    type:"POST",
                    url:"{{route('order.addproduct.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        // console.log(data);
                        $('.add_product').html("");
                        $('.add_product').append(data.output);
                    }
                });
            });
            var category_id,category_name,discount_in_amount,discount_in_percentage,product_id,total_price,packet_quantity,product_name,product_online_rate,product_inhouse_rate,product_pack_name,product_pack_weight,product_pack_id,inhouse_rate,online_rate = null;
            $('.add_product').change(function(){
                product_id = $(this).val();
                product_name = $(this).find(':selected').attr('data-product_name');
                product_pack_id = $(this).find(':selected').attr('data-pack_id');
                product_pack_name = $(this).find(':selected').attr('data-pack_name');
                product_pack_weight = $(this).find(':selected').attr('data-pack_weight');
                product_online_rate = $(this).find(':selected').attr('data-online_selling_price');
                product_inhouse_rate = $(this).find(':selected').attr('data-inhouse_selling_price');
                $('.pack_size').val(product_pack_name);
                $(".rate").empty();
                var customer_type = $('.customer_typexx').val();
                var selling_price = null;
                if(customer_type=="inhouse"){
                    selling_price = product_inhouse_rate;
                }
                else if(customer_type == "online"){
                    selling_price = product_online_rate;
                }
                $(".rate").val(selling_price);
                // console.log(product_online_rate,product_inhouse_rate,product_id,product_name,product_pack_id,product_pack_name,product_pack_weight);
            })
            $('.quantity_pkt').keyup(function(){
                console.log("good");
                packet_quantity = $(this).val();
                $(".quantity_kg").val(packet_quantity*product_pack_weight);
                $(".pricex").val(packet_quantity * $(".rate").val());
                total_price = $(".pricex").val();
            })
            $(document).on('keyup','#percentage_id',function() {
                let main_price = total_price - (total_price*$(this).val())/100;
                $('#price').val(main_price);
                discount_in_percentage = $(this).val()
            });
            $(document).on('keyup','#amount_id',function() {
                let main_price = total_price - ($(this).val());
                discount_in_amount = $(this).val();
                $('#price').val(main_price);
            });
            $('.discount_in_amount').hide();
            $(".want_in_amount").click(function() {
                if($(this).is(":checked")) {
                    $(".discount_in_amount").show();
                    $(".discount_in_percentage").hide();
                    $('#percentage_id').val('');
                    discount_in_percentage = 0;
                } else {
                    $(".discount_in_amount").hide();
                    $(".discount_in_percentage").show();
                    discount_in_amount = 0;
                    $('#amount_id').val('');
                }
            });
            // $(document).on('change',".category",(function(){
            //     console.log("changed");
            //     var id = $(this).val();
            //     $.ajax({
            //         type:"POST",
            //         url:"{{route('order.addproduct.pass')}}",
            //         data:{
            //             'id' : id,
            //             '_token' : $('input[name=_token]').val()
            //         },
            //         success:function(data){
            //             $('.add_product').html("");
            //             $('.add_product').append(data.output);
            //         }
            //     });
            // });
        });
        // $("#addService").click(function(){
        //     max++;
        //     appendPlanDescField($("#orderBox"));
        //     $('.discount_in_amount').hide();
        //     $(".want_in_amount").click(function() {
        //         if($(this).is(":checked")) {
        //             $(".discount_in_amount").show();
        //             $(".discount_in_percentage").hide();
        //             $('#percentage_id').val('');
        //         } else {
        //             $(".discount_in_amount").hide();
        //             $(".discount_in_percentage").show();
        //             $('#amount_id').val('');
        //         }
        // });
        // $(document).on('change',product_id,function(){
        //     var id = $(this).val();
        //     $.ajax({
        //         type:"POST",
        //         url:"{{route('warehouse.product.price')}}",
        //         data:{
        //             'id' : id,
        //             '_token' : $('input[name=_token]').val()
        //         },
        //         success:function(data){
        //             var $results = $('.product_price');
        //             var $userDiv = $results.append('<div class="user-div'"></div>')
        //             $("<input type='radio' class='selling_price' name='selling_price' id='a' value='"+data.inhouse_selling_price+"'> <span>Inhouse:"+data.inhouse_selling_price+"</span>").appendTo( ".user-div" );
        //         $("<input type='radio' class='selling_price' name='selling_price' id='b' value='"+data.online_selling_price+"'> <span>Online:"+data.online_selling_price+"</span>").appendTo( ".user-div" );
        //         $("<input type='radio' class='selling_price' name='selling_price' id='c' value='"+data.retail_selling_price+"'> <span>Retail:"+data.retail_selling_price+"</span>").appendTo( ".user-div" );
        //             // $('.product_price'+ max).append(
        //             //     $('<input>').prop({
        //             //         type: 'radio',
        //             //         id: 'price',
        //             //         name: 'selling_price',
        //             //         value: data.inhouse_selling_price
        //             //     })
        //             // ).append(
        //             //     $('<label>').prop({
        //             //         for: 'Price'
        //             //     }).html('inhouse_selling_price'+ "(" + data.inhouse_selling_price +")" )
        //             // ).append(
        //             //     $('<br>')
        //             // );
        //         }
        //     });
        // });
        // $(".amount1").hide();
        // $(".amountxx").click(function() {
        //     if($(this).is(":checked")) {
        //         $(".amount1").show();
        //         $(".disper").hide();
        //         $('#coupon_1').val('');
        //     } else {
        //         $(".amount1").hide();
        //         $(".disper").show();
        //         $('#coupon_2').val('');
        //     }
        // });
    </script>
@endsection
