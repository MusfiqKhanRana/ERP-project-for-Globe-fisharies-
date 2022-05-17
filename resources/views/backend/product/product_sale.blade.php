@extends('backend.master')
@section('site-title')
    Sale Point
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
            @if(Session::has('delmsg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('delmsg')}}","", "warning");
                    });

                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Add To Order
                <small> Office-managment </small>
            </h3>
            <hr>

            <div class="portlet box yellow-gold">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>Add New Sale
                    </div>
                    <div class="tools">
                    </div>
                </div>

                <div class="portlet-body form">

                    <form method="POST" action="{{route('sale.product')}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                        {{csrf_field()}}
                        <input type="hidden" name="invoice_id" value="{{time().rand()}}">
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-2 control-label">Warehouse Select:</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="warehouse_id" required>
                                        <option value="">--select--</option>
                                        @foreach($warehouse as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Customer Select:</label>
                                <fieldset class="question">
                                    <label for="col-md-2 control-label coupon_question">New Customer?</label>
                                    <input class="coupon_question11" type="checkbox" name="coupon_question" value="" />
                                    <span class="item-text">Yes</span>
                                </fieldset>

                                <div class="col-md-6">
                                    <select class="form-control answer22" name="customer_id">
                                        <option value="">--select--</option>
                                        @foreach($customer as $data)
                                         <option value="{{$data->id}}">{{$data->full_name}}</option>
                                        @endforeach
                                    </select>
                                    <fieldset class="answer11">
                                        <div class="form-group">
                                            <label for="inputEmail1" class="col-md-2 control-label">Full Name</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" placeholder="Customer Name" name="full_name">
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label for="inputEmail1" class="col-md-2 control-label">Phone</label>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control" placeholder="Customer Phone" name="phone">
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label for="inputEmail1" class="col-md-2 control-label">Email</label>
                                            <div class="col-md-8">
                                                <input type="email" class="form-control" placeholder="Customer Email" name="email">
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label for="inputEmail1" class="col-md-2 control-label">Address</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" placeholder="Customer Address" name="address">
                                            </div>
                                        </div>
            
                                        <div class="form-group">
                                            <label for="inputEmail1" class="col-md-7 control-label">Suggestions or topics you would like to be included:</label>
                                            <div class="col-md-12">
                                                <div class="col-md-12 ">
                                                    <input type="text" class="form-control" placeholder="Your Text (Not Required)" name="include_word">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Category :</label>
                                <div class="col-md-6">
                                    <input type="hidden" value="{{$product->category->id}}">
                                     <p><b>{{$product->category->name}}</b></p>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-md-2 control-label">Product :</label>
                                   
                                <div class="col-md-6">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <p><b>{{$product->supplyitem->name}}</b></p>
                                </div>
                            </div>
                            <label class="col-md-2 control-label">Selling price: </label>
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" value="{{$product->online_selling_price}}" name="selling_price" checked>Online Selling Price({{$product->online_selling_price}})
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="{{$product->inhouse_selling_price}}" name="selling_price">Inhouse Selling Price ({{$product->inhouse_selling_price}})
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="{{$product->retail_selling_price}}" name="selling_price">Retail Selling Price ({{$product->retail_selling_price}})
                                </label>
                            </div><br>
                            <label class="col-md-2 control-label">Discount : </label>
                            <div class="form-group">
                                    <span class="rxyz1">
                                        <input type="text" name="discount_in_percentage" placeholder="discount in %" id="coupon_field_1"/>
                                    </span>
                                    <span class="rxyz2">
                                        <input type="text" name="discount_in_amount" placeholder="discount in amount" id="coupon_field_2"/>
                                    </span>
                                    <fieldset class="radio-inline question coupon_question2">
                                        <input class="form-check-input xyz2" id="amount" type="checkbox">Want in Amount ? 
                                    </fieldset>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-2 control-label">Quantity: </label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="quantity" >
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="demo-loading-btn btn yellow-gold col-md-12"><i class="fa fa-check"></i> Submit Sale</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('change','#department',function(){
                var id = $(this).val();
//                alert(id)
                $.ajax({
                    type:"POST",
                    url:"{{route('product.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
//                        console.log(data)
                        $('#product').html("");
                        $('#product').append(data.output);
//
                    }
                });
            });

            $(document).on('change','#product',function(){
                var id = $(this).val();
//                alert(id)
                $.ajax({
                    type:"POST",
                    url:"{{route('product.element.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
//                        $('#product').html("");
//                        $('#product').append(data.output);
                        $('#pranto').text(data.selling_price);
                        $('#product_price').val(data.selling_price);
                        $('#roy').text(data.unit);
//                        console.log(data.selling_price);
                    }
                });
            });
        });
    $(".answer11").hide();
    $(".coupon_question11").click(function() {
        if($(this).is(":checked")) {
            $(".answer11").show();
            $(".answer22").hide();
        } else {
            $(".answer11").hide();
            $(".answer22").show();
        }
    });
    $(".rxyz2").hide();
        $(".xyz2").click(function() {
            if($(this).is(":checked")) {
                $(".rxyz2").show();
                $(".rxyz1").hide();
                $('#coupon_field_1').val('');
            } else {
                $(".rxyz2").hide();
                $(".rxyz1").show();
                $('#coupon_field_2').val('');
            }
        });
    </script>
@endsection