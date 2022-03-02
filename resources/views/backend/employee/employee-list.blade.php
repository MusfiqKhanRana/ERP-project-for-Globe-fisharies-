@extends('backend.master')
@section('site-title')
    Employee List
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
            <h3 class="page-title bold">Employee Management
                <a href="{{route('employee.add')}}" class="btn bg-dark bg-font-dark pull-right">
                    Add New Employee <i class="fa fa-plus"></i>
                </a>
                <hr>
            </h3>
            <!-- END PAGE TITLE-->




            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box dark">
                        <div class="portlet-title" style="text-align: left;">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" id="Probational" href="#probational">Probational</a></li>
                                <li><a data-toggle="tab" id="Permanent" href="#permanent">Permanent</a></li>
                                <li><a data-toggle="tab" id="Retired" href="#retired">Retired</a></li>
                                <li><a data-toggle="tab" id="Terminated" href="#terminated">Terminated</a></li>
                            </ul>

                        </div>
                        <div class="portlet-body tab-pane" id="probational">
                            <table class="table table-striped table-bordered table-hover yajra-datatable" id="mytable">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        Employee ID
                                    </th>
                                    <th class="text-center">
                                        Image
                                    </th>
                                    <th style="text-align: center">
                                        Name
                                    </th>
                                    <th class="text-center">
                                        Dept. & Designation
                                    </th>
                                    <th class="text-center">
                                        Joining Date
                                    </th>
                                    <th class="text-center">
                                        Phone
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class="row">
                                {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                                {{ $employee->links('vendor.pagination.custom') }}
                            </div>
                        </div>


                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        var id =0;
            $(document).ready(function(){
                id = 1;
                $.ajax({
                    type:"POST",
                        url:"{{route('employee.ajaxlist')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val(),
                            page :1,
                            pageLimit : 
                        },
                    success:function(data){
                        employee = null;
                        console.log(data);
                        $.each( data, function( key, employee ) {
                            console.log(employee);
                            var img1 = '<a href="#"><img src="' + employee.image + '"/></a>';
                            $("table#mytable tr").last().after("<tr id='"+key+"'><td>"+employee.employee_id+"</td><td>"+img1+"</td><td>"+employee.name+"</td><td>"+employee.dept_id+"</td><td>"+employee.date+"</td><td>"+employee.phone+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        });
                    }
                })
            });
            $(document).on('click',"#Permanent",function(){
                $("table#mytable tbody").empty();
                id = 2;
                $.ajax({
                    type:"POST",
                        url:"{{route('employee.ajaxlist')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val(),
                            page :1,
                            pageLimit : 1
                        },
                    success:function(data){
                        employee = null;
                        console.log(data);
                        $.each( data, function( key, employee ) {
                            console.log(employee);
                            var img1 = '<a href="#"><img src="' + employee.image + '"/></a>';
                            $("table#mytable tr").last().after("<tr id='"+key+"'><td>"+employee.employee_id+"</td><td>"+img1+"</td><td>"+employee.name+"</td><td>"+employee.dept_id+"</td><td>"+employee.date+"</td><td>"+employee.phone+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        });
                    }
                })
            });
            $(document).on('click',"#Retired",function(){
                $("table#mytable tbody").empty();
                id = 3;
                $.ajax({
                    type:"POST",
                        url:"{{route('employee.ajaxlist')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val()
                        },
                    success:function(data){
                        employee = null;
                        console.log(data);
                        $.each( data, function( key, employee ) {
                            console.log(employee);
                            var img1 = '<a href="#"><img src="' + employee.image + '"/></a>';
                            $("table#mytable tr").last().after("<tr id='"+key+"'><td>"+employee.employee_id+"</td><td>"+img1+"</td><td>"+employee.name+"</td><td>"+employee.dept_id+"</td><td>"+employee.date+"</td><td>"+employee.phone+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        });
                    }
                })
            });
            $(document).on('click',"#Terminated",function(){
                $("table#mytable tbody").empty();
                id = 4;
                $.ajax({
                    type:"POST",
                        url:"{{route('employee.ajaxlist')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val()
                        },
                    success:function(data){
                        employee = null;
                        console.log(data);
                        $.each( data, function( key, employee ) {
                            console.log(employee);
                            var img1 = '<a href="#"><img src="' + employee.image + '"/></a>';
                            $("table#mytable tr").last().after("<tr id='"+key+"'><td>"+employee.employee_id+"</td><td>"+img1+"</td><td>"+employee.name+"</td><td>"+employee.dept_id+"</td><td>"+employee.date+"</td><td>"+employee.phone+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        });
                    }
                })
            });
    </script>
@endsection