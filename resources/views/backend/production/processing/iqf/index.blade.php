
@extends('backend.master')
@section('site-title')
    IQF
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
                            <li style="margin-bottom:5px;" class="active"><a href="#fillet" data-id="fillet" class="fillet" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Fillet({{$fillet_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#whole" class="whole" data-id="whole" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole({{$whole_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#whole_gutted" class="whole_gutted" data-id="whole_gutted" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole Gutted({{$whole_gutted_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#cleaned" class="cleaned" data-id="cleaned" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Cleaned({{$cleaned_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#sliced_fmly" class="sliced_fmly" data-id="sliced_fmly" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Sliced(Family Cut) ({{$sliced_fmly_cut_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#sliced_chinese" class="sliced_chinese" data-id="sliced_chinese" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Sliced(Chinese Cut) ({{$sliced_chinese_cut_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#butter_fly" class="butter_fly" data-id="butter_fly" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Butter Fly({{$butter_fly_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#hgto" class="hgto" data-id="hgto" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HGTO({{$hgto_count}})</b></a></li>
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
    $(document).ready(function()
    {
        $('.fillet').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'fillet',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                }
        });
        });
        $('.whole').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'whole',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                }
        });
        });
        $('.whole_gutted').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'whole_gutted',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                }
        });
        });
        $('.cleaned').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'cleaned',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                }
        });
        });
        $('.sliced_fmly').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'sliced_fmly',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                }
        });
        });
        $('.sliced_chinese').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'sliced_chinese',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                }
        });
        });
        $('.butter_fly').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'butter_fly',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                }
        }); 
        });
        $('.hgto').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'hgto',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                }
        });
        });
    });
    
  </script>
@endsection



