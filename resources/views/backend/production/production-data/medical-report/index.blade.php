@extends('backend.master')
@section('site-title')
   Medical Report Lists
@endsection 
{{-- @section('style')
    <style>
        #sample_2_filter label {
            float: right;
        }
        .portlet.box .dataTables_wrapper .dt-buttons {
            margin-top: -48px;
        }
        .dt-button.buttons-pdf.btn.default {
            margin-top: -5px;
            margin-left: 5px;
            margin-right: 5px;
        }
        .dt-button.buttons-print.btn.default {
            margin-top: -5px;
        }
        .dt-button.buttons-pdf.btn.default {
            margin-top: -5px;
        }
        .dt-button.buttons-csv.btn.default {
            margin-top: -5px;
        }
    </style>
@endsection --}}
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Medical Reports
            
            {{-- <button type="button" class="btn dark pull-right " >Create Report <i class= 'fa fa-plus'> </i> </button> --}}
            <a class="btn btn-primary pull-right"  href="{{route('medical_report.create')}}">
               Create Report
                <i class="fa fa-plus"></i>
            </a>
        </h3>
            <hr>
                @if(Session::has('msg'))
                    <script>
                        $(document).ready(function(){
                            swal("{{Session::get('msg')}}","", "success");
                        });
                    </script>
                @endif
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
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Medical Reports</div>
                        <div class="tools"> </div>
                    </div>
                        <div class="portlet-body">
                            <table class="table table-bordered yajra-datatable" id="datatable-ajax-crud" style="overflow: scroll;">
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        {{-- <th>Designation</th> --}}
                                        <th>C/Complain</th>
                                        <th>Dressing</th>
                                        <th>Medicine Details</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach($reports as $key=> $data)
                                        <tr id="row1">
                                            <td>{{$key+1}}</td>
                                            <td style="text-align: center"> {{$data->date}}</td>
                                            <td style="text-align: center"> {{$data->user->name}}</td>
                                            <td style="text-align: center"> 
                                                @php
                                                    $origin = new DateTime($data->user->b_date);
                                                    $target = new DateTime("now");
                                                    $interval = $origin->diff($target);
                                                    echo $interval->format('%y years');
                                                @endphp
                                            </td>
                                            <td style="text-align: center"> {{$data->user->designation->deg_name}}</td>
                                            <td style="text-align: center"> {{$data->complain}}</td>
                                            <td style="text-align: center"> {{$data->dressing}}</td>
                                            <td style="text-align: center"> {!! $data->medicine_details !!}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-info"  data-toggle="modal" href="#editModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                            <form action="{{route('medical_report.destroy',[$data->id])}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Update Report for  ({{$data->user->name}})</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-group" role="form" method="post" action="{{route('medical_report.update', $data->id)}}">
                                                            {{csrf_field()}}
                                                            {{method_field('put')}}

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Complain:</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" value="{{$data->complain}}" required name="complain">
                                                                    </div>
                                                                </div>
                                                            </div><br><br>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Dressing:</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" value="{{$data->dressing}}" required name="dressing">
                                                                    </div>
                                                                </div>
                                                            </div><br><br>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label"> Medicine Details</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" value="{{$data->medicine_details}}" required name="medicine_details">
                                                                    </div>
                                                                </div>
                                                            </div><br><br>
                                                            {{-- <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Medicine Schedule:</label>
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" value="{{$data->medicine_schedule}}" required name="medicine_schedule">
                                                                    </div>
                                                                </div>
                                                            </div><br><br><br><br> 
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach --}}
                                </tbody>
                            </table>
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
                                    <input type="hidden" id="del_report"  value="">
                                    <h3 style="color: red"><b>Are You sure ?</b></h3>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary confirm_delete">Confirm</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div id="editModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Update Report</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-group" role="form" id="frm" method="post" action="">
                                            {{csrf_field()}}
                                            {{ method_field('PUT') }}
                                            <input type="hidden" id="medical_id" name="id" value="">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Complain:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" id="complain" value="{{--$data->complain--}}" required name="complain">
                                                    </div>
                                                </div>
                                            </div><br><br>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Dressing:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" id="dressing" value="{{--$data->dressing--}}" required name="dressing">
                                                    </div>
                                                </div>
                                            </div><br><br>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-md-2 control-label"> Medicine Details</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" id="medicine_details" value="{{--$data->medicine_details--}}" required name="medicine_details">
                                                    </div>
                                                </div>
                                            </div><br><br>
                                            {{-- <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Medicine Schedule:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" value="{{$data->medicine_schedule}}" required name="medicine_schedule">
                                                    </div>
                                                </div>
                                            </div><br><br><br><br> --}}
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="button" class="btn btn-primary btn_submit"><i class="fa fa-floppy-o"></i> Update</button>
                                            </div>
                                        </form>
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
      
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('medical.report.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data: 'date', name: 'date'},
                {data: 'name', name: 'user.name'},
                {data: 'b_date', name: 'user.b_date', orderable: false, searchable: false},
                // {data: 'designation', name: 'designation'},
                
                {data: 'complain', name: 'complain'},
                {data: 'dressing', name: 'dressing'},
                {data: 'medicine_details', name: 'medicine_details', orderable: false, searchable: false },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
        
    $('.yajra-datatable').on('click', '.edit_report', function(){
            x = $(this).attr("data-medical_report");
            $("#complain").val($(this).attr("data-complain"));
            $("#dressing").val($(this).attr("data-dressing"));
            $("#medicine_details").val($(this).attr("data-medicine_details"));
            $("#medical_report").val(x);
            $("#medical_id").val($(this).attr("data-id"));
        });
        $('.yajra-datatable').on('click', '.delete_report', function(){

            $("#del_report").val($(this).attr("data-id"));
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".btn_submit").click(function(e){
                var id =  $("#medical_id").val();
                console.log(id);
                $.ajax({
                    type:'POST',
                    url:"/admin/medical_report/"+id,
                    data:jQuery('#frm').serialize(),
                    success:function(data){
                        // console.log(data);
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
                var id =  $("#del_report").val();
                // console.log(id);
                $.ajax({
                    type:'POST',
                    url:"/admin/medical_report/"+id,
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
</script>
    
@endsection
