@extends('backend.master')
@section('site-title')
    Production Data
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
                <small> Management </small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add New Temperature Thermocouple
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
                                           Loading Time
                                        </th>
                                        <th>
                                            Unloading Time
                                        </th>
                                        <th>
                                          Freezer Name
                                        </th>
                                        <th>Temp Info</th>
                                        <th>Remark</th>
                                        <th style="text-align: center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $key=>$item)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->load_time}}</td>
                                            <td>{{$item->unload_time}}</td>
                                            <td>{{$item->cold_storage->name}}</td>
                                            <td>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Time
                                                            </th>
                                                            <th>
                                                               C.Temp
                                                            </th>
                                                            <th>
                                                               F.M.R
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach (unserialize($item->info_temp) as $info_temp)

                                                        <tr> 
                                                                <td>{{$info_temp->time}}</td>
                                                                <td>{{$info_temp->c_temp}}</td> 
                                                                <td>{{$info_temp->f_m_r}}</td>                                           
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>{{$item->remark}}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-info"  data-toggle="modal" href="#editModal{{$item->id}}"><i class="fa fa-edit"></i> Edit</a>
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
                                                            <form action="{{route('temp-thermocouple.destroy',[$item])}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Update Area</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" role="form" method="post" action="{{route('temp-thermocouple.update', $item)}}">
                                                            {{csrf_field()}}
                                                            {{method_field('put')}}
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Item Name</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$item->name}}" required name="name">
                                                                </div>
                                                                <br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$item->details}}" required name="details">
                                                                </div>
                                                                <br><br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                            <h4 class="modal-title">Add New Temperature Thermocouple</h4>
                        </div>
                        <br>
                        <form class="form-horizontal" role="form" method="post" action="{{route('temp-thermocouple.store')}}">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" name="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Loading Time</label>
                                <div class="col-md-9">
                                    <input type="time" class="form-control" name="load_time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Unloading Time</label>
                                <div class="col-md-9">
                                    <input type="time" class="form-control"  name="Unload_time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Freezer Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="freezer_no" id="freezer_no">
                                        <option value="">--Select Item--</option>
                                        @foreach ($cold_storages as $item)
                                            <option value="{{$item->id}}" data-item_name="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" value="" id="provided_item" name="provided_item">
                            <div class="form-group" style="padding:2%">
                                <label for="inputEmail1" class="col-md-2 control-label">Add Item</label>  
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="time" class="form-control" placeholder="Time" id="time" name="time">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="C.Temp" id="c_temp" name="c_temp">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" placeholder="F.M.R" id="f_m_r" name="f_m_r">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-success" id="add_items">+  Add</button>
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Item</label>
                                <div class="col-md-9">
                                    <table  class="table table-striped table-bordered table-hover" id="mytable">
                                        <tr>
                                            <th>Time</th>
                                            <th>C.Temp</th>
                                            <th>F.M.R</th>
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
        $(document).ready(function () {
        //    var time,c_temp,f_m_r = null;
           var items_array = [];
           function nullmaking(){
                $("#time").val(null);
                $("#c_temp").val(null);
                $("#f_m_r").val(null);
            }
           $("#add_items").click(function(){
               console.log($("#time").val());
                items_array.push({"time":$("#time").val(),"c_temp":$("#c_temp").val(),"f_m_r":$("#f_m_r").val(),"status":"stay"});
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $.each( items_array, function( key, item ) {
                    // console.log(item);
                    if (item.status == "stay") {
                        if(items_array.length-1 == key){
                            $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+item.time+"</td><td>"+item.c_temp+"</td><td>"+item.f_m_r+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
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