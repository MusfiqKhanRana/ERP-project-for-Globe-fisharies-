
@extends('backend.master')
@section('site-title')
   Export Configuration
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Configuration Page
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
                <div class="portlet-body" style="height: auto;">
                    <div class="row">
                        {{-- <div class="col-md-6">
                            @include('backend.export_management.configuration.export_pack_size.index')
                        </div> --}}
                    </div>
                </div>
        </div>
    </div>
@endsection