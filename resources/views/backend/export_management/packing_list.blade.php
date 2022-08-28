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
            <h3 class="page-title bold form-inline" class="portlet box dark">Export Management   <small>Packing Pending List</small>
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
                    <a class="btn btn-danger" href="{{route('packing.list',"status=Pending")}}"><i class="fa fa-spinner"></i> Pending List ({{$pending_count}})</a>
                    <a class="btn btn-success" href="{{route('packing.list',"status=Approved")}}"><i class="fa fa-check"></i> Approve List ({{$approved_count}})</a>
                    <a class="btn btn-info" href="{{route('packing.list',"status=RequestApproval")}}"><i class="fa fa-check"></i> Rerquest Approval List ({{$request_approval_count}})</a><br><br>                
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
                                                                <th>Ready Product</th>
                                                                @if ($sale_contract->packing_status == "Approved")
                                                                    <th>Net Weight</th>
                                                                    <th>Gross Weight</th>
                                                                @endif
                                                                @if ($sale_contract->packing_status == "Pending")
                                                                    <th style="text-align: center">Action</th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($sale_contract->sales_contract_items as $key2=> $item)
                                                                @php
                                                                    $itme_array= $item->toArray();
                                                                @endphp
                                                                <tr>
                                                                    <td>{{++$key2}}</td></td>
                                                                    <td>{{$item->hs_code}}</td>
                                                                    <td>
                                                                        @php
                                                                            $replace = str_replace("_"," ",$item->processing_type);
                                                                        @endphp
                                                                        {{ucwords($replace)}}
                                                                    </td>
                                                                    <td>{{ucfirst($item->processing_variant)}}</td>
                                                                    <td>{{$item->supply_item->name}}</td>
                                                                    <td>{{$itme_array['fish_grade']['name']}}</td>
                                                                    <td>Pangasius Hypophtalmus</td>
                                                                    <td>{{$item->cartons}}</td>
                                                                    <td>{{$item->export_pack_size->name}}</td>
                                                                    <td>300</td>
                                                                    @if ($sale_contract->packing_status == "Approved")
                                                                        <td>100</td>
                                                                        <td >200</td>
                                                                    @endif
                                                                    @if ($sale_contract->packing_status == "Pending")
                                                                        <td>
                                                                            {{-- @if($item->expiry_date !== null)
                                                                                <p class="label label-sm label-primary">N/A</p>
                                                                            @else --}}
                                                                                <button class="btn btn-info packing_expiry_date" data-expiry_date="{{$item->expiry_date}}"  data-route="{{route('packing.list.expiry.date',$item->id)}}"  data-toggle="modal" href="#ExpiryDate">Add Expiry Date</button>
                                                                            {{-- @endif --}}
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
                                                    @if ($sale_contract->packing_status == "Approved")
                                                        @if ($sale_contract->disburse_shipment_status == "Yes")
                                                            <button class="btn btn-success disburseShipment" data-route="{{route('disburse.shipment.confirm',$sale_contract->id)}}" data-id="{{$sale_contract->id}}" data-toggle="modal" href="#Disburse">Disburse Shipment</button>
                                                        @endif
                                                        <button class="btn btn-info RequestApproval" data-route="{{route('request.approval.confirm',$sale_contract->id)}}" data-toggle="modal" href="#RequestApproval">Request for Approval</button>
                                                        <a class="btn red-flamingo" href="{{route('packing.list.print',$sale_contract->id)}}">print</a>
                                                    @endif

                                                    @if ($sale_contract->packing_status == "RequestApproval")
                                                        <button class="btn btn-info shipmentApproval"  data-route="{{route('disburse.shipment.approval',$sale_contract->id)}}" data-toggle="modal" href="#ShipmentApproval">Approve</button>
                                                        <button class="btn btn-danger">Reject</button>
                                                    @endif
                                                    @if ($sale_contract->packing_status == "Pending")
                                                        <button class="btn green packing_approve" data-route="{{route('packing.list.approve',$sale_contract->id)}}" data-id="{{$sale_contract->id}}" data-toggle="modal" href="#ApproveModal">Submit</button>
                                                        <a class="btn red-flamingo" href="{{route('packing.list.print',$sale_contract->id)}}">print</a>
                                                        <button class="btn btn-info production_date_pack" data-toggle="modal" href="#ProductionDate" data-route="{{route('packing.list.production.date',$sale_contract->id)}}" >Add Production Date</button>
                                                        <button class="btn btn-success packing_grossWeight" data-route="{{route('packing.list.gross.weight',$sale_contract->id)}}"  data-toggle="modal" href="#GrossWeight">Add Gross Weight</button>
                                                    @endif
                                                    
                                                    
                                                    {{-- <a class="btn red-flamingo" href="{{route('packing.list.print',$sale_contract->id)}}">print</a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
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
                                                    <a href="" id="approve_packing"><button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Approve</button></a></form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ShipmentApproval" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                    <a href="" id="approve_shipment"><button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Approve</button></a></form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="RequestApproval" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                    <a href="" id="request_approval"><button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Approve</button></a></form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Disburse" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                                <div class="caption pull-right">
                                                    <a href="" id="disburse_shipment"><button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</button></a></form>
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
                                                <form class="form-horizontal" method="post" action="" id="packing_production_date">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Production Date</label>
                                                        <div class="col-md-8">
                                                            @foreach ($sale_contracts as $date)
                                                                <input type="date" class="form-control"  name="packing_production_date" value="{{$date->packing_production_date}}">
                                                            @endforeach
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
                                                <form class="form-horizontal" role="form" method="post" action="" id="expiry_date">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Expiry Date</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control expiry_date"  name="expiry_date">
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
                                                <form class="form-horizontal" role="form" method="post" action="" id="packing_gross_weight">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Gross Weight</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control"  name="packing_gross_weight">
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
<script type="text/javascript">
    $(function () {
        $(".packing_approve").click(function(){
            
            $('#approve_packing').attr('href', $(this).data('route'));
        });

        $(".shipmentApproval").click(function(){
            
            $('#approve_shipment').attr('href', $(this).data('route'));
        });

        $(".disburseShipment").click(function(){
            
            $('#disburse_shipment').attr('href', $(this).data('route'));
        });

        $(".RequestApproval").click(function(){
            
            $('#request_approval').attr('href', $(this).data('route'));
        });


        $(".production_date_pack").click(function(){
            $('#packing_production_date').attr('action', $(this).data('route'));
           //console.log($(this).data('route'));
        });

        $(".packing_grossWeight").click(function(){
            $('#packing_gross_weight').attr('action', $(this).data('route'));
           console.log($(this).data('route'));
        });

        $(".packing_expiry_date").click(function(){
            if ($(this).data('expiry_date')) {
                $('.expiry_date').val($(this).data('expiry_date'));
            }else{
                $('.expiry_date').val('');
            }
            $('#expiry_date').attr('action', $(this).data('route'));
        });
    });
</script>
@endsection
