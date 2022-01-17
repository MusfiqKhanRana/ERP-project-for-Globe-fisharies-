@extends('backend.master')
@section('site-title')
    Requisition
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

                
<div class="container mt-5">
    <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>sl.</th>
                <th>Frozen Storage No</th>
                <th>Temp(<sup>0</sup>C)(DDT)</th>
                <th>Temp(<sup>0</sup>C)(DTS)</th>
                <th>Master Carton No</th>
                <th>Commodity & Count</th>
                <th>Date Of Production</th>
                <th>Block Core Temp(<sup>0</sup>C)</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
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
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'cold_storage_id', name: 'cold_storage_id'},
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
      
    });
  </script>
    
@endsection