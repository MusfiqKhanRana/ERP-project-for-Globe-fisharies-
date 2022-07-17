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
            <h3 class="page-title bold form-inline" class="portlet box dark">Export Management   <small>Packing Approve List</small>
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
                <h3>
                    <a class="btn btn-danger" href="{{route('packing_list')}}"> Pending List</a>
                </h3>
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
                                                            <th>Production Date</th>
                                                            <th>Expiry Date</th>
                                                            <th>Type</th>
                                                            <th>Item</th>
                                                            <th>Variant</th>
                                                            <th>Grade</th>
                                                            <th>Scientific Name</th>
                                                            <th>Quantity/Master Carton</th>
                                                            <th>Pack Size</th>
                                                            <th>Net Weight ( KG )</th>
                                                            <th>Gross Weight ( KG )</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>111222</td>
                                                            <td>07/07/2022</td>
                                                            <td>09/08/2022</td>
                                                            <td>IQF</td>
                                                            <td>Pangus</td>
                                                            <td>Gutted Clean</td>
                                                            <td>1 Kg Up</td>
                                                            <td>Scientific Name</td>
                                                            <td>100</td>
                                                            <td>3kg</td>
                                                            <td>20 Kg Up</td>
                                                            <td>200 kg</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>Lorem ipsum dolor sit amet <br>consectetur adipisicing elit. Delectus, et.</td>
                                            <td>
                                                <button class="btn btn-warning" data-toggle="modal" href="#GrossWeight">Disburse Shipment</button>
                                                <a class="btn red-flamingo" href={{route('print_packing_list')}}>print</a>
                                            </td>
                                       </tr>
                                    </tbody>
                                </table>
                                <div id="ApproveModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(15, 17, 17);">Are you Want to Approve it?</h2>
                                            </div>
                                            <div class="modal-footer " >
                                                <div class="d-flex justify-content-between">
                                                    <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                </div>
                                                <div class="caption pull-right">
                                                    <form action="{{--route('',[$data->id])--}}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="btn btn-success" id="approve"><i class="fa fa-check"></i>Approve</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ProductionDate" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Production Date</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="{{--route('')--}}">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Production Date</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control"  name="production_date">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                    </div>
                                                </form>
        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ExpiryDate" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Expiry Date</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="{{--route('# ')--}}">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Expiry Date</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control"  name="expiry_date">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                    </div>
                                                </form>
        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="GrossWeight" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Gross Weight</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="{{--route('')--}}">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Gross Weight</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control"  name="gross_weight">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                    </div>
                                                </form>
        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

