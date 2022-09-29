@extends('backend.master')
@section('site-title')
    Requisition
@endsection
@section('main-content')   
<div class="page-content-wrapper">
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
    <div class="row" id="printrequisition" style="text-align: left">
        <div class="col-md-4" style="text-align:center;">
            <div class="row-md-3">
                <h4><b>GLOBE FISHERIES LIMITED</b>
                </h4>
            </div>
            <div class="row-md-3">
                <h5><b>Get Check In Pass</b>
                </h5>
            </div>
            <div class="row-md-3">
                <b>Date :</b> 
                @php
                    use Carbon\Carbon;
                    $currentTime = Carbon::now();
                    echo $currentTime->toDateTimeString();
                @endphp
            </div><br>
            <div class="row-md-3" >
                @php echo  DNS1D::getBarcodeSVG($data->invoice_code, "CODABAR",2,28,'black', false); @endphp
                <br>
                Invoice No: {{$data->invoice_code}}
                
            </div>
        </div>
        </div><br><hr>
        <button id="printbtn" class="btn red" ><i class="fa fa-print" aria-hidden="true">  Print Invoice</i></button>
    </div>
</div>
@endsection
@section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
       jQuery(document).ready(function() {
        var confiq
            $("#printbtn").click(function () {
                $("#printrequisition").print();
            });
        });
    </script>
@endsection