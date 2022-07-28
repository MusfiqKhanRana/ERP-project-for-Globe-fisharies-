@extends('backend.master')
@section('site-title')
    General purchase
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">General Purchase
                <small> General Stock </small>
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
                <i class="fa fa-briefcase"></i>General Stock
                </div>
                </div>
                <div class="portlet-body">
                    <div>
                        <div class="row" style="margin-bottom: 2%">
                            <div class="col-md-12">
                                <label for="inputEmail1" class="col-md-1 control-label">Name</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="" id="">
                                        <option value="">test1</option>
                                        <option value="">test2</option>
                                    </select>
                                </div>
                                <label for="inputEmail1" class="col-md-1 control-label">Name</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="" id="">
                                        <option value="">test1</option>
                                        <option value="">test2</option>
                                    </select>
                                </div>
                            </div><br><br><br>
                            <div class="col-md-12">
                                <label for="inputEmail1" class="col-md-1 control-label">Form Date</label>
                                <div class="col-md-5">
                                    <input type="date" class="form-control" placeholder="Type Item name">
                                </div>
                                <label for="inputEmail1" class="col-md-1 control-label">To Date</label>
                                <div class="col-md-5">
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-10">
                                
                            </div>
                            <div>

                            </div>
                        </div>
                    </div> <hr>
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Requisition No.</th>
                                <th>Receive Date</th>
                                <th style="text-align: center">General Item Details</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr id="row1">
                                    <td class="text-align: center;">1232</td>
                                    <td class="text-align: center;">17/07/2022</td>
                                    <td>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Item Type</th>
                                                    <th>Item Name</th>
                                                    <th>Item Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Specification</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-align: center;">IQF</td>
                                                    <td class="text-align: center;">pangas</td>
                                                    <td class="text-align: center;">20</td>
                                                    <td class="text-align: center;">100</td>
                                                    <td class="text-align: center;">Good</td>
                                                    <td>
                                                        <button class="btn btn-flamingo">Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> 
                                    </td>
                                    <td style="text-align: center">
                                        <a class="btn btn-danger"  href={{--route('#')--}}><i class="fa fa-print"></i>  Print</a>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{-- {{ $ppu->links('vendor.pagination.custom') }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
@endsection
