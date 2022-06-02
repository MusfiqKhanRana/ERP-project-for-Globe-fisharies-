@extends('backend.master')
@section('site-title')
   Chill Room
@endsection 
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold form-inline" class="portlet box dark">Production Management
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
                <!-- END PAGE TITLE-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Chill Room</div>
                        <div class="tools"> </div>
                    </div>
                        <div class="portlet-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item active">
                                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#stockdetails" role="tab" aria-controls="home" aria-selected="true">Total Stock</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#stockdetails" role="tab" aria-controls="profile" aria-selected="false">Stock Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#stockdetails" role="tab" aria-controls="profile" aria-selected="false">dfh Details</a>
                                  </li>
                              </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade" id="totalstock" role="tabpanel" aria-labelledby="home-tab">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Invoice No.
                                                </th>
                                                <th>
                                                    Added In Chill Room
                                                </th>
                                                <th>
                                                    Items
                                                </th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                           <tr>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                           </tr>
                                       </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="stockdetails" role="tabpanel" aria-labelledby="profile-tab">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Invoice No.
                                                </th>
                                                <th>
                                                    Added In Chill Room
                                                </th>
                                                <th>
                                                    Items
                                                </th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                           <tr>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                           </tr>
                                       </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

