@extends('backend.master')
@section('site-title')
  Export Management
@endsection 
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold form-inline" class="portlet box dark">Export Management
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
                <a class="btn btn-danger" href=""><i class="fa fa-spinner"></i> Pending List </a>
                <a class="btn btn-success" href=""><i class="fa fa-check"></i> Approve List</a><br><br>
                <!-- END PAGE TITLE-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Packing List</div>
                        <div class="tools"> </div>
                    </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-bordered " style="overflow: scroll;">
                                    <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Invoice No.</th>
                                            <th>Buyer Details</th>
                                            <th>Shipment Details</th>
                                            <th style="text-align: center">Order Details</th>
                                            <th>Payment Details</th>
                                            <th>Invoice Details</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td>1</td>
                                            <td>GTCL-1233</td>
                                            <td>Lorem, ipsum dolor sit amet <br> consectetur adipisicing elit. Sunt, dolores?</td>
                                            <td>Lorem ipsum, dolor sit amet <br>consectetur adipisicing elit. Esse, adipisci.</td>
                                            <td>
                                                <table class="table table-bordered " style="overflow: scroll;">
                                                    <thead>
                                                        <tr>
                                                            <th>Sl.</th>
                                                            <th>HS Code</th>
                                                            <th>Description of Goods</th>
                                                            <th>Scientific Name</th>
                                                            <th>Quantity/Master Carton</th>
                                                            <th>Pack Size</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>111222</td>
                                                            <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, obcaecati.</td>
                                                            <td>Scientific Name</td>
                                                            <td>100</td>
                                                            <td>3kg</td>
                                                            <td>
                                                                <button class="btn btn-info">Add Production Date</button>
                                                                <button class="btn btn-danger">Add Expiry Date</button>
                                                                <button class="btn btn-warning">Add Gross Weight</button>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>Lorem ipsum dolor sit amet <br>consectetur adipisicing elit. Delectus, et.</td>
                                            <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, dignissimos!</td>
                                            <td>
                                                <button class="btn btn-success">Approve</button>
                                                <button class="btn btn-danger">print</button>
                                            </td>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

