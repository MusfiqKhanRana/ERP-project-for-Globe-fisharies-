@extends('backend.master')
@section('site-title')
    Add Requisition
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <h3 class="page-title bold">Purchase Management
            </h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Quotation List
                </div>
                    {{-- <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#add_procution_purchase_units">
                            Add New
                        <i class="fa fa-plus"></i> </a>
                    </div> --}}
                    <div class="tools">
                    </div>
                </div>
            </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Department</th>
                                <th>Requested By</th>
                                <th>Remark</th>
                                <th>Items</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr id="row1">
                                    <td>1</td>
                                    <td>Laravel</td>
                                    <td>Sohel</td>
                                    <td>This is test </td>
                                    <td>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Sl.
                                                    </th>
                                                    <th>
                                                        Item Details
                                                    </th>
                                                    <th>
                                                        Demand Date
                                                    </th>
                                                    <th>
                                                        Quantity
                                                    </th>
                                                    <th>
                                                       Specification
                                                    </th>
                                                    <th>
                                                        Remark
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Pen</td>
                                                    <td>20/04/2022</td>
                                                    <td>100</td>
                                                    <td>10 Days Return policy</td>
                                                    <td> This is good</td>
                                                    <td>
                                                        <a  href="{{route('production.purchase.cs.show')}}" class="btn btn-success">Confirm Quotation</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="add_supply" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h2 class="modal-title">Add Supplier for Requisition</h2>
                                                    </div>
                                                    <form class="form-horizontal" role="form" method="post" action="#">
                                                        {{csrf_field()}}
                                                        <div class="row" style="margin: 3%" >
                                                            <p ><b>Item name:</b> Pen</p>
                                                            <p ><b>Department:</b> Laravel</p>
                                                            <p ><b>Request By:</b> Sohel</p>
                                                            <p ><b>Demand Date:</b> 20/04/2022</p>
                                                        </div>
                                                        
                                                        <hr>
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        S.l
                                                                    </th>
                                                                    <th></th>
                                                                    <th>Supplier Name</th>
                                                                    <th>Price</th>
                                                                    <th>Speciality</th>
                                                                    <th>Negotiable Price</th>
                                                                    <th>Remark</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        1
                                                                    </td>
                                                                    <td>
                                                                        <input type="radiobox">
                                                                    </td>
                                                                    <td>Globe</td>
                                                                    <td>100</td>
                                                                    <td>6 Months Warranty</td>
                                                                    <td>
                                                                        <input type="text" placeholder="Price">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" placeholder="Remark">
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <button class="btn orange">Reject</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td style="text-align: center">
                                        <a class="btn btn-success"  data-toggle="modal" href="{{route('production-purchase-requisition.status_confirm',$data->id)}}"><i class="fa fa-edit"></i> Confirm</a> 
                                        <a class="btn btn-success"  data-toggle="modal" href="#confirm{{$data->id}}"><i class="fa fa-edit"></i> Confirm</a>
                                        <a class="btn btn-info"  data-toggle="modal" href="#edit_procution_purchase_units{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn red" data-toggle="modal" href="#delete_procution_purchase_units{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                    </td> --}}
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

