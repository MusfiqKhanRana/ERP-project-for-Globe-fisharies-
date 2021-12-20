
@extends('backend.master')
@section('site-title')
   User List
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Menu
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
            {{-- <div class="col-md-12">
                <div class="col-md-12"> --}}
                    <div class="portlet-body" style="height: auto;">
                        <div class="row">
                            {{-- <div class="col-md-12">
                                @include('backend.party.index')
                            </div> --}}
                            <div class="col-md-6">
                                @include('backend.users_type.index')
                            </div>
                            <div class="col-md-6">
                                @include('backend.pack.index')
                            </div>
                            <div class="col-md-6">
                                @include('backend.area.index')
                            </div>
                        </div>
                    </div>
                {{-- </div>
            </div>  --}}
        </div>
    </div>
@endsection