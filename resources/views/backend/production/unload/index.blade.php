@extends('backend.master')
@section('site-title')
    Unloading Unit
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
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Production Management
                <small> </small>
            </h3>
            <!-- END PAGE TITLE-->
            <div class="portlet box green">
                <div class="portlet-title col-md-12">
                    <div class="caption col-md-4">
                        <i class="fa fa-cogs"></i> Manual Unload
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <form method="post" action="">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="" placeholder="Please Write your Invoice No">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary"  autocomplete="off" >Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="portlet box green">
                <div class="portlet-title col-md-12">
                    <div class="caption col-md-4">
                        <i class="fa fa-cogs"></i> Unload Unit
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <img class="card-img-top" src="{{ asset('assets/images/logo/unload.PNG') }}" alt="Card image cap">
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <h1 class="card-title">SCAN YOUR INVOICE FOR CONFIRMATION</h1>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#employee_select').change(function(){
                $.ajax({
                    type:"POST",
                    url:"{{route('payroll.count')}}",
                    data:{
                        id:$(this).val(),
                        '_token' : $('input[name=_token]').val()

                    },
                    success:function(data)
                    {
                        console.log(data);
                        // var output = data.output;
                        // var length = data.length;
                        // var count = data.count;

                        // $('#lenght').text(length);
                        // $('#count').text(count);


                        // if(output==''){
                        //     $('#full_table').css('display','none');
                        //     $('#message').css('display','block');
                        // }else{
                        //     $('#message').css('display','none');
                        //     $('#full_table').css('display','block');
                        //     $('#order_table tbody').html(output);
                        // }

                    },
                    error:function () {


                    }
                });
            });
        });
    </script>
@endsection