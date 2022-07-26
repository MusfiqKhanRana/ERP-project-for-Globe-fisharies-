
@extends('backend.master')
@section('site-title')
   Export Management
@endsection
@section('css')
<style>
    hr.class-1 {
        border-top: 1px dashed #8c8b8b;
    }
</style>
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold form-inline">Export Management
                <small>Add Consignment</small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                {{-- <a class="btn blue-ebonyclay pull-right" data-toggle="modal" href="#basic">
                    Metal Detector List
                    <i class="fa fa-plus"></i>
                </a> --}}
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Add Consignment
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body" style="height: auto;">
                            <form class="form-horizontal" role="form" method="post" action="">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-section">
                                        <label class="col-md-2 control-label pull-left bold">Select Buyer:<span class="required">* </span> </label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="buyer_id" required></select>
                                        </div>
                                    </div><br><br>
                                </div>
                                {{-- <input type="hidden" name="production_processing_unit_id" value="{{$production_processing_unit_id}}"> --}}
                                <div class="row" style="margin-top:2%">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Shipping Info</b></h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Port Of Loading <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="port_of_loading" placeholder="Part Of Loading" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Pre-Carring By<span class="required">* </span></label>
                                                        <select class="form-control" name="pre_carring_by" >
                                                            <option value="">--Select--</option>
                                                            <option value="By Air">By Air</option>
                                                            <option value="By Sea">By Sea</option>
                                                            <option value="By Road">By Road</option>
                                                            <option value="By Rail">By Rail</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="product">Port Of Discharge<span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="port_of_discharge" placeholder="Part Of Discharge" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Final Destination<span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="final_destination" placeholder="Final Destination" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="product">Shipment Date <span class="required">* </span></label>
                                                        <input type="date" class="form-control" name="shipment_date" placeholder="Shipment Date" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Packaging Responsibility<span class="required">* </span></label>
                                                        <select class="form-control" name="packaging_responsibility">
                                                            <option value="">--Select--</option>
                                                            <option value="Globe Fisheries Ltd">Globe Fisheries Ltd</option>
                                                            <option value="Buyer">Buyer</option>
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-md-4">
                                                        <label class="control-label" for="product">HS Code <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="hs_code" placeholder="HS Code" required>
                                                    </div> --}}
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="product">Partial Shipment<span class="required">* </span></label>
                                                        <select class="form-control" name="partial_shipment">
                                                            <option value="">--Select--</option>
                                                            <option value="Allowed">Allowed</option>
                                                            <option value="Not Allowed">Not Allowed</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="Tarns Shipment">Tarns Shipment <span class="required">* </span></label>
                                                        <select class="form-control" name="trans_shipment" placeholder="Tarns Shipment">
                                                            <option value="">--Select--</option>
                                                            <option value="Allowed">Allowed</option>
                                                            <option value="Not Allowed">Not Allowed</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="product">Shipping Responsibility<span class="required">* </span></label>
                                                        <select class="form-control" name="shipping_responsibility" id="shipping_responsibility">
                                                            <option value="">--Select--</option>
                                                            <option value="FOB">FOB</option>
                                                            <option value="CFR">CFR</option>
                                                            <option value="CIF">CIF</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    <div class="col-md-4 cfr_rate">
                                                        <label class="control-label" for="product">CFR Rate (Per KG)<span class="required">* </span></label>
                                                        <input type="number" class="form-control" id="cfr_rate" name="cfr_rate">
                                                    </div>
                                                    <div class="col-md-4 cif_rate">
                                                        <label class="control-label" for="product">CIF Rate (Per KG)<span class="required">* </span></label>
                                                        <input type="number" class="form-control" id="cif_rate" name="cif_rate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="control-label" for="product">Shipment Remark<span class="required">* </span></label>
                                                    <textarea class="form-control" name="shipment_remark" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="class-1">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Item Info</b></h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <input type="hidden" value="" id="provided_item" name="provided_item">
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="product">Consignment Type<span class="required">* </span></label>
                                                        <select class="form-control" name="consignment_type" id="consignment_type">
                                                            <option value="test">test</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="product">Hs Code</label>
                                                        <input class="form-control" type="Number" name="hs_code" id="hs_code" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="product">Type<span class="required">* </span></label>
                                                        <select class="form-control" name="processing_type" id="type">
                                                            <option value="test">test</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="product">Variant<span class="required">* </span></label>
                                                        <select class="form-control" name="processing_variant" id="variant">
                                                            <option value="test">test</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="product">Item<span class="required">* </span></label>
                                                        <select class="form-control" name="item_name" id="item_name">
                                                            <option value="test">test</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="product">Grade <span class="required">* </span></label>
                                                        <select class="form-control" name="grade" id="grade">
                                                            <option value="200-400">200-400</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="product">Pack Size<span class="required">* </span></label>
                                                        <select class="form-control" name="pack_size" id="pack_size">
                                                            <option value="3kg">3kg</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="product">Quantity Of Cartons<span class="required">* </span></label>
                                                        <input class="form-control" type="Number" name="cartons" id="cartons" placeholder="Quantity Of Cartons" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Total In KG<span class="required">* </span></label>
                                                        <input class="form-control" type="text" name="total_in_kg" id="total_in_kg" readonly>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Per KG Rate ($)<span class="required">* </span></label>
                                                        <input class="form-control" type="text" name="rate" id="rate" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="product">Total Amount ($)<span class="required">* </span></label>
                                                        <input class="form-control" type="Number" name="total_amount" id="total_amount" readonly>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label ></label>
                                                        <button type="button"  class="btn btn-success" id="add_items">+  Add </button>
                                                    </div> 
                                                </div>
                                            </div><br>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <table  class="table table-striped table-bordered table-hover" id="mytable">
                                                        <tr>
                                                            <th>Consignment Type</th>
                                                            <th>Hs Code</th>
                                                            <th>Type</th>
                                                            <th>Item</th>
                                                            <th>Variant</th>
                                                            <th>Grade</th>
                                                            <th>Pack SIze</th>
                                                            <th>Cartons Quantity</th>
                                                            <th>Total In KG</th>
                                                            <th>Per KG Rate ($)</th>
                                                            <th>Freight Rate Per Kg</th>
                                                            <th>Total CRF Rate</th>
                                                            <th>Total Amount (Excluding CRF Rate)</th>
                                                            <th>Total Amount (Including CFR Rate)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
            
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="class-1">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Payment Info</b></h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Payment Method<span class="required">* </span></label>
                                                        <select class="form-control" name="payment_method" id="">
                                                            <option value="">--Select--</option>
                                                            <option value="T.T at Sight">T.T at Sight</option>
                                                            <option value="T.T in Advance">T.T in Advance</option>
                                                            <option value="L.C at Sight">L.C at Sight</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Grand Total</label>
                                                        <input type="number" class="form-control" name="grand_total" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="paid"> Paid Amount </label>
                                                        <span class="paid_in_percentage">
                                                            <input type="number" class="form-control" name="paid_in_percentage"  placeholder="Paid in %" id="percentage_id"/>
                                                        </span>
                                                        <span class="paid_in_amount">
                                                            <input type="number" class="form-control" name="paid_in_amount" placeholder="Paid in amount" id="amount_id"/>
                                                        </span>
                                                        <fieldset class="radio-inline question coupon_question2">
                                                            <input class="form-check-input want_in_amount" type="checkbox">Want in Amount ? 
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Due Amount<span class="required">* </span></label>
                                                        <input type="number" class="form-control" name="due_amount" readonly>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Advising Bank <span class="required">* </span></label>
                                                        {{-- <input type="text" class="form-control" name="" placeholder="Country" required> --}}
                                                        <select class="form-control country" name="advising_bank">
                                                            <option value=""></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Advising Bank A/C No.<span class="required">* </span></label>
                                                        <input type="number" class="form-control" name="advising_bank_account_no">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Advising Bank Swift Code<span class="required">* </span></label>
                                                        <input type="number" class="form-control" name="advising_bank_swift_code" placeholder="Advising Bank Swift Code">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Bank Charge <span class="required">* </span></label>
                                                        <input type="text" class="form-control" name="bank_charge" placeholder="Bank Charge" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="control-label" for="product">Offer Validity<span class="required">* </span></label>
                                                        <input type="number" class="form-control" name="offer_validity" placeholder="Offer Validity">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="class-1">
                                <div class="card-header">
                                    <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Importer Bank Info</b></h4>
                                </div>
                                <div class="form-group" style="padding:2%">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="control-label" for="">Importer Bank <span class="required">* </span></label>
                                            <input type="text" class="form-control" placeholder="Importer Bank" id="bank_name" name="imporeter_bank_name">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="">Importer A/C Name <span class="required">* </span></label>
                                            <input type="text" class="form-control" placeholder="Importer A/C Name" name="importer_account_name">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" for="">Importer A/C No. <span class="required">* </span></label>
                                            <input type="number" class="form-control" placeholder="Importer A/C No."  name="importer_account_no">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="control-label" for="branch">Importer Bank Branch <span class="required">* </span></label>
                                            <input type="text" class="form-control" placeholder="Importer Bank Branch" name="importer_bank_branch">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label"for="country">Country <span class="required">* </span></label>
                                            <select class="form-control country" name="importer_bank_country" id="bank_country">
                                                {{-- <option value="">--Select Country--@include('backend.export_management.manage_buyer.country')</option> --}}
                                            </select>
                                            {{-- <input type="text" class="form-control" placeholder="Country" id="bank_country" name=""> --}}
                                        </div> 
                                                                    
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label" for="">Remark</label>
                                        <textarea class="form-control" name="remark" ></textarea>
                                    </div>
                                </div><br>
                                <div class="form-actions">
                                    <div class="col-md-2 pull-right">
                                        <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-plus"></i>  Submit</button>
                                    </div>
                                    <div class="row"><div class=" pull-right ">
                                        <a class="btn blue" style="background-color:#29931D"  href="{{ url()->previous() }}"><i class="fa fa-backward"></i>  Cancel</a>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

  <script type="text/javascript">
    $(document).ready(function () {
        $("#shipping_responsibility").change(function()
            {
            if($(this).val() == "CFR")
            {
            $(".cfr_rate").show();
            }
            else
            {
            $(".cfr_rate").hide();
            }
            if($(this).val() == "CIF")
            {
            $(".cif_rate").show();
            }
            else
            {
            $(".cif_rate").hide();
            }
        });

        $(".cfr_rate").hide();
        $(".cif_rate").hide();

       
        $.ajax({
                type:"GET",
                url:"https://restcountries.com/v3.1/all",
                success:function(data){
                    console.log(data);
                    $(".country").empty();
                    $.each( data, function( key, country ) {
                        $('.country').append($('<option>', {
                            value: country.id,
                            text: country.name.common
                        }));
                    });
                }
        });
    $('.paid_in_amount').hide();
    $(".want_in_amount").click(function() {
        if($(this).is(":checked")) {
            $(".paid_in_amount").show();
            $(".paid_in_percentage").hide();
            $('#percentage_id').val('');
            paid_in_percentage = 0;
        } else {
            $(".paid_in_amount").hide();
            $(".paid_in_percentage").show();
            paid_in_amount = 0;
            $('#amount_id').val('');
        }
    });            
    var items_array = [];
    function nullmaking(){
        $("#consignment_type").val(null);
        $("#hs_code").val(null);
        $("#type").val(null);
        $("#variant").val(null);
        $("#item_name").val(null);
        $("#grade").val(null);
        $("#pack_size").val(null);
        $("#cartons").val(null);
        $("#total_in_kg").val(null);
        $("#rate").val(null);
        $("#total_amount").val(null);
        }
    $("#add_items").click(function(){
        console.log($("#product").val());
            items_array.push({"consignment_type":$("#consignment_type").val(),"hs_code":$("#hs_code").val(),"type":$("#type").val(),"item_name":$("#item_name").val(),"variant":$("#variant").val(),"grade":$("#grade").val(),"pack_size":$("#pack_size").val(),"cartons":$("#cartons").val(),"total_in_kg":$("#total_in_kg").val(),"rate":$("#rate").val(),"total_amount":$("#total_amount").val(),"status":"stay"});
            $("#provided_item").val('');
            $("#provided_item").val(JSON.stringify(items_array));
            $.each( items_array, function( key, item ) {
                // console.log(item);
                if (item.status == "stay") {
                    if(items_array.length-1 == key){
                        $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+item.consignment_type+"</td><td>"+item.hs_code+"</td><td>"+item.type+"</td><td>"+item.item_name+"</td><td>"+item.variant+"</td><td>"+item.grade+"</td><td>"+item.pack_size+"</td><td>"+item.cartons+"</td><td>"+item.total_in_kg+"</td><td>"+item.rate+"</td><td>"+item.total_amount+"</td><td></td><td></td><td></td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                    }
                }
            });
            $(".delete_item").click(function(){
                items_array[$(this).data("id")].status="delete";
                // console.log(product_array,$(this).data("id"));
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $("#"+$(this).data("id")).remove();
            });
            nullmaking();
    });
        
    });
</script>


@endsection



