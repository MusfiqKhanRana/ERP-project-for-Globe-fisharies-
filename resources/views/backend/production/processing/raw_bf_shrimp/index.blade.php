
@extends('backend.master')
@section('site-title')
    Medicine Report
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark"><b>Production Management</b>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                        <ul class="nav nav-pills nav-stacked col-md-2">
                            <li style="margin-bottom:5px;" class="active"><a href="#hlso" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#pud" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#p_n_d" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#cleaned" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PDTO</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#sliced_fmly" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PTO</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                                @include('backend.production.processing.iqf.fillet.index')
                                @include('backend.production.processing.iqf.whole.index')
                                @include('backend.production.processing.iqf.whole_gutted.index')
                                @include('backend.production.processing.iqf.cleaned.index')
                                @include('backend.production.processing.iqf.sliced_fmly.index')
                                @include('backend.production.processing.iqf.sliced_chinese.index')
                                @include('backend.production.processing.iqf.butter_fly.index')
                                @include('backend.production.processing.iqf.hgto.index')
                        </div><!-- tab content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(function() {
    });
    
  </script>
@endsection