@extends('backend.master')
@section('site-title')
    inventory store-in
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
            <h3 class="page-title bold">Requisition
                <small> Requisition-managment </small>
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
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Store-In List
                </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Type</th>
                                <th>Varient</th>
                                <th>Grade</th>
                                <th>Quantity(kg)</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ppu as $key=> $data)
                                    <tr id="row1">
                                        <td class="text-align: center;"> {{$data->production_processing_item->name}}</td>
                                        <td class="text-align: center;"> {{$data->processing_name}}</td>
                                        <td class="text-align: center;"> {{$data->processing_variant}}</td>
                                        <td class="text-align: center;"> 
                                            @foreach ($data->production_processing_grades as $item)
                                                @if ($item->block_name != null)
                                                    <li>Block : {{$item->block_name}} KG</li>
                                                    <li>Block Size: {{$item->block_size}}</li>
                                                @endif
                                                @if ($item->grade_id != null)
                                                    <li>Grade Name : {{$item->grade_name}}</li>
                                                @endif
                                                @if ($item->grade_id == null && $item->block_id == null)
                                                    <p style="color: red">Not Selected</p>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="text-align: center;"> {{$data->alive_quantity+$data->dead_quantity}}</td>
                                        <td style="text-align: center">
                                            @if ($data->store_in_status=='Initial')
                                                <a class="btn btn-info"  data-toggle="modal" href="{{route('microbiological.test.report.genarate',$data->id)}}"><i class="fa fa-edit"></i>QC Form</a>
                                            @endif
                                            @if ($data->store_in_status=='QC_checked')
                                                <a class="btn btn-success"  data-toggle="modal" href="{{route('metal-detector.show',$data->id)}}"><i class="fa fa-edit"></i>MD Form</a>
                                            @endif
                                            @if ($data->store_in_status=='MD_checked')
                                                <a class="btn green"  data-toggle="modal" href="{{route('metal-detector.show',$data->id)}}"><i class="fa fa-edit"></i>Move to Store</a>
                                            @endif
                                        </td>
                                    </tr>                       
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{ $ppu->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
@endsection
@section('script')

@endsection