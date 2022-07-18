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
            <h3 class="page-title bold">Change User Shift
                
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
                            <table class="table table-striped table-bordered table-hover mytable">
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
                                        Employee Shift
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="tbody_empty">
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                                {{--$employee->links('vendor.pagination.custom')--}}
                            </div>
                        </div>


                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <div id="assign_shift" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Assign Shift</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" method="post" action="{{route('change.shift')}}">
                                {{csrf_field()}}
                                {{method_field('post')}}
                                <input type="hidden" id="change_shift" name="id" value="">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Shift Name</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="user_shift_id">
                                            <option value="">--Select--</option>
                                            @foreach ($user_shift as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @php
                $url = url('\assets\images\employee\images');
                // echo $url;
            @endphp
            {{-- <img src="{{$url}}" alt=""> --}}
            <input type="hidden" value="{{$url}}" class="image_path">
        </div>
    </div>
@endsection
@section('script')
    <script>
            $(document).ready(function(){
                
                var id =0;
                var img_url = $('.image_path').val();
                // console.log($('.image_path').val());
                id = 1;
                $.ajax({
                    type:"POST",
                        url:"{{route('employee.ajaxlist')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val(),
                        },
                    success:function(data){
                        // $('.tbody_empty').empty();
                        $("table.mytable tbody tr").empty();
                        employee = null;
                        // console.log(data);
                        $.each( data, function( key, employee ) {
                            console.log(employee);
                            
                            var img1 = '<a href="#"><img src="'+img_url+'/'+employee.image+'"/ width="120px" height="90px"></a>';
                            $("table.mytable tr").last().after("<tr id='"+key+"'><td>"+employee.employee_id+"</td><td>"+img1+"</td><td>"+employee.name+"</td><td>Department:"+employee.department.name+"<br>Designation : "+employee.designation.deg_name+"</td><td>"+employee.date+"</td><td>"+employee.user_shift.name+"</td><td><a class='btn btn-info user_shift' data-toggle='modal' href='#assign_shift' /"+ employee.id +"' data-id='"+employee.id+"'>Change Shift</a></td>/tr>");
                                
                                $(".user_shift").click(function(){
                                //console.log('good');
                                $("#change_shift").val($(this).data('id'));
                                console.log($(this).data('id'));
                                });
                            });
                    }
                })
                $(document).on('click',"#Probational",function(){
                // $("table#mytable tbody").empty();
                id = 1;
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
                        // $('.tbody_empty').empty();
                        $("table.mytable tbody tr").empty();
                        employee = null;
                        // console.log(data);
                        $.each( data, function( key, employee ) {
                            console.log(employee);
                            var img2 = '<a href="#"><img src="'+img_url+'/'+employee.image+'"/ width="120px" height="90px"></a>';
                            $("table.mytable tr").last().after("<tr id='"+key+"'><td>"+employee.employee_id+"</td><td>"+img2+"</td><td>"+employee.name+"</td><td>Department:"+employee.department.name+"<br>Designation : "+employee.designation.deg_name+"</td><td>"+employee.date+"</td><td>"+employee.user_shift.name+"</td><td><a class='btn btn-info user_shift' data-toggle='modal' href='#assign_shift' /"+ employee.id +"' data-id='"+employee.id+"'>Change Shift</a></td></tr>");
                            
                            $(".user_shift").click(function(){
                                //console.log('good');
                                $("#change_shift").val($(this).data('id'));
                                console.log($(this).data('id'));
                                });
                        });
                        
                    }
                })
            });
            $(document).on('click',"#Permanent",function(){
                // $("table#mytable tbody").empty();
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
                        // $('.tbody_empty').empty();
                        $("table.mytable tbody tr").empty();
                        employee = null;
                        // console.log(data);
                        $.each( data, function( key, employee ) {
                            console.log(employee);
                            var img3 = '<a href="#"><img src="'+img_url+'/'+employee.image+'"/ width="120px" height="90px"></a>';
                            $("table.mytable tr").last().after("<tr id='"+key+"'><td>"+employee.employee_id+"</td><td>"+img3+"</td><td>"+employee.name+"</td><td>Department:"+employee.department.name+"<br>Designation : "+employee.designation.deg_name+"</td><td>"+employee.date+"</td><td>"+employee.user_shift.name+"</td><td><a class='btn btn-info user_shift' data-toggle='modal' href='#assign_shift' /"+ employee.id +"' data-id='"+employee.id+"'>Change Shift</a></td></tr>");
                            $(".user_shift").click(function(){
                                //console.log('good');
                                $("#change_shift").val($(this).data('id'));
                                console.log($(this).data('id'));
                                });
                        });
                    }
                })
            });
            $(document).on('click',"#Retired",function(){
                // $("table#mytable tbody").empty();
                id = 3;
                $.ajax({
                    type:"POST",
                        url:"{{route('employee.ajaxlist')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val()
                        },
                    success:function(data){
                        // $('.tbody_empty').empty();
                        $("table.mytable tbody tr").empty();
                        employee = null;
                        // console.log(data);
                        $.each( data, function( key, employee ) {
                            console.log(employee);
                            var img4 = '<a href="#"><img src="'+img_url+'/'+employee.image+'"/ width="120px" height="90px"></a>';
                            $("table.mytable tr").last().after("<tr id='"+key+"'><td>"+employee.employee_id+"</td><td>"+img4+"</td><td>"+employee.name+"</td><td>Department:"+employee.department.name+"<br>Designation : "+employee.designation.deg_name+"</td><td>"+employee.date+"</td><td>"+employee.user_shift.name+"</td><td><a class='btn btn-info user_shift' data-toggle='modal' href='#assign_shift' /"+ employee.id +"' data-id='"+employee.id+"'>Change Shift</a></td></tr>");
                            $(".user_shift").click(function(){
                                //console.log('good');
                                $("#change_shift").val($(this).data('id'));
                                console.log($(this).data('id'));
                                });
                        });
                    }
                })
            });
            $(document).on('click',"#Terminated",function(){
                // $("table#mytable tbody").empty();
                id = 4;
                $.ajax({
                    type:"POST",
                        url:"{{route('employee.ajaxlist')}}",
                        data:{
                            'id' : id,
                            '_token' : $('input[name=_token]').val()
                        },
                    success:function(data){
                        // $('.tbody_empty').empty();
                        $("table.mytable tbody tr").empty();
                        employee = null;
                        console.log(data);
                        $.each( data, function( key, employee ) {
                            console.log(employee);
                            var img5 = '<a href="#"><img src="'+img_url+'/'+employee.image+'"/ width="120px" height="90px"></a>';
                            $("table.mytable tr").last().after("<tr id='"+key+"'><td>"+employee.employee_id+"</td><td>"+img5+"</td><td>"+employee.name+"</td><td>Department:"+employee.department.name+"<br>Designation : "+employee.designation.deg_name+"</td><td>"+employee.date+"</td><td>"+employee.user_shift.name+"</td><td><a class='btn btn-info user_shift' data-toggle='modal' href='#assign_shift' /"+ employee.id +"' data-id='"+employee.id+"'>Change Shift</a></td></tr>");
                            $(".user_shift").click(function(){
                                //console.log('good');
                                $("#change_shift").val($(this).data('id'));
                                console.log($(this).data('id'));
                                });
                        });
                    }
                })
                $(".delete").click(function(){
                    console.log(employee,$(this).data("id"));
                employee[$(this).data("id")].status="delete";
                    
                    $("#Terminated").val('');
                    $("#4").val(JSON.stringify(items_array));
                    $("#"+$(this).data("id")).remove();
                });
            });
            });
    </script>
@endsection