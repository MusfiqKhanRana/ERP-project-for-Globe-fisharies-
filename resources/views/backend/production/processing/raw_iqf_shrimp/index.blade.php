
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
                            <li style="margin-bottom:5px;"><a href="#tailon" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail Off</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tailoff" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail Off</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#specialcut" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Special Cut P & D</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#easypeel" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO Easy Peel</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#butterfly" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Butterfly/PUD Skewer</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#vein" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD Pull Vein</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                                @include('backend.production.processing.raw_iqf_shrimp.hlso.index')
                                @include('backend.production.processing.raw_iqf_shrimp.pud.index')
                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.index')
                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.index')
                                @include('backend.production.processing.raw_iqf_shrimp.special_cut.index')
                                @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.index')
                                @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.index')
                                @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.index')
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



