@extends('backend.master')
@section('site-title')
    Microbiological Test Report
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
            <h3 class="page-title bold">Report
                <small> Microbiological-Test </small>

                {{-- <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Add Requisition
                    <i class="fa fa-plus"></i>
                </a> --}}
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
                                <i class="fa fa-briefcase"></i>Report List
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
                                                Sl.
                                            </th>
                                            <th>
                                                Spacies Type
                                            </th>
                                            <th>
                                                Size/Count
                                            </th>
                                            <th>
                                                Party Name
                                            </th>
                                            <th>
                                                Date of Production
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reports as $key=> $data)
                                            <tr id="row1">
                                                <td>
                                                    {{++$key}}
                                                </td>
                                                <td>
                                                    {{$data->spacies_type}}
                                                </td>
                                                <td>
                                                    {{$data->size_count}}
                                                </td>
                                                <td>
                                                    {{$data->party_name}}
                                                </td>
                                                <td>
                                                    {{$data->date_of_production}}
                                                </td>
                                                <td> 
                                                    <a href="{{route('microbiological.test.report.details',$data->id)}}" class="btn btn-success">View Details</a>
                                                    <a href="{{route('microbiological-test.edit',$data->id)}}" class="btn btn-primary">Edit</a>
                                                    <a href="{{route('microbiological-test.destroy',$data->id)}}" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>                                            
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection
@section('script')
<script>

</script>
@endsection