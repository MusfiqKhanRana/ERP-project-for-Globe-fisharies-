

@extends('backend.master')
@section('site-title')
    Edit Order
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">View/Edit
                <small> Order-Edit </small>
            </h3>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                        <form action="{{route('order.updated',$order->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="form-body">
                                <div class="form-section">
                                    <label class="col-md-2 control-label pull-left bold">Customer Select: </label>
                                    <div class="col-md-10">
                                        <select name="customer_id">
                                            @foreach($customer as $data)
                                                <option value="{{$data->id}}" {{ ( $data->id == $order->id) ? 'selected' : 'id' }}>{{$data->full_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><br><br>
                            </div>
                            <div class="form-body">
                                <div class="form-section">
                                    <label class="col-md-2 control-label pull-left bold">Delivery Charge </label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="delivery_charge" value="{{$order->delivery_charge}}"  required  id="delivery_charge">
                                    </div>
                                </div><br><br>
                            </div>
                                    {{-- <label class="col-md-2 control-label pull-left bold"> Payment Method </label>
                                    <div class="col-md-10">
                                        <select name="payment_method">
                                            @foreach($order as $data)
                                                <option value="{{$data->payment_method}}" {{ ( $data->payment_method == $order->payment_method) ? 'selected' : '' }}>{{$data->payment_method}}</option>
                                            @endforeach
                                        </select>
                                        {{-- <select class="select2Ajax form-control" name="customer_id" value = "" required  id="customer_id"></select> }}
                                    </div> --}}
                            <div class="form-body">
                                <div class="form-section">
                                    <label class="col-md-2 control-label pull-left bold"> Payment Method </label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="payment_method" value="{{$order->payment_method}}"  required  id="payment_method">
                                    </div>
                                </div><br><br>
                            </div>
                            <div class="form-body">
                                <div class="form-section">
                                    <label class="col-md-2 control-label pull-left bold">Remark</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="remark" required  id="remark"> {{$order->remark}}</textarea>
                                    </div>
                                </div><br><br>
                            </div><br><br>
                            <div class="form-group clearfix">
                                <div class="col-md-12">
                                    <button class="btn btn-info col-md-12" type="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $('.select2Ajax').select2({
            placeholder: 'Select an item',
            ajax: {
                url: "{{route('select2.autocomplete.ajax')}}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.full_name + " ("+item.customer_type+")",
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
</script>
<script>
    $("#customer_id").change(function() {
                $.ajax({
                    type:"POST",
                    url:"{{route('customer.info')}}",
                    data:{
                        'id' : $(this).val(),
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $("#customer_info").empty();
                        var $results = $('#customer_info');
                        var $userDiv = $results.append('<div class="user-div"></div>')
                        $( '<div class="row">'+
                            '<div class="col-md-3 text-center"><span> <b>cusotmer Name: </b>'+data.full_name+'</span></div>'
                            +'<div class="col-md-3 text-center"><span> <b>cusotmer Address: </b>'+data.address+'</span></div>'
                            +'<div class="col-md-3 text-center"><span> <b>cusotmer Phone: </b>'+data.phone+'</span></div>'
                            +'<div class="col-md-3 text-center"><span> <b>cusotmer Type: </b><span id="customer_type">'+data.customer_type+'</span></span></div>'
                        +'</div>').appendTo( ".user-div" );
                    }
                });
            });
</script>
