@extends('backend.master')
@section('site-title')
Provident Fund
@endsection
@section('style')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
@endsection
@section('main-content')

<div class="page-content-wrapper">

    <div class="page-content">
        @if(Session::has('msg'))
        <script>
            $(document).ready(function(){
                swal("{{Session::get('msg')}}","", "success");
            });
        </script>
        @endif
        <h3 class="page-title"> Payroll  <small>Provident Fund</small>
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
        <hr>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>View Provident Fund</div>
                <div class="tools"> </div>
            </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <b>Package Name :</b>  {{$provident_fund->package}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                            <b>Amount :</b>  {{$provident_fund->amount}} <span>%</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                            <b>Fund Duration :</b>  {{$provident_fund->fund_duration}} <span>Months</span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <b>Fund Detention :</b>  {{$provident_fund->fund_detention}} <span>Months</span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                          <b> Detention Amount :</b>  {{$provident_fund->detention_amount}} <span>%</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                            <b>Completion Bonus :</b>  {{$provident_fund->completion_bonus}} <span>%</span>
                        </div>
                    </div><br>
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover" id="order_table">
                            <thead>
                            <tr>
                                <th>S.l</th>
                                <th style="text-align: center">Name </th>
                                <th style="text-align: center">Applied Month </th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Installments</th>
                                <th style="text-align: center">Remark</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($provident_fund->provident_fund_users as $key=> $item)
                                <tr>
                                    <td>{{ ++ $key}}</td>
                                    <td style="text-align: center">{{$item->user->name}}</td>
                                    <td style="text-align: center">{{$item->applied_month}}</td>
                                    <td style="text-align: center">{{$item->status}}</td>
                                    <td style="text-align: center">
                                        @foreach (unserialize($item->installments) as $installment)
                                            <li>{{$installment}}</li>
                                        @endforeach
                                    </td>
                                    <td style="text-align: center">{{$item->remark}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script> --}}
<script>
    $(function() {
        $('.enlist_employee').click(function(){
            $('#provident_fund_id').val($(this).data('id'));
            $('#instalment').val($(this).data('instalment'));
        })
    });
</script>
@endsection
