@extends('backend.master')
@section('site-title')
Advance Loan
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


        <h3 class="page-title"><b>HR Management</b><sub>(Advance Loan)</sub></h3>

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
        <div class="portlet box">
            <div class="portlet-body">
                <div class="row" style="margin-bottom: 2%">
                    <div class="col-md-4">
                        <label for="">Department</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Designation</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                        <label for="">Employee Name</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="row" style="margin-bottom: 2%">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                              Advance Salary
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios1">
                              General Loan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row advance_salary" style="margin-bottom: 3%">
                    <div class="col-md-3">
                        <label for="">Amount</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">Period</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">Date</label>
                        <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                            <input type="text" class="form-control" name="date_of_test_completion" placeholder="" id="clearance_date" readonly >
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Attachments</label>
                        <input class="form-control" type="file">
                    </div>
                </div>
                <div class="row general_loan" style="margin-bottom: 3%">
                    <div class="col-md-3">
                        <label for="">Amount</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">Number Of Instalment</label>
                        <input class="form-control" type="text">
                    </div>
                    <div class="col-md-3">
                        <label for="">Date</label>
                        <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                            <input type="text" class="form-control" name="date_of_test_completion" placeholder="" id="clearance_date" readonly >
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">Deduction(Monthly)</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <hr>
                <div class="portlet-body">
                    <Label>Previous Record:</Label><br>
                    <div class="row" style="margin-bottom: 3%">
                        <div class="col-md-3">
                            <label for="">Amount</label><br>
                            <b>6000</b>
                        </div>
                        <div class="col-md-3">
                            <label for="">Period</label><br>
                            <b>February 2021</b>
                        </div>
                        <div class="col-md-3">
                            <label for="">Disbrusement Date</label><br>
                            <b>22February 2021</b>
                        </div>
                        <div class="col-md-3">
                            <label for="">Status</label><br>
                            <b>Deducted</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(".general_loan").hide();
            $(".advance_salary").show();
            $('#exampleRadios1').click(function(){
                $(".general_loan").hide();
                $(".advance_salary").show();
            });
            $('#exampleRadios2').click(function(){
                $(".general_loan").show();
                $(".advance_salary").hide();
            });
        });
    </script>
@endsection
