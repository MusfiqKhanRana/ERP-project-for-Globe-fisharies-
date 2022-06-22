@extends('backend.master')
@section('site-title')
    Office Loan
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
        @endif <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Office Employee Advance/Loan Management

                <a class="btn purple pull-right" data-toggle="modal" href="{{route('add.office.loan')}}">
                    Add New Advance/Loan
                <i class="fa fa-plus"></i> </a>
            </h3>
                
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box yellow-gold">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-money"></i>Office Loan List
                            </div>
                        </div>

                        <div class="portlet-body" style="overflow: auto">
                            
                            <table class="table table-striped table-bordered table-hover"  id="awards">
                                <thead>
                                <tr>
                                    <th> Name </th>
                                    <th>  Phone </th>
                                    <th> Given Amount </th>
                                    <th> Date </th>
                                    <th style="text-align: center"> Installment Dates </th>
                                    <th> Type </th>
                                    <th> Detail </th>
                                    {{-- <th style="text-align: center"> Action </th> --}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $office_loan as $key=>$data)
                                    <td style="text-align: center">{{$data->employee->name}}</td>
                                    <td style="text-align: center">{{$data->employee->phone}}</td>
                                    <td style="text-align: center">{{$data->amount}}</td>
                                    <td style="text-align: center">{{date('Y, M-d',strtotime($data->date))}}</td>
                                    
                                    <td style="text-align: center">
                                        @if (count($data->loan_instalment) == 0 )
                                                N/A
                                        @else
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>S.l</th>
                                                        <th>Date</th>
                                                        <th>Installment No.</th>
                                                        <th>Status</th>
                                                        <th>Instalment Amount</th>
                                                        <th>Paid Amount</th>
                                                        <th>Paid Date</th>
                                                        <th style="text-align: center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data->loan_instalment as $item)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{date('Y, M',strtotime($item->date))}}</td>
                                                            <td style="text-align: center">{{$item->installment_no}}</td>
                                                            <td>
                                                                {{ $item->isPaid == 0 ? 'Unpaid' : 'Paid' }}
                                                            </td>
                                                            <td>
                                                                {{($data->amount / $data->instalment)}}
                                                            </td>
                                                            <td> 
                                                                {{ $item->paid_amount == NULL ? 'N/A' : $item->paid_amount }}
                                                            </td>
                                                            <td>
                                                                {{ $item->paid_date == NULL ? 'N/A' : date('Y, M-d',strtotime($item->paid_date)) }}
                                                            </td>
                                                            <td style="text-align: center">
                                                                @if($item->paid_amount >= ($data->amount / $data->instalment))
                                                                    N/A
                                                                @else
                                                                    <a class="btn btn-primary addPayment" data-toggle="modal" data-instalment_id="{{$item->id}}" data-per_instalment="{{($data->amount / $data->instalment)}}" href="#addPayment">Make Payment</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </td>
                                    
                                    <td>{{$data->type}}</td>
                                    <td>{!! $data->detail !!}</td>

                                    {{-- <td>
                                        <a class="btn yellow-gold" href="{{route('office.loan.edit', $data->id)}}">Edit/View</a>
                                    </td> --}}
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                           
                            <div id="addPayment" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Add Payment</h4>
                                        </div><br>
                                        <form class="form-horizontal" role="form" method="post" action="{{route('office.loan.payment')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name=""  value="">
                                            <input type="hidden" id="per_instalment" name="per_instalment"  value="">
                                            <input type="hidden" name="paid_date" value="">
                                            <input type="hidden" id="instalment_id" name="instalment_id" value="">
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-md-2 control-label">Amount</label>
                                                <div class="col-md-8">
                                                    <input type="number" class="form-control paid_amount" name="paid_amount" placeholder="Paid Amount">
                                                </div>
                                            </div>
                                            <div class="row warning" style="margin-top:3%">
                                                <div class="col-md-12" style="text-align: center">
                                                    <p style="color: red"><b>**Please pay <span class="PaidAmount"></span> or pay bellow <span class="PaidAmount"></span>**</b></p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="submit" class="btn blue-ebonyclay confirm_btn"><i class="fa fa-floppy-o"></i> Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    {{ $office_loan->links('vendor.pagination.custom') }}
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
<script type="text/javascript">
$(document).ready(function () {
      
    var instalment_amount=0;
    $(".addPayment").click(function(){
        //console.log(addPayment);
       $("#instalment_id").val($(this).data('instalment_id'));

        instalment_amount= parseInt($(this).attr("data-per_instalment"));
        $("#per_instalment").val(instalment_amount);
    });
    
    $('.warning').hide();
    $('.paid_amount').on("keyup",function() {
            var paid_amount = parseInt($(this).val());
            
            if (paid_amount > instalment_amount) {
                $(".PaidAmount").html(instalment_amount);
                $('.warning').show();
                $('.confirm_btn').prop('disabled', true);
            }
            if (paid_amount < instalment_amount) {
                $(".PaidAmount").html(instalment_amount);
                $('.warning').hide();
                $('.confirm_btn').prop('disabled', false);
            }
           
        });
});
</script>
@endsection