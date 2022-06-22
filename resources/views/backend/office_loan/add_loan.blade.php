@extends('backend.master')
@section('site-title')
    Add Avance/General Loan
@endsection
@section('style')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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

            <div class="row">
                <div class="col-md-12">

                    <div id="load">

                    </div>
                    <div class="portlet box yellow">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-plus"></i>Add Advance/General Loan
                            </div>
                            <div class="tools">
                            </div>
                        </div>

                        <div class="portlet-body form">

                            <!------------------------ BEGIN FORM---------------------->
                            <form method="POST" enctype="multipart/form-data" action="{{route('office.loan.store')}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Select Person: <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-6">
                                           <select class="form-control selectpicker" id="employee_id" data-live-search="true" name="employee_id" >
                                            <option value="">--Select--</option>
                                               @foreach($employee as $data)
                                                   <option value="{{$data->id }}">{{$data->department->name}}  |  {{$data->designation->deg_name}}  |  {{$data->name}}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" id="type">Type: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <label>
                                                    <input type="radio" class="form-control" name="type" value="advance" checked> Advance Salary
                                                </label>
                                            </div>
                                            <div class="col-md-6">
                                                <label>
                                                    <input type="radio" class="form-control" name="type" value="loan"> General Loan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="amount">
                                        <label class="col-md-2 control-label">Amount: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="number" id="amount_field" class="form-control" required name="amount" placeholder="Amount"  >
                                        </div>
                                    </div>

                                    <div class="form-group" id="installment">
                                        <label class="col-md-2 control-label">No of Installment: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" required name="instalment" id="instalment_field" placeholder="Installment" value="10" >
                                        </div>
                                    </div>

                                    <div class="form-group" id="monthly_deduction">
                                        <label class="col-md-2 control-label">Monthly deduction:</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="monthly_deduction_field"  placeholder="Deduction (Monthly)" readonly >
                                        </div>
                                    </div>
                                    <div id="advance_info">
                                       
                                    </div>
                                    <div class="form-group" id="period">
                                        <label class="control-label col-md-2">Period: </label>
                                        <div class="col-md-6">
                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="period" id="period_field"  readonly >
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="advance_loan">
                                       
                                    </div>
                                    <div class="form-group" id="date">
                                        <label class="control-label col-md-2">Disbursement Date: </label>
                                        <div class="col-md-6">
                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="date"  readonly >
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="applicable_month">
                                        <label class="control-label col-md-2">Applicable Month:</label>
                                        <div class="col-md-6">
                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="applicable_month" value="{{ Carbon\Carbon::now()->format('Y-m') }}"  readonly >
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="attachment">
                                        <label class="col-md-2 control-label">Attachment: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <input type="file" name="attachment" id="attachment_field" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group" id="detail">
                                        <label class="col-md-2 control-label">Detail: <span class="required">
                                            * </span>
                                        </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="detail" rows="6"></textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn yellow col-md-12"><i class="fa fa-check"></i>Add Loan</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#installment').hide();
        $('#monthly_deduction').hide();
        $('#applicable_month').hide();
        $('input[type=radio][name=type]').change(function() {
            if (this.value == 'loan') {
                $('#installment').show();
                $('#monthly_deduction').show();
                $('#applicable_month').show();
                $('#period').hide();
                $('#attachment').hide();
                $('#period_field').val('');
                $('#attachment_field').val('');
            }
            else if (this.value == 'advance') {
                $('#installment').hide();
                $('#monthly_deduction').hide();
                $('#applicable_month').hide();
                $('#instalment_field').val(10);
                $('#monthly_deduction_field').val('');
                $('#period').show();
                $('#attachment').show();
            }
        });
        $('#amount_field,#instalment_field').keyup(function(){
            $('#monthly_deduction_field').val($('#amount_field').val()/$('#instalment_field').val());
        })
        // $('#employee_id').change(function(){
        //     console.log($(this).val());
        // })
       
        $("#period_field").change(function() {
            //console.log($('#amount').val());
            $.ajax({
                type:"POST",
                url:"{{route('advance.info')}}",
                data:{
                    'id' : $('#employee_id').val(),
                    'amount' : $('#amount').val(),
                    'date' : $(this).val(),
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    // console.log(data);
                    var total_amount = 0;
                    $.each( data, function( key, product ) { 
                        total_amount += product.amount;
                    });
                    console.log(total_amount);
                    $("#advance_info").empty();               
                    var $results = $('#advance_info');
                    var $userDiv = $results.append('<div class="user-div"></div>')
                    $( '<div class="row">'+
                        '<div class="col-md-9 text-center"><span> <b>Advance Salary: </b></span>'+total_amount+'</div>'
                    +'</div>').appendTo( ".user-div" );
                }
            });
        });
            
    });
</script>
@endsection