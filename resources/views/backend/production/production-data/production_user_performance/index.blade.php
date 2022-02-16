@extends('backend.master')
@section('site-title')
   User Performance
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
                        // swal("{{Session::get('msg')}}","", "success");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: "{{Session::get('msg')}}",
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
                </script>
            @endif
            <h3 class="page-title bold form-inline">Production
                <small> User Performance </small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add User Performance
                    <i class="fa fa-plus"></i>
                </a>
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
            <!-- END PAGE TITLE-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Items List
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                sl
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                            User Name
                                            </th>
                                            <th>
                                                User Id
                                            </th>
                                            <th>
                                            Designation
                                            </th>
                                            <th>
                                                Item
                                            </th>
                                            <th style="text-align: center">
                                                Performance Info
                                            </th>
                                            <th>Remark</th>
                                            <th style="text-align: center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($performances as $key=>$item)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{$item->user->name}}</td>
                                                <td>{{$item->user->employee_id}}</td>
                                                <td>{{$item->user->designation->deg_name}}</td>
                                                <td>{{$item->item->name}}</td>
                                                <td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                Start Time
                                                                </th>
                                                                <th>
                                                                End Time
                                                                </th>
                                                                <th>
                                                                Quantity
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (unserialize($item->performance_info) as $perform_info)
                                                                <tr> 
                                                                    <td>{{$perform_info->start_time}}</td>
                                                                    <td>{{$perform_info->end_time}}</td> 
                                                                    <td>{{$perform_info->quantity }} Kg</td>                                           
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>{{$item->remark}}</td>
                                                <td style="text-align: center">
                                                    {{-- <a class="btn btn-info"  data-toggle="modal" href="#editModal{{$item->id}}"><i class="fa fa-edit"></i> Edit</a> --}}
                                                    <a class="btn red" data-toggle="modal" href="#deleteModal{{$item->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <div id="deleteModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                {{csrf_field()}}
                                                <input type="hidden" value="" id="delete_id">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                        </div>
                                                        <div class="modal-footer " >
                                                            <div class="d-flex justify-content-between">
                                                                <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                            </div>
                                                            <div class="caption pull-right">
                                                                <form action="{{route('user-performance.destroy',[$item])}}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn red"><i class="fa fa-trash"></i>Delete</button>               
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div id="editModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Update Employee Tiffin Bill</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('user-performance.update', $item)}}">
                                                                {{csrf_field()}}
                                                                {{method_field('put')}}
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group input-5 date date-picker" id="datepicker" data-date-format="MM-yyyy">
                                                                            <input  type="text" class="form-control" value="{{$item->date}}" readonly="readonly" name="date" >    
                                                                            <span class="input-group-btn">
                                                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                                            </span>      
                                                                        </div> 
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"> Name</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control " id="user_id" name="user_id">
                                                                            <option value="{{$item->user->id}}">{{$item->user->name}}</option>
                                                                            @foreach($users as $data)
                                                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                                                            @endforeach
                                                                            {{csrf_field()}}
                                                                        </select>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Days</label>
                                                                    <div class="col-md-9">
                                                                        <input type="number" class="form-control" value="{{$item->days}}"  name="days">
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Rate</label>
                                                                    <div class="col-md-9">
                                                                        <input type="number" class="form-control" value="{{$item->rate}}"  name="rate">
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" value="{{$item->remark}}" name="remark">
                                                                    </div><br><br>
                                                                </div><br>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New User Performance</h4>
                        </div>
                        <br>
                        <form class="form-horizontal" role="form" method="post" action="{{route('user-performance.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                <div class="col-md-9">
                                    <select class="form-control"  name="user_id">
                                        <option value="">--Select--</option>
                                        @foreach($users as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                        {{csrf_field()}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Item</label>
                                <div class="col-md-9">
                                    <select class="form-control"  name="item_id">
                                        <option value="">--Select--</option>
                                        @foreach($items as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                        {{csrf_field()}}
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" value="" id="provided_item" name="provided_item">
                            <div class="form-group" style="padding:2%">
                                <label for="inputEmail1" class="col-md-2 control-label">Performance</label>  
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" class="form-control" placeholder="Start Time" id="start_time" name="start_time">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="end_time">End Time</label>
                                        <input type="time" class="form-control" placeholder="End Time" id="end_time" name="end_time">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="padding:2%">
                                <label for="inputEmail1" class="col-md-2 control-label"></label>  
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="number" class="form-control" placeholder="Quantity" id="quantity" name="quantity">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-success" id="add_items">+  Add Performance Info</button>
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Item</label>
                                <div class="col-md-9">
                                    <table  class="table table-striped table-bordered table-hover" id="mytable">
                                        <tr>
                                            <th> Start Time</th>
                                            <th>End Time</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>

                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                <div class="col-md-9">
                                    <textarea type="text" class="form-control"  name="remark"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                // var date = new Date();
                // var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                // var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

                // $('#datepicker1').datepicker({
                // format: "dd/mm/yyyy",
                // todayHighlight: true,
                // startDate: today,
                // // endDate: end,
                // // autoclose: true
                // });
                // $('#datepicker1').val(moment(moment().toDate()).format('MM/DD/YYYY'));
                // });
                $("#datepicker").datepicker({
                    viewMode: 'years',
                    format: 'MM-yyyy'
                });
                $("#rate").keyup(function() {
                    // console.log();
                    $('#total').val($(this).val()*$('#days').val());
                });
                console.log("this is ready");
            });
                                    
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
            //    var time,c_temp,f_m_r = null;
            var items_array = [];
            function nullmaking(){
                    $("#start_time").val(null);
                    $("#end_time").val(null);
                    $("#quantity").val(null);
                }
            $("#add_items").click(function(){
                console.log($("#start_time").val());
                    items_array.push({"start_time":$("#start_time").val(),"end_time":$("#end_time").val(),"quantity":$("#quantity").val(),"status":"stay"});
                    $("#provided_item").val('');
                    $("#provided_item").val(JSON.stringify(items_array));
                    $.each( items_array, function( key, item ) {
                        // console.log(item);
                        if (item.status == "stay") {
                            if(items_array.length-1 == key){
                                $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+item.start_time+"</td><td>"+item.end_time+"</td><td>"+item.quantity+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                            }
                        }
                    });
                    $(".delete_item").click(function(){
                        items_array[$(this).data("id")].status="delete";
                        // console.log(product_array,$(this).data("id"));
                        $("#provided_item").val('');
                        $("#provided_item").val(JSON.stringify(items_array));
                        $("#"+$(this).data("id")).remove();
                    });
                    nullmaking();
            });
                
            });
        </script>
       
@endsection