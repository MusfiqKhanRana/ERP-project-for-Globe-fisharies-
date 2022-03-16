
@extends('backend.master')
@section('site-title')
   Block Frozen
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
                            <li style="margin-bottom:5px;" class="active"><a href="#tab_a" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_b" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Clean</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_c" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Slice</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            @include('backend.production.processing.block_frozen.whole.index')
                            @include('backend.production.processing.block_frozen.clean.index')
                            @include('backend.production.processing.block_frozen.slice.index')
                            <!--------Whole Modals---------->
                            @include('backend.production.processing.block_frozen.whole.modals.processData')
                            @include('backend.production.processing.block_frozen.whole.modals.blocking')
                            @include('backend.production.processing.block_frozen.whole.modals.blockCounter')
                            @include('backend.production.processing.block_frozen.whole.modals.excessVolume')
                            @include('backend.production.processing.block_frozen.whole.modals.WastageReturn')
                            <!--------Clean Modals----------->
                            @include('backend.production.processing.block_frozen.clean.modals.processData_b')
                            @include('backend.production.processing.block_frozen.clean.modals.blocking_b')
                            @include('backend.production.processing.block_frozen.clean.modals.blockCounter_b')
                            @include('backend.production.processing.block_frozen.clean.modals.excessVolume_b')
                            @include('backend.production.processing.block_frozen.clean.modals.WastageReturn_b')
                            <!-------Slice Modals------------>
                            @include('backend.production.processing.block_frozen.slice.modals.processData_c')
                            @include('backend.production.processing.block_frozen.slice.modals.blocking_c')
                            @include('backend.production.processing.block_frozen.slice.modals.blockCounter_c')
                            @include('backend.production.processing.block_frozen.slice.modals.excessVolume_c')
                            @include('backend.production.processing.block_frozen.slice.modals.WastageReturn_c')
                        </div><!-- tab content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.tiny.cloud/1/i2a8bjsghb2egjws1cli2w9fcs5ke9j47f8jhfky1sq28f5q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(function() {
        tinymce.init({
            selector: 'textarea',
            init_instance_callback : function(editor) {
                var freeTiny = document.querySelector('.tox .tox-notification--in');
                freeTiny.style.display = 'none';
            }
        });
    });
    
  </script>
@endsection



