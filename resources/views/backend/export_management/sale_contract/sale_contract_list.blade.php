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
            <h3 class="page-title bold form-inline" class="portlet box dark">Export Management  <small>Sale Contract List</small>
            {{-- <button type="button" class="btn dark pull-right " >Create Report <i class= 'fa fa-plus'> </i> </button> --}}
           
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
                <a class="btn btn-danger" href="{{route('sale_contract.index',"status=Pending")}}"><i class="fa fa-spinner"></i> Pending List ({{$pending_count}})</a>
                <a class="btn btn-success" href="{{route('sale_contract.index',"status=Approved")}}"><i class="fa fa-check"></i> Approve List ({{$approved_count}})</a><br><br>
                <!-- END PAGE TITLE-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Sale Contract List</div>
                        <div class="tools"> </div>
                    </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-bordered " style="overflow: scroll;">
                                    <thead>
                                        <tr>
                                            <th>Sl.</th>
                                            <th>Sales Contract No</th>
                                            <th>Buyer Details</th>
                                            <th>Shipment Details</th>
                                            <th style="text-align: center">Order Details</th>
                                            <th>Payment Details</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sale_contracts as $key=> $sale_contract)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>GFL/EXP/DUBAI/HRA/01/2022/22</td>
                                                <td><span><b>Buyer</b><br><ul><li>{{$sale_contract->export_buyer->buyer_code}}</li><li>{{$sale_contract->export_buyer->buyer_name}}</li><li>{{$sale_contract->export_buyer->buyer_address}}</li>
                                                    <li>{{$sale_contract->export_buyer->buyer_contact_number}}</li><li>{{$sale_contract->export_buyer->buyer_email}}</li><li>{{$sale_contract->export_buyer->buyer_country}}</li></ul></span>
                                                    <span><b>Consignee</b></span><br><ul><li>{{$sale_contract->export_buyer->consignee_name}}</li><li>{{$sale_contract->export_buyer->consignee_address}}</li><li>{{$sale_contract->export_buyer->consignee_contact_number}}</li>
                                                    <li>{{$sale_contract->export_buyer->consignee_email}}</li><li>{{$sale_contract->export_buyer->consignee_country}}</li></ul><span><b>Notify Party</b></span><br><ul><li>{{$sale_contract->export_buyer->notify_party_name}}</li>
                                                        <li>{{$sale_contract->export_buyer->notify_party_address}}</li><li>{{$sale_contract->export_buyer->notify_party_contact}}</li><li>{{$sale_contract->export_buyer->notify_party_email}}</li><li>{{$sale_contract->export_buyer->notify_party_country}}</li></ul></li></ul></td>
                                                <td><span><b>Shipment Details</b><ul><li>{{$sale_contract->port_of_loading}}</li><li>{{$sale_contract->pre_carring_by}}</li><li> {{$sale_contract->port_of_discharge}}</li>
                                                    <li> {{$sale_contract->final_destination}}</li><li>{{$sale_contract->shipment_date}}</li><li>{{$sale_contract->packaging_responsibility}}</li><li> {{$sale_contract->partial_shipment}}</li>
                                                    <li>{{$sale_contract->trans_shipment}}</li><li>{{$sale_contract->shipping_responsibility}}</li><li>{{$sale_contract->cfr_rate}}</li><li> {{$sale_contract->cif_rate}}</li><li>{{$sale_contract->sale_contract}}</li></ul></span></td>
                                                <td>
                                                    <table class="table table-bordered table-hober table-striped" style="overflow: scroll;">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl.</th>
                                                                <th>HS Code</th>
                                                                <th>Type</th>
                                                                <th>Variant</th>
                                                                <th>Item</th>
                                                                <th>Grade</th>
                                                                <th>Scientific Name</th>
                                                                <th>Quantity / Master Carton</th>
                                                                <th>Pack Size</th>
                                                                <th>Rate Per KG CFR (USD $)</th>
                                                                <th>Rate per Master Carton CRF(USD $)</th>
                                                                <th>Rate Per KG CIR (USD $)</th>
                                                                <th>Rate per Master Carton CIF(USD $)</th>
                                                                @if ($sale_contract->status == "Pending")
                                                                    <th>Action</th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($sale_contract->sales_contract_items as $key2=> $item)
                                                            <tr>
                                                                <td>{{++$key2}}</td></td>
                                                                <td>{{$item->hs_code}}</td>
                                                                <td>
                                                                    @php
                                                                        $replace = str_replace("_"," ",$item->processing_type);
                                                                    @endphp
                                                                    {{ucwords($replace)}}</td>
                                                                <td>{{ucfirst($item->processing_variant)}}</td>
                                                                <td>{{$item->supply_item->name}}</td>
                                                                <td>{{$item->fish_grade->name}}</td>
                                                                <td>Pangasius Hypophtalmus</td>
                                                                <td>{{$item->cartons}}</td>
                                                                <td>{{$item->export_pack_size->name}}</td>
                                                                <td>
                                                                    @if($item->total_cfr_rate == 0)
                                                                    <p class="label label-sm label-primary">N/A</p>
                                                                    @else
                                                                        <span class="label label-sm label-success">{{$item->total_cfr_rate}}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($item->total_amount_cfr == 0)
                                                                    <p class="label label-sm label-primary">N/A</p>
                                                                    @else
                                                                        <span class="label label-sm label-success">{{$item->total_amount_cfr}}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($item->total_cif_rate == 0)
                                                                    <p class="label label-sm label-primary">N/A</p>
                                                                    @else
                                                                        <span class="label label-sm label-success">{{$item->total_cif_rate}}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($item->total_amount_cif == 0)
                                                                    <p class="label label-sm label-primary">N/A</p>
                                                                    @else
                                                                        <span class="label label-sm label-success">{{$item->total_amount_cif}}</span>
                                                                    @endif
                                                                </td>
                                                                @if ($sale_contract->status == "Pending")
                                                                    <td>
                                                                        <button class="btn btn-info"  data-toggle="modal" href="#editkModal">Edit</button>
                                                                        <button class="btn btn-danger delete_item" data-route="{{route('sales.contract.item.delete',$item->id)}}" data-toggle="modal" href="#deleteModal">Delete</button>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td><span><b>Payment Method:</b><ul><li> {{$sale_contract->payment_method}}</li></ul></span><br><span><b>Advising Bank</b><ul><li>Bank Name: {{$sale_contract->advising_bank->bank_name}}</li><li>Account Number: {{$sale_contract->advising_bank->account_number}}</li>
                                                    <li>{{$sale_contract->advising_bank->branch_name}}</li><li>{{$sale_contract->advising_bank->branch_address}}</li><li>{{$sale_contract->advising_bank->swift_code}}</li></ul></span><br><span><b>Importer Bank: </b><ul><li>{{$sale_contract->importer_account_name}}</li>
                                                        <li>{{$sale_contract->bank_name}}</li><li>{{$sale_contract->importer_bank_branch}}</li><li>{{$sale_contract->importer_bank_country}}</li><li>{{$sale_contract->importer_account_no}}</li></ul></span></td>
                                                <td>
                                                    @if ($sale_contract->status == "Pending")
                                                        <button class="btn btn-success approve_sale_contract" data-toggle="modal" data-route="{{route('sale.contract.approve',$sale_contract->id)}}" data-id="{{$sale_contract->id}}" href="#ApproveModal">Approve</button>
                                                        <a class="btn btn-info" data-toggle="modal" href="{{route('sale_contract.edit',$sale_contract->id)}}">Edit</a>
                                                        {{-- <a class="btn red-flamingo" href="{{route('sales.contract.print',$sale_contract->id)}}">print</a> --}}
                                                        <button class="btn blue" data-toggle="modal" href="#AddItemModal">+  Add Item</button>
                                                        <button class="btn btn-danger delete" data-route="{{route('sale_contract.destroy',$sale_contract->id)}}" data-id="{{$sale_contract->id}}" data-toggle="modal" href="#deleteallModal">Delete</button>
                                                    @else
                                                        <button class="btn btn-danger sales_revise" data-toggle="modal" href="#ReviceModal" data-route="{{route('sale_contract.list.revise',$sale_contract->id)}}">Revise</button>
                                                        {{-- <a class="btn red-flamingo" href="{{route('sales.contract.print',$sale_contract->id)}}">print</a> --}}
                                                    @endif
                                                    <a class="btn red-flamingo" href="{{route('sales.contract.print',$sale_contract->id)}}">print</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="deleteallModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <input type="hidden" value="" id="id">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                            </div>
                                            <div class="modal-footer " >
                                                <div class="d-flex justify-content-between">
                                                    <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                </div>
                                                <div class="caption pull-right">
                                                    <form action="" id="delete_sale_contract" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <input type="hidden" value="" id="id">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                            </div>
                                            <div class="modal-footer " >
                                                <div class="d-flex justify-content-between">
                                                    <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                </div>
                                                <div class="caption pull-right">
                                                    <form action="" id="delete_single_item" method="POST">
                                                        @csrf
                                                        <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="editkModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update Order Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">HS Code</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Description of Good</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Scientific Name</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Quantity/Master Carton</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Rate Per KG CRF(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Rate per Master Carton CRF(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Total Amount(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
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
                                <div id="ApproveModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            {{-- <input type="hidden" value="" id="id"> --}}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Doyou want to approve it?</h4>
                                            </div>
                                            <div >
                                                {{-- <form class="form-horizontal" action="" method="get" > --}}
                                                    {{-- {{csrf_field()}} --}}
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <a href="" id="approve_sale"><button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Approve</button></a>
                                                    </div>
                                                {{-- </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ReviceModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            {{-- <input type="hidden" value="" id="id"> --}}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Do you want to Revise it?</h4>
                                            </div>
                                            <div >
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <a href="" id="revice"><button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Submit</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ApproveModal1" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                <div id="AddItemModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update Order Details</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">HS Code</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Description of Good</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Scientific Name</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Quantity/Master Carton</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Rate Per KG CRF(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Rate per Master Carton CRF(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Total Amount(USD $)</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
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
                                <div id="editSaleContractModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Update Sale Contract List</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Buyer Details	</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Shipment Details	</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="test">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Payment Details</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="name">
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
@section('script')

<script src="https://cdn.tiny.cloud/1/uzb665mrkwi59olq2qu3cwqqyebsil4hznmwc45qu4exf7lt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>	

 <script type="text/javascript">
    $(function () {
        $(".approve_sale_contract").click(function(){
            // $("#id").val($(this).data('id'));
            $('#approve_sale').attr('href', $(this).data('route'));
           
            // console.log();
           //console.log($(this).data('id'));
        });

        $(".sales_revise").click(function(){
           
            $('#revice').attr('href', $(this).data('route'));
        });
        $(".delete").click(function(){
            $('#delete_sale_contract').attr('action', $(this).data('route'));
           
           // console.log($(this).data('route'));
        });

        $(".delete_item").click(function(){
            $('#delete_single_item').attr('action', $(this).data('route'));
           
            console.log($(this).data('route'));
        });

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('medical.report.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data: 'date', name: 'date'},
                {data: 'name', name: 'user.name'},
                {data: 'b_date', name: 'user.b_date', orderable: false, searchable: false},
                // {data: 'designation', name: 'designation'},
                
                {data: 'complain', name: 'complain'},
                {data: 'dressing', name: 'dressing'},
                {data: 'medicine_details', name: 'medicine_details', orderable: false, searchable: false },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
        
    $('.yajra-datatable').on('click', '.edit_report', function(){
            x = $(this).attr("data-medical_report");
            $("#complain").val($(this).attr("data-complain"));
            $("#dressing").val($(this).attr("data-dressing"));
            $("#medicine_details").val($(this).attr("data-medicine_details"));
            $("#medical_report").val(x);
            $("#medical_id").val($(this).attr("data-id"));
        });
        $('.yajra-datatable').on('click', '.delete_report', function(){

            $("#del_report").val($(this).attr("data-id"));
        });
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".btn_submit").click(function(e){
                var id =  $("#medical_id").val();
                console.log(id);
                $.ajax({
                    type:'POST',
                    url:"/admin/medical_report/"+id,
                    data:jQuery('#frm').serialize(),
                    success:function(data){
                        // console.log(data);
                        $('#editModal').modal('hide');
                        Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: data,
                                    showConfirmButton: false,
                                    timer: 1500
                        })
                        table.draw();
                    }
                });

            });
            $(".confirm_delete").click(function(e){
                var id =  $("#del_report").val();
                // console.log(id);
                $.ajax({
                    type:'POST',
                    url:"/admin/medical_report/"+id,
                    data:{"_method":"DELETE","id":id},
                    success:function(data){
                        // alert(data.success);
                        $('#deleteModal').modal('hide');
                        Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: data,
                                    showConfirmButton: false,
                                    timer: 1500
                        })
                        table.draw();
                    }
                });

            });
    });
  </script>
    
@endsection
