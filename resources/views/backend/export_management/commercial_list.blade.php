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
            <h3 class="page-title bold form-inline" class="portlet box dark">Export Management   <small>Commercial List</small>
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
                <a class="btn btn-danger" href="{{route('commercial.list',"status=Pending")}}"><i class="fa fa-spinner"></i> Pending List ({{$pending_count}})</a>
                <a class="btn btn-success" href="{{route('commercial.list',"status=Approved")}}"><i class="fa fa-check"></i> Approve List ({{$approved_count}})</a><br><br>
                <!-- END PAGE TITLE-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Commercial List</div>
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
                                            @foreach ($sale_contracts as $key=> $abc)
                                                @if ($abc->commercial_status == "Approved")
                                                    <th>Invoice Details</th>
                                                    <th style="text-align: center">Documents</th>
                                                @endif
                                            @endforeach
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
                                                                <th>Total Amount</th>
                                                                @if ($sale_contract->commercial_status == "Pending")
                                                                    <th>Action</th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($sale_contract->sales_contract_items as $key2=> $item)
                                                            <tr>
                                                                <td>{{++$key2}}</td></td>
                                                                <td>{{$item->hs_code}}</td>
                                                                <td>{{$item->processing_type}}</td>
                                                                <td>{{$item->processing_variant}}</td>
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
                                                                <td>1000</td>
                                                                @if ($sale_contract->commercial_status == "Pending")
                                                                <td>
                                                                    <button class="btn btn-info"  data-toggle="modal" href="#editkModal">Edit</button>
                                                                    <button class="btn btn-danger"  data-toggle="modal" href="#deleteModal">Delete</button>
                                                                    {{-- @if($item->expiry_date !== null)
                                                                        <p class="label label-sm label-primary">N/A</p>
                                                                    @else --}}
                                                                    <button class="btn btn-success export_expiry_date" data-expiry_date="{{$item->expiry_date}}" data-route="{{route('commercial.list.expiry.date',$item->id)}}"  data-toggle="modal" href="#ExpiryDate">Expiry Date</button>
                                                                    {{-- @endif --}}
                                                                    
                                                                </td>
                                                                @endif
                                                            </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="7"><b>Total Master Carton & CFR Value</b></td>
                                                                <td><b>2000</b></td>
                                                                <td colspan="5"></td>
                                                                <td><b>4000</b></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td><span><b>Payment Method:</b><ul><li> {{$sale_contract->payment_method}}</li></ul></span><br><span><b>Advising Bank</b><ul><li>Bank Name: {{$sale_contract->advising_bank->bank_name}}</li><li>Account Number: {{$sale_contract->advising_bank->account_number}}</li>
                                                    <li>{{$sale_contract->advising_bank->branch_name}}</li><li>{{$sale_contract->advising_bank->branch_address}}</li><li>{{$sale_contract->advising_bank->swift_code}}</li></ul></span><br><span><b>Importer Bank: </b><ul><li>{{$sale_contract->importer_account_name}}</li>
                                                        <li>{{$sale_contract->bank_name}}</li><li>{{$sale_contract->importer_bank_branch}}</li><li>{{$sale_contract->importer_bank_country}}</li><li>{{$sale_contract->importer_account_no}}</li></ul></span></td>
                                                @if ($sale_contract->commercial_status == "Approved")
                                                    <td><span><b>Date Of Commercial</b><ul><li>{{$sale_contract->date}}</li></ul></span><br>
                                                    <span><b>Exp No.</b><ul><li>{{$sale_contract->exp_no}}</li></ul></span><br> <span><b>Exp Date</b><ul><li>{{$sale_contract->exp_date}}</li></ul></span><br> <span><b>CBM</b><ul><li>{{$sale_contract->cbm}}</li></ul></span><br> <span><b>Production Date</b><ul><li>{{$sale_contract->production_date}}</li></ul></span><br>
                                                    <span><b>Net Weight (kg)</b><ul><li>{{$sale_contract->net_weight}}</li></ul></span><br><span><b>Gross Weight</b><ul><li>{{$sale_contract->gross_weight}}</li></ul></span><br></td>
                                                        <td>
                                                            <table class="table table-bordered table-hober table-striped" style="overflow: scroll;">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Title</th>
                                                                        <th>Document File</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($sale_contract->documents as $item)
                                                                        <tr>
                                                                            <td>{{$item->title}}</td>
                                                                            <td>{{$item->document}}
                                                                                {{-- <embed src="{{ Storage::url($item->document->file_path) }}" style="width:600px; height:800px;" frameborder="0"></td> --}}
                                                                            <td>
                                                                                <button class="btn btn-info">Edit</button>
                                                                                <button class="btn btn-danger">Delete</button>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </td>

                                                @endif
                                                <td>
                                                    @if ($sale_contract->commercial_status == "Pending")
                                                        <button class="btn btn-success commercial_approve" data-toggle="modal" data-route="{{route('commercial.list.approve',$sale_contract->id)}}" data-id="{{$sale_contract->id}}"  href="#ApproveModal">Approve</button>
                                                    
                                                        <button class="btn btn-info commercial_invoice" data-route="{{route('commercial.list.invoice',$sale_contract->id)}}" data-id="{{$sale_contract->id}}" data-exp_no="{{$sale_contract->exp_no}}"
                                                            data-exp_date="{{$sale_contract->exp_date}}" data-cbm="{{$sale_contract->cbm}}" data-production_date="{{$sale_contract->production_date}}" data-net_weight="{{$sale_contract->net_weight}}" data-gross_weight="{{$sale_contract->gross_weight}}" data-toggle="modal" href="#editInvoice">Edit Invoice Details</button>
                                                        <button class="btn blue document"  data-id="{{$sale_contract->id}}" data-toggle="modal" href="#AddDocument">+  Add Document</button>
                                                    
                                                        <a class="btn red-flamingo" href="{{route('commercial.list.print',$sale_contract->id)}}">print</a>
                                                    @endif
                                                    @if ($sale_contract->commercial_status == "Approved")
                                                        <a class="btn btn-danger" href="{{route('commercial.list.print',$sale_contract->id)}}">Print Invoice</a>
                                                        <button class="btn btn-info">Print Packing List</button>
                                                        <button class="btn btn-success">View Document</button>
                                                        <a class="btn btn-primary" href="{{route('certificate.origin.print',$sale_contract->id)}}">Print Certificate Of Origin</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
                                <div id="editInvoice" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title" style="text-align: center"><b>Invoice Details</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" role="form" method="post" action="" id="commercial_invoice_id">
                                                    {{csrf_field()}}
                                                    {{method_field('post')}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-3 control-label">EXP No :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control invoice_exp_no" value="" required name="exp_no">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-3 control-label">EXP Date :</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control invoice_exp_date" value="" required name="exp_date">
                                                        </div><br><br>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Date :</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control" value="" required name="date">
                                                        </div><br><br>
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-3 control-label">CBM :</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control invoice_cbm" value="" required name="cbm">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Production Date :</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control invoice_production_date" value="" required name="production_date">
                                                        </div><br><br>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Expiry Date :</label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control" value="" required name="expiry_date">
                                                        </div><br><br>
                                                    </div> --}}
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Net Weight :</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control invoice_net_weight" value="" required name="net_weight">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Gross Weight :</label>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control invoice_gross_weight" value="" required name="gross_weight">
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
                                <div id="AddDocument" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Add Document</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" method="post" action="{{route('commercial.export.document')}}" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('post')}}
                                                    <input type="hidden" id="sales_contract_id" name="sales_contract_id">
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Document Title</label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" value="" required name="title">
                                                        </div><br><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputEmail1" class="col-md-2 control-label">Uplaod Document</label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control" value="" required name="document">
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
                                    {{-- {{csrf_field()}}
                                    <input type="hidden" value="" id=""> --}}
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
                                                    <a href="" id="approve_commercial"><button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Approve</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="SendSaleContract" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(15, 17, 17);">Are you sure Send To sales Contrac?</h2>
                                            </div>
                                            <div class="modal-footer " >
                                                <div class="d-flex justify-content-between">
                                                    <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                </div>
                                                <div class="caption pull-right">
                                                    <form action="{{--route('',[$data->id])--}}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="btn btn-success" id="approve"><i class="fa fa-check"></i>  Send</button>               
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
    </div>
@endsection
@section('script')
 <script type="text/javascript">
    $(function () {
        $(".commercial_approve").click(function(){
            $('#approve_commercial').attr('href', $(this).data('route'));
        });

        $(".commercial_invoice").click(function(){
            $('#commercial_invoice_id').attr('action', $(this).data('route'));
            $('.invoice_exp_no').val($(this).attr('data-exp_no'));
            $('.invoice_exp_date').val($(this).attr('data-exp_date'));
            $('.invoice_cbm').val($(this).attr('data-cbm'));
            $('.invoice_production_date').val($(this).attr('data-production_date'));
            $('.invoice_net_weight').val($(this).attr('data-net_weight'));
            $('.invoice_gross_weight').val($(this).attr('data-gross_weight'));
        });

        $(".document").click(function(){
            $("#sales_contract_id").val($(this).data('id'));
        });

        $(".export_expiry_date").click(function(){
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
