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
                        <i class="fa fa-cogs"></i> Unload Unit
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <b>Supplier Info.</b>
                                </div>
                                <div class="col-md-6">
                                    {{-- @php
                                        dd($production_requistion->toArray());
                                    @endphp --}}
                                    <span>{{$production_requistion->name}}</span><br>
                                    <span>{{$production_requistion->phone}}</span><br>
                                    <span>{{$production_requistion->address}}</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <b>Items.</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Requested Quantity</th>
                                                <th scope="col">Recived Quatity</th>
                                                <th scope="col">Missing Quantity</th>
                                                <th scope="col">Grade</th>
                                                <th scope="col">Remark</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($production_requistion->production_requisition_items as $key=>$item)
                                                <tr>
                                                    <th scope="row">{{++$key}}</th>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->pivot->quantity}}</td>
                                                    <td><input type="text" class="form-control"></td>
                                                    <td>Messing</td>
                                                    <td>{{$item->grade->name}}</td>
                                                    <td><input type="text" class="form-control"></td>
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

        </div>
    </div>
@endsection
@section('script')
    <script>
        // $(document).ready(function(){
        //     $('#employee_select').change(function(){
        //         $.ajax({
        //             type:"POST",
        //             url:"{{route('payroll.count')}}",
        //             data:{
        //                 id:$(this).val(),
        //                 '_token' : $('input[name=_token]').val()

        //             },
        //             success:function(data)
        //             {
        //                 console.log(data);
        //                 // var output = data.output;
        //                 // var length = data.length;
        //                 // var count = data.count;

        //                 // $('#lenght').text(length);
        //                 // $('#count').text(count);


        //                 // if(output==''){
        //                 //     $('#full_table').css('display','none');
        //                 //     $('#message').css('display','block');
        //                 // }else{
        //                 //     $('#message').css('display','none');
        //                 //     $('#full_table').css('display','block');
        //                 //     $('#order_table tbody').html(output);
        //                 // }

        //             },
        //             error:function () {


        //             }
        //         });
        //     });
        // });
    </script>
@endsection