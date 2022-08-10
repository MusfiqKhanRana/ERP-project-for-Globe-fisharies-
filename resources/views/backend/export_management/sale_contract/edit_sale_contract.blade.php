@extends('backend.master')
@section('site-title')
    Sale Contract Edit
@endsection
@section('main-content')


    <div class="page-content-wrapper">

        <div class="page-content">
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Sale Contract Edit/View
            </h3>
            <!-- END PAGE TITLE-->

            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
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

            <div class="clearfix">
            </div>
            <div class="row ">
                <div class="col-md-6 col-sm-6">
                    
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Buyer Details
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('export.buyer.update', $sale_contracts->id)}}" class="form-horizontal" id="bank_details_form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                                <div id="alert_salary"></div>
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label">Buyer Code <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="buyer_code" value="{{$sale_contracts->export_buyer->buyer_code}}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Buyer Name <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="buyer_name" value="{{$sale_contracts->export_buyer->buyer_name}}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Buyer Address <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="buyer_address" value="{{$sale_contracts->export_buyer->buyer_address}}" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label">Contact Number <span class="required">* </span></label>
                                                <input type="text" class="form-control" value="{{$sale_contracts->export_buyer->buyer_contact_number}}" name="buyer_contact_number">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Email <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="buyer_email" value="{{$sale_contracts->export_buyer->buyer_email}}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" >Buyer Country <span class="required">* </span></label>
                                                <select class="form-control country" name="buyer_country" id="country">
                                                    <option value="">{{$sale_contracts->export_buyer->buyer_country}}"</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Consignee Update
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.salary.update', $sale_contracts->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_salary"></div>
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label">Name <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="consignee_name" value="{{$sale_contracts->export_buyer->consignee_name}} " required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Address <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="consignee_address" value=" {{$sale_contracts->export_buyer->consignee_address}}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Contact Number <span class="required">* </span></label>
                                                <input type="number" class="form-control" name="consignee_contact_number" value="{{$sale_contracts->export_buyer->consignee_contact_number}}"  required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label" >Email <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="consignee_email" value="{{$sale_contracts->export_buyer->consignee_email}}"  required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" >Country <span class="required">* </span></label>
                                                <select class="form-control country" name="consignee_country" id="country">
                                                    <option value="">{{$sale_contracts->export_buyer->consignee_country}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Shipment Details Update
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.salary.update', $sale_contracts->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_salary"></div>
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label">Name <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="consignee_name" value="{{$sale_contracts->export_buyer->consignee_name}} " required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Address <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="consignee_address" value=" {{$sale_contracts->export_buyer->consignee_address}}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label">Contact Number <span class="required">* </span></label>
                                                <input type="number" class="form-control" name="consignee_contact_number" value="{{$sale_contracts->export_buyer->consignee_contact_number}}"  required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="control-label" >Email <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="consignee_email" value="{{$sale_contracts->export_buyer->consignee_email}}"  required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="control-label" >Country <span class="required">* </span></label>
                                                <select class="form-control country" name="consignee_country" id="country">
                                                    <option value="">{{$sale_contracts->export_buyer->consignee_country}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Notify Party Update
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.overtime.update', $sale_contracts->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="control-label">Name <span class="required">* </span></label>
                                            <input type="text" class="form-control" name="notify_party_name" value="{{$sale_contracts->export_buyer->notify_party_name}}"  required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label">Address <span class="required">* </span></label>
                                            <input type="text" class="form-control" name="notify_party_address" value="{{$sale_contracts->export_buyer->notify_party_address}}" >
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label">Contact Number <span class="required">* </span></label>
                                            <input type="number" class="form-control" name="notify_party_contact" value="{{$sale_contracts->export_buyer->notify_party_contact}}" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="control-label">Email <span class="required">* </span></label>
                                            <input type="text" class="form-control" name="notify_party_email" value="{{$sale_contracts->export_buyer->notify_party_email}}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label js-data-example-ajax">Country <span class="required">* </span></label>
                                            {{-- <input type="text" class="form-control" name="" placeholder="Country" required> --}}
                                            <select class="form-control country" name="notify_party_country" id="country">
                                                <option value="">{{$sale_contracts->export_buyer->notify_party_country}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="portlet box blue-chambray">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-calendar"></i>Payment Details Update
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form method="POST" action="{{route('employee.overtime.update', $sale_contracts->id)}}" class="form-horizontal" id="bank_details_form">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Name <span class="required">* </span></label>
                                        <input type="text" class="form-control" name="notify_party_name" value="{{$sale_contracts->export_buyer->notify_party_name}}"  required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Address <span class="required">* </span></label>
                                        <input type="text" class="form-control" name="notify_party_address" value="{{$sale_contracts->export_buyer->notify_party_address}}" >
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Contact Number <span class="required">* </span></label>
                                        <input type="number" class="form-control" name="notify_party_contact" value="{{$sale_contracts->export_buyer->notify_party_contact}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Email <span class="required">* </span></label>
                                        <input type="text" class="form-control" name="notify_party_email" value="{{$sale_contracts->export_buyer->notify_party_email}}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label js-data-example-ajax">Country <span class="required">* </span></label>
                                        <select class="form-control country" name="notify_party_country" id="country">
                                            <option value="">{{$sale_contracts->export_buyer->notify_party_country}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="actions col-md-12">
                                    <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                        <i class="fa fa-save" ></i> Update </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.overtime_type').hide();
            $('.overtime').click(function()
            {
            if ($(this).is(':checked')) {
                $('.overtime_type').show();
                }else {
                $(".overtime_type").hide();
            }
            });
            $('.fixed_amount').hide();
            $('#bonus_amount').click(function()
            {
            if ($(this).is(':checked')) {
                $('.fixed_amount').show();
                }
            });
            $('#regular').click(function()
            {
            if ($(this).is(':checked')) {
                $('.fixed_amount').hide();
                }
            });
            $(document).on('change','#department', function () {
                var id = $(this).val();

                $.ajax({
                    type:"POST",
                    url:"{{route('designation.pass')}}",
                    data:{
                        'id' : id,
                        '_token': $('input[name=_token]').val()
                    },
                    success:function (data) {
                        $('#designation').html("");
                        $('#designation').append(data)
                    }
                })
            })
            $(document).on('keyup','#percentage_id',function() {
                let main_price = total_price - (total_price*$(this).val())/100;
                $('#price').val(main_price);
                in_percentage = $(this).val()
            });
            $(document).on('keyup','#amount_id',function() {
                let main_price = total_price - ($(this).val());
                in_amount = $(this).val();
                $('#price').val(main_price);
            });
            $('.in_amount').hide();
            $(".want_in_amount").click(function() {
                if($(this).is(":checked")) {
                    $(".in_amount").show();
                    $(".in_percentage").hide();
                    $('#percentage_id').val('');
                    in_percentage = 0;
                } else {
                    $(".in_amount").hide();
                    $(".in_percentage").show();
                    in_amount = 0;
                    $('#amount_id').val('');
                }
            });
        })
    </script>
@endsection


