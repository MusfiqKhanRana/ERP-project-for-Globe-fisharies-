@extends('backend.master')
@section('site-title')
Temp. Monitoring
@endsection
@section('main-content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN CONTENT -->  
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title bold">Temp. Monitoring
            <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                Add Monitoring to List
                <i class="fa fa-plus"></i>
            </a>
        </h3>
        <hr> 
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-chambray">
                    <div class="portlet-body">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>
                                 &nbsp;<b> Monitoring list</b> 
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <br>
                        <div>
                            <table class="table table-bordered yajra-datatable" style="overflow: scroll;">
                                <thead>
                                    <tr>
                                        <th>sl.</th>
                                        <th>Frozen Storage Name</th>
                                        <th>Temp(<sup>0</sup>C)(DDT)</th>
                                        <th>Temp(<sup>0</sup>C)(DTS)</th>
                                        <th>Master Carton No</th>
                                        <th>Commodity & Count</th>
                                        <th>Date Of Production</th>
                                        <th>Block Core Temp(<sup>0</sup>C)</th>
                                        <th>Remark</th>
                                        {{-- <th>Cold Storage Name</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{-- <p id="storage_id"></p> --}}
                                <form class="form-horizontal" id="frm" role="form" method="post" action="">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                    <input type="hidden" id="storage_id" name="id" value="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-body">
        
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Cold Storage</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <select class="form-control select2me" id="cold_storage" name="cold_storage_id" required>
                                                                <option value="">--select--</option>
                                                                @foreach($cold_storage as $data)
                                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <span class="input-group-addon"><i class="fa fa-archive" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
        
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Temp(<sup>0</sup>C)(DDT)</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="temp_c_ddt" name="temp_c_ddt" value="">
                                                            <span class="input-group-addon"><i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Temp(<sup>0</sup>C)(DTS)</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="temp_c_dts" name="temp_c_dts" value="">
                                                            <span class="input-group-addon"><i class="fa fa-arrow-down" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Master Carton No</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="master_carton_no" name="master_carton_no" value="">
                                                            <span class="input-group-addon"><i class="fa fa-hand-o-left" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Commodity Count</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="commodity_count" name="commodity_count" value="">
                                                            <span class="input-group-addon"><i class="fa fa-hand-o-left" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Production Date</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="date_of_production" name="date_of_production" value="">
                                                            <span class="input-group-addon"><i class="fa fa-hand-o-left" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Block Core Temp.</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="block_core_temp" name="block_core_temp" value="">
                                                            <span class="input-group-addon"><i class="fa fa-hand-o-left" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Remark</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="remarks" name="remarks" value="">
                                                            <span class="input-group-addon"><i class="fa fa-hand-o-left" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group clearfix">
                                                    <label class="col-md-3 control-label">Date</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group">
                                                            <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                <input type="text" class="form-control" name="clearance_date" value="{{$requisition->clearance_date}}"  readonly>
                                                                <span class="input-group-btn">
                                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                                </span>
                                                            </div>
                                                            <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div> --}}
        
        
                                                {{-- <div class="form-group clearfix">
                                                    <div class="col-md-12">
                                                        <button class="btn btn-info col-md-12" type="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                            Update</button>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary btn_submit">Save changes</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detele File</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                {{-- <p id="storage_id"></p> --}}
                                <input type="hidden" id="storage_id2"  value="">
                                <h3 style="color: red"><b>Are You sure ?</b></h3>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary confirm_delete">Confirm</button>
                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(function () {
        var x =0;
      
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('temp.monitoring.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                // {data: 'cold_storage_id', name: 'cold_storage_id'},
                {data: 'storage_name', name: 'coldstorage.name'},
                {data: 'temp_c_ddt', name: 'temp_c_ddt'},
                {data: 'temp_c_dts', name: 'temp_c_dts'},
                {data: 'master_carton_no', name: 'master_carton_no'},
                {data: 'commodity_count', name: 'commodity_count'},
                {data: 'date_of_production', name: 'date_of_production'},
                {data: 'block_core_temp', name: 'block_core_temp'},
                {data: 'remarks', name: 'remarks'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
        $('.yajra-datatable').on('click', '.edit_temp', function(){
            // alert( "Handler for .click() called." );
            // console.log($(this).attr("data-cold_storage_id"));
            x = $(this).attr("data-cold_storage_id");
            $("#storage_id").val($(this).attr("data-id"));
            $("#temp_c_ddt").val($(this).attr("data-temp_c_ddt"));
            $("#temp_c_dts").val($(this).attr("data-temp_c_dts"));
            $("#master_carton_no").val($(this).attr("data-master_carton_no"));
            $("#commodity_count").val($(this).attr("data-commodity_count"));
            $("#date_of_production").val($(this).attr("data-date_of_production"));
            $("#block_core_temp").val($(this).attr("data-block_core_temp"));
            $("#remarks").val($(this).attr("data-remarks"));
            $("#cold_storage").val(x).trigger('change');
            // $('#cold_storage option[value="{{'$(this).attr("data-cold_storage_id")'}}"]').attr("selected", "selected");
            // console.log(x);

        });
        $('.yajra-datatable').on('click', '.delete_temp', function(){

            $("#storage_id2").val($(this).attr("data-id"));
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".btn_submit").click(function(e){
                // alert('test');
                // e.preventDefault();

                var id =  $("#storage_id").val();
                console.log(id);
                // var temp_c_ddt = $("#temp_c_ddt").val();
                // var temp_c_dts = $("#temp_c_dts").val();
                // var master_carton_no = $("#master_carton_no").val();
                // var commodity_count = $("#commodity_count").val();
                // var date_of_production = $("#date_of_production").val();
                // var block_core_temp = $("#block_core_temp").val();
                // var remarks = $("#remarks").val();

                $.ajax({
                    type:'POST',
                    url:"/admin/temp_monitoring/"+id,
                    // data:{storage_id:storage_id, temp_c_ddt:temp_c_ddt, temp_c_dts:temp_c_dts, master_carton_no:master_carton_no, commodity_count:commodity_count, date_of_production:date_of_production, block_core_temp:block_core_temp, remarks:remarks},
                    data:jQuery('#frm').serialize(),
                    success:function(data){
                        // alert(data.success);
                        $('#editModal').modal('hide');
                        Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: data,
                                    showConfirmButton: false,
                                    timer: 1500
                        })
                        table.draw();
                    }
                });

            });
            $(".confirm_delete").click(function(e){
                var id =  $("#storage_id2").val();
                // console.log(id);
                $.ajax({
                    type:'POST',
                    url:"/admin/temp_monitoring/"+id,
                    data:{"_method":"DELETE","id":id},
                    success:function(data){
                        // alert(data.success);
                        $('#deleteModal').modal('hide');
                        Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: data,
                                    showConfirmButton: false,
                                    timer: 1500
                        })
                        table.draw();
                    }
                });

            });
    });
    // $(document).ready(function(){
    //     $(document).on('click',".edit_temp",function(){
    //         console.log(hey Bro);
    //                     // w=$(this).find(':selected').attr('data-pack_weight');
    //                     // $(".catagory"+max).val($(this).find(':selected').attr('data-category_name'));
    //                     // $(".span"+max).html($(this).find(':selected').attr('data-pack_name'));  
    //                     // $(".pprice"+max).html($(this).find(':selected').attr('data-product_price'));
    //                     // weightCount();
    //                     // tp[max] = $(this).find(':selected').attr('data-product_price');
    //     });
    // });
  </script>
    
@endsection