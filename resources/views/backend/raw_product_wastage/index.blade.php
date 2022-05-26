
@extends('backend.master')
@section('site-title')
Raw Product & Wastage Records
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Raw Product & Wastage Records
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
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Raw Product & Wastage List
                </div>
                    <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#addModal">
                            Add New Records
                        <i class="fa fa-plus"></i> </a>
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Date</th>
                                <th>Quantity (Kg)</th>
                                <th>Sale Quantity (Kg)</th>
                                <th>Transferred Quantity (Kg)</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr id="row1">
                                    <td></td>
                                    <td class="text-align: center;"></td>
                                    <td class="text-align: center;"></td>
                                    <td class="text-align: center;"></td>
                                    <td class="text-align: center;"></td>
                                    <td style="text-align: center">
                                        <a class="btn btn-info"  data-toggle="modal" href="#sale"><i class="fa fa-edit"></i> Sale</a>
                                        <a class="btn btn-success" data-toggle="modal" href="#transfer"><i class="fa fa-exchange"></i> Transfer to fish feed</a>
                                    </td>
                                </tr>
                                {{-- <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                            </div>
                                            <div class="modal-footer " >
                                                <div class="d-flex justify-content-between">
                                                    <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                </div>
                                                <div class="caption pull-right">
                                                    <form action="{{route('bonus.destroy',[$data->id])}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div id="sale" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Sale Wastage</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="{{--route('bonus.update', $data->id)--}}">
                                                    {{csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Bayer Name</label>
                                                            <input type="date" class="form-control" required name="name">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Contact Number</label>
                                                            <input type="text" class="form-control"  required name="contact_number" >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Quantity (Kg)</label>
                                                            <input type="number" class="form-control" required name="quantity" >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Unit Amount</label>
                                                            <input type="number" class="form-control"  required name="unit_amount" >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Sale Detail</label>
                                                            <input type="text" class="form-control"  name="detail">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="transfer" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title"> Transfer to Fish Feed</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="{{--route('')--}}">
                                                    {{csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Quantity (Kg)</label>
                                                            <input type="number" class="form-control" required name="quantity">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                            <input type="text" class="form-control"  required name="remark" >
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="addModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Bonus Record</h4>
                            </div><br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('raw_wastage.store')}}">
                                {{csrf_field()}}
            
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Form Date</label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">To Date</label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" name="date" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
