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
            ajax: "{{ route('temp.monitoring.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                // {data: 'cold_storage_id', name: 'cold_storage_id'},
                {data: 'storage_name', name: 'storage_name'},
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
       
        $('.delete').click(function() {
            alert( "Handler for .click() called." );
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