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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
      
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('medical.report.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data: 'date', name: 'date'},
                {data: 'name', name: 'name'},
                {data: 'b_date', name: 'b_date'},
                // {data: 'designation', name: 'designation'},
                {data: 'dressing', name: 'dressing'},
                {data: 'complain', name: 'complain'},
                {data: 'medicine_details', name: 'medicine_details' },
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
            // console.log($(this).attr("data-id"));
            $("#storage_id").html($(this).attr("data-id"));
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
