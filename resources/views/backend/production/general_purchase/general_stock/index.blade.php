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
                                <th>Item Type</th>
                                <th>Item Name</th>
                                <th>Item Unit</th>
                                <th>Quantity</th>
                                <th>Specification</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr id="row1">
                                    <td class="text-align: center;">1232</td>
                                    <td class="text-align: center;">17/07/2022</td>
                                    <td class="text-align: center;">IQF</td>
                                    <td class="text-align: center;">pangas</td>
                                    <td class="text-align: center;">20</td>
                                    <td class="text-align: center;">100</td>
                                    <td class="text-align: center;">Good</td>
                                    <td style="text-align: center">
                                        <a class="btn btn-danger"  data-toggle="modal" href="#damaged_Modal"><i class="fa fa-print"></i>  Print</a>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                        <div id="transfer_Modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" method="post" action="#">
                                        {{csrf_field()}}
                                        <input type="hidden" name="inputs" class="inputs">
                                        <input type="hidden" name="production_processing_unit_id" class="production_processing_unit_id">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h2 class="modal-title" style="color: rgb(75, 65, 65);">Transfer Stock</h2>
                                    </div>
                                    <br>
                                    <div class="modal-body">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Storage :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="" class="form-control" id="">
                                                    <option value="">--Select Storage--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Pack Size(CNT) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="" class="form-control" id="">
                                                    <option value="">--Select Zone--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Avaiable Stock(CNT) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                5
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Avaiable Stock(KG) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                50
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Transfer Quantity(CNT) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="Type qty" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Transfer Quantity(KG) :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="System will auto calculate" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Transferred For :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <select name="" class="form-control" id="">
                                                    <option value="">--Select Client--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" />
                                            <label class="form-check-label" for="inlineCheckbox1">Transfer this stock having vacuum packed</label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        <div id="damaged_Modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" method="post" action="#">
                                        {{csrf_field()}}
                                        <input type="hidden" name="inputs" class="inputs">
                                        <input type="hidden" name="production_processing_unit_id" class="production_processing_unit_id">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h2 class="modal-title" style="color: rgb(75, 65, 65);">Damage Info</h2>
                                    </div>
                                    <br>
                                    <div class="modal-body">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Item Name :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <p><b>Pangus</b></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Item Grade :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <p><b>300-500gm/3pcs</b></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Damaged :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="text" placeholder="Type Damaged Quantity" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Image :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <input type="file" placeholder="Upoad attachment" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p>Remark :</p>
                                            </div>
                                            <div class="col-md-8" >
                                                <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                        
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
