
@extends('backend.master')
@section('site-title')
    Unload Report
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark"><b>Production Management</b>
                <small> Unload Unit Raw Item Check in </small>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            S.l
                                        </th>
                                        <th>
                                            Supplier Info
                                        </th>
                                        <th style="text-align: center">
                                            Item details
                                        </th>
                                        <th style="text-align: center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($production_requistion as $key=>$item)
                                    <tr>
                                        <td>
                                           {{++$key}}
                                        </td>
                                        <td>
                                            <span>{{$item->production_supplier->name}}</span><br>
                                            <span>{{$item->production_supplier->phone}}</span><br>
                                            <span>{{$item->production_supplier->address}}</span><br>
                                        </td>
                                        <td>
                                            @foreach ($item->production_requisition_items as $itemxx)
                                                <li>{{$itemxx->name}}</li>
                                                <li>{{$itemxx->grade->name}}</li>
                                                <li>{{$itemxx->pivot->quantity}}</li>
                                                <hr>
                                            @endforeach
                                        </td>
                                        <td>
                                            <button style="margin-bottom:3px" data-toggle="modal" href="#general_modal{{$item->id}}" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i>Check</button>
                                        </td>
                                    </tr>
                                    <div id="general_modal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form class="form-horizontal" role="form" method="post" action="{{route('production.unload.gateman.raw_item.check')}}">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="requisition_id" value="{{$item->id}}">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h2 class="modal-title" style="color: rgb(75, 65, 65);">General Item Check Item</h2>
                                                    </div>
                                                    <div class="modal-body">
                                                            @csrf
                                                        <p><b>Supplier Info:</b> {{$item->production_supplier->name}}</p>
                                                        <hr>
                                                        <div class="row">
                                                            <label for="inputEmail1" class="col-md-3 control-label">Vehicle Number :</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" name="vehicle_number" placeholder="Type Vehicle Number"><br>
                                                            </div>
                                                            <label for="inputEmail1" class="col-md-3 control-label">Challan No. :</label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" name="challan_number" placeholder="Type Challan No."><br>
                                                            </div>
                                                            <label for="inputEmail1" class="col-md-3 control-label">Remark :</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" class="form-control" name="remark" placeholder="Note"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
       jQuery(document).ready(function() {
            $("#printbtn").click(function () {
                $("#print").print();
            });
        });
    </script>
@endsection








