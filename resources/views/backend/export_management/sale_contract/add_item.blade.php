
@extends('backend.master')
@section('site-title')
   Export Management
@endsection
@section('style')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold form-inline">Export Management
                <small> Sales Contract </small>
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
                                <i class="fa fa-briefcase"></i>Add Item
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body" style="height: auto;">
                            <div class="row" style="margin-top:2%">
                                <form class="form-horizontal" role="form" method="post" action="{{route('export.sales.add.item')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="sales_contract_id" id="sales_contract_id">
                                    <div class="form-body">
                                        <div class="form-section">
                                            <label class="col-md-2 control-label pull-left bold">Select Buyer:<span class="required">* </span> </label>
                                            <div class="col-md-10">
                                                <span class="form-control buyer_select selectpicker" data-live-search="true" name="export_buyer_id" data-buyer_id={{$sale_contracts->export_buyer->id}} required>
                                                   {{$sale_contracts->export_buyer->buyer_name}}
                                                </span>
                                            </div>
                                        </div><br><br>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <input type="hidden" value="" id="provided_item" name="provided_item">
                                                <input type="hidden" name="sales_contract_id" value="{{$sales_contract_id}}">
                                                <div class="col-md-3">
                                                    <label class="control-label" for="product">Consignment Type<span class="required">* </span></label>
                                                    <select class="form-control consignment_type" name="consignment_type" id="consignment_type">
                                                        <option value="">--Select--</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label" for="product">Hs Code</label>
                                                    <input class="form-control hs_code" type="Number" id="hs_code" name="hs_code" placeholder="HS Code" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label">Processing Type :</label>
                                                    <select class="form-control type" name="processing_type" id="type">
                                                        <option value="">--Select--</option>
                                                        <option value="iqf">IQF</option>
                                                        <option value="vegetable_iqf">Vegetable/Fruit IQF</option>
                                                        <option value="block_frozen">Block Frozen</option>
                                                        <option value="vegetable_block">Vegetable/Fruit Block</option>
                                                        <option value="dry_fish">Dry Fish</option>
                                                        <option value="raw_bf_shrimp">Raw BF(Shrimp)</option>
                                                        <option value="raw_iqf_shrimp">Raw IQF(Shrimp)</option>
                                                        <option value="semi_iqf">Semi IQF</option>
                                                        <option value="cooked_iqf_shrimp">Cooked IQF(Shrimp)</option>
                                                        <option value="blanched_iqf_shrimp">Balanched IQF(Shrimp)</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label" >Variant :</label>
                                                    <select class="form-control varient" name="processing_variant" id="variant">
                                                        <option value="">--Select--</option>
                                                        <option class="iqf" value="fillet">Fillet</option>
                                                        <option class="iqf" value="whole">Whole</option>
                                                        <option class="iqf" value="whole_gutted">Whole Gutted</option>
                                                        <option class="iqf" value="cleaned">Cleaned</option>
                                                        <option class="iqf" value="sliced_fmly_cut">Sliced(Family Cut)</option>
                                                        <option class="iqf" value="sliced_chinese_cut">Sliced(Chinese Cut)</option>
                                                        <option class="iqf" value="butter_fly">Butter Fly</option>
                                                        <option class="iqf" value="hgto">HGTO</option>
                                                        <option class="vegetable_iqf" value="cut_n_clean">Cut & Clean</option>
                                                        <option class="vegetable_iqf" value="whole">Whole</option>
                                                        <option class="vegetable_iqf" value="whole_n_clean">Whole & Clean</option>
                                                        <option class="block_frozen" value="whole">Whole</option>
                                                        <option class="block_frozen" value="clean">Clean</option>
                                                        <option class="block_frozen" value="slice">Slice</option>
                                                        <option class="vegetable_block" value="cut_n_clean">Cut & Clean</option>
                                                        <option class="vegetable_block" value="whole">Whole</option>
                                                        <option class="vegetable_block" value="whole_n_clean">Whole & Clean</option>
                                                        <option class="dry_fish" value="regular">Regular</option>
                                                        <option class="raw_bf_shrimp" value="hlso">HLSO</option>
                                                        <option class="raw_bf_shrimp" value="pud">PUD</option>
                                                        <option class="raw_bf_shrimp" value="p_n_d">P & D</option>
                                                        <option class="raw_bf_shrimp" value="pdto">PDTO</option>
                                                        <option class="raw_bf_shrimp" value="pto">PTO</option>
                                                        <option class="raw_iqf_shrimp" value="hlso">HLSO</option>
                                                        <option class="raw_iqf_shrimp" value="pud">PUD</option>
                                                        <option class="raw_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                        <option class="raw_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                        <option class="raw_iqf_shrimp" value="special_cut_p_n_d">Special Cut P&D</option>
                                                        <option class="raw_iqf_shrimp" value="hlso_easy_pell">HLSO Easy Pell</option>
                                                        <option class="raw_iqf_shrimp" value="butterfly_pud_skewer">Butterfly/PUD Skewer</option>
                                                        <option class="raw_iqf_shrimp" value="pud_pull_vein">PUD Pull Vein</option>
                                                        <option class="semi_iqf" value="hoso">HOSO</option>
                                                        <option class="semi_iqf" value="hoto">HOTO</option>
                                                        <option class="cooked_iqf_shrimp" value="hoso">HOSO</option>
                                                        <option class="cooked_iqf_shrimp" value="pud">PUD</option>
                                                        <option class="cooked_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                        <option class="cooked_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                        <option class="blanched_iqf_shrimp" value="hoso">HOSO</option>
                                                        <option class="blanched_iqf_shrimp" value="pud">PUD</option>
                                                        <option class="blanched_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                        <option class="blanched_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="product">Item<span class="required">* </span></label>
                                                    <select class="form-control" id="item_name" name="supply_item_id">
                                                        <option value="">--Select--</option>
                                                        @foreach ($items as $supply_item)
                                                            <option value="{{$supply_item->id}}">{{$supply_item->name}}</option>
                                                        @endforeach 
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label" for="product">MC/Pack Size<span class="required">* </span></label>
                                                    <select class="form-control pack_size"  id="pack_size" name="pack_size">
                                                        <option value="">--Select--</option>
                                                        @foreach ($export_pack_sizes as $pack_size)
                                                            <option data-weight="{{$pack_size->weight}}" value="{{$pack_size->id}}">{{$pack_size->name}}</option>
                                                        @endforeach 
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label" for="product">Quantity Of Cartons<span>* </span></label>
                                                    <input class="form-control cartons_qty" type="Number" name="cartons" id="cartons" placeholder="Quantity Of Cartons">
                                                </div>
                                                <div class="col-md-3 grade_id">
                                                    <label class="control-label" for="product">Grade <span class="required">* </span></label>
                                                    <select class="form-control" id="grade" name="grade">
                                                        <option value="">--Select--</option>
                                                        @foreach ($grades as $grade)
                                                            <option value="{{$grade->id}}">{{$grade->name}}</option>  
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="block_damage">
                                                    <div class="col-md-4">
                                                        <label>Block Size :</label>
                                                        <select name="block_size_id" id="block_size_id" name="block_size_id" class="form-control" >
                                                            <option value="">--Select--</option>
                                                            @foreach ($block_size as $block)
                                                                <option value="{{$block->id}}">{{$block->block_size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Block Quantity :</label>
                                                        <input class="form-control" type="number" name="block_quantity" id="block_quantity">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Fish Size :</label>
                                                        <select name="fish_grade" id="fish_grade" name="fish_grade" class="form-control" >
                                                            <option value="">--Select--</option>
                                                            @foreach ($fish_size as $size)
                                                                <option value="{{$size->id}}">{{$size->size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="control-label" for="product">Total In KG<span >* </span></label>
                                                    <input class="form-control total_in_kg" type="number" step="0.01" id="total_in_kg" placeholder="Total In KG" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label" for="product">Per KG Rate ($)<span class="required">* </span></label>
                                                    <input class="form-control rate_per_kg" type="number" name="rate" step="0.01" id="rate" placeholder="Per Kg Rate">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label" for="product">Total Amount ($)<span class="required">* </span></label>
                                                    <input class="form-control total_amount" type="Number" step="0.01" id="total_amount" placeholder="Total Amount ($)" readonly>
                                                </div>
                                                
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                                    <i class="fa fa-plus"></i>	Submit </button>
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
    </div>
@endsection
@section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
        $(".block_damage").hide();
        $( ".type" ).change(function() {
            console.log('good');
            if($(this).val() == "block_frozen" || $(this).val() == "semi_iqf" || $(this).val() == "vegetable_block" || $(this).val() == "raw_bf_shrimp" ){
                $(".block_damage").show();
                $(".grade_id").hide();
            }
            else
            {
                $(".block_damage").hide();
                $(".grade_id").show();
            }
        });
        //$("#add_items").prop("disabled",true);
        var grand_total = 0;
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
        $('.buyer_all_details').hide();
       $('.buyer_select').on('load',function () {
            $('.buyer_all_details').show();
            console.log($(this).find(':selected').attr('data-buyer_id'));
            var buyer_id = $(this).find(':selected').attr('data-buyer_id'); 
            if (buyer_id == 0) {
                $('.buyer_all_details').hide();
            }
            $.ajax({
            type:"POST",
            url:"{{route('sale_contract.ex_buyer_datapass')}}",
            data:{
                'id' : buyer_id,
                '_token' : $('input[name=_token]').val()
            },
            success:function(data){
                console.log(data);
                var option = '';
                var option_bank = '';
                var buyer_name = data.buyer_name;
                console.log(data);
                $('.buyer_details').html("<span><b>"+data.buyer_name+"</b></span><p>"+data.buyer_address+"</p>");
                $('.consignee_details').html("<span><b>"+data.consignee_name+"</b></span><p>"+data.consignee_address+"</p>");
                $('.notify_details').html("<span><b>"+data.notify_party_name+"</b></span><p>"+data.notify_party_address+"</p>");
                $.each( data.assign_hs_code, function( key, product ) {
                    console.log(product);
                    option += '<option data-hs_code="'+ product.hs_code + '" value="'+ product.consignment_type + '">' + product.consignment_type + '</option>';
                    // $(".consignment_type").html("<option value='"+product.consignment_type+"'>"+product.consignment_type+"</option>");
                });
                $('.consignment_type').append(option);
                $('.consignment_type').on('change',function () {
                    var hs_code = $(this).find(':selected').attr('data-hs_code');
                    $('.hs_code').val(hs_code);
                });
                $.each( data.bank_details, function( key, bank ) {
                    option_bank += '<option data-a_C_no="'+ bank.a_C_no + '" data-a_c_name="'+ bank.a_c_name + '"data-bank_country="'+ bank.bank_country + '" data-branch="'+ bank.branch + '" value="'+ bank.bank_name + '">' + bank.bank_name + '</option>';
                    // $(".consignment_type").html("<option value='"+product.consignment_type+"'>"+product.consignment_type+"</option>");
                });
                $('.imporeter_bank_name').append(option_bank);


            }
        });
       });
       function total_weight() {
        var cartons_qty =0;
        var pack_weight =0;
        var rate_per_kg = 0;
            $('.cartons_qty').on('keyup change',function () {
                    cartons_qty = $(this).val();
                    $('.total_in_kg').val(parseFloat(pack_weight*cartons_qty));
                    $('.total_amount').val(parseFloat((pack_weight*cartons_qty)*rate_per_kg));
            });
            $('.pack_size').on('change',function () {
                    pack_weight = $(this).find(':selected').attr('data-weight'); 
                    console.log(pack_weight);
                    $('.total_in_kg').val(parseFloat(pack_weight*cartons_qty));
                    $('.total_amount').val(parseFloat((pack_weight*cartons_qty)*rate_per_kg));
            });
            $('.rate_per_kg').on('keyup change',function () {
                    rate_per_kg = $(this).val();
                    $('.total_in_kg').val(parseFloat(pack_weight*cartons_qty));
                    $('.total_amount').val(parseFloat(pack_weight*cartons_qty)*parseFloat(rate_per_kg));
            });
       }
       total_weight();
       $(".varient").chained(".type");

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
        $("#block_size_id").val(null);
        $("#block_quantity").val(null);
        $("#fish_grade").val(null);
        $("#pack_size").val(null);
        $("#cartons").val(null);
        $("#total_in_kg").val(null);
        $("#rate").val(null);
        $("#total_amount").val(null);
        }
        console.log($("#consignment_type").val());
    if (($("#consignment_type").val())!=null &&  ( $("#hs_code").val()) != null && $("#type").val()!=null &&  $("#variant").val()!=null &&  $("#item_name").val()!=null &&  $("#grade").val() != null && $("#pack_size").val()!=null && $("#cartons").val()!=null &&  $("#total_in_kg").val()!=null && $("#rate").val()!=null && $("#total_amount").val()!=null && $("#block_size_id").val()!=null && $("#block_quantity").val()!=null && $("#fish_grade").val()!=null ) {
        $("#add_items").prop("disabled",false);
    }
    $("#add_items").click(function(){
        $("table#mytable tbody tr").empty();
        console.log('good');
        console.log($("#product").val());
        var cif_rate = 0;
        var cfr_rate = 0;
        cfr_rate = $('#cfr_rate').val();
        cif_rate = $('#cif_rate').val();
        if (cfr_rate>0 ) {
            var total_amount_cfr = 0;
            var total_cfr_rate = (parseFloat($("#total_in_kg").val())*parseFloat(cfr_rate));
            total_amount_cfr = (parseFloat($("#total_amount").val()) + parseFloat(total_cfr_rate));
            grand_total += total_amount_cfr;
            items_array.push({"consignment_type":$("#consignment_type").val(),"hs_code":$("#hs_code").val(),"type":$("#type").val(),"item_name":$("#item_name").val(),"variant":$("#variant").val(),"grade":$("#grade").val(),"block_size_id":$("#block_size_id").val(),"block_quantity":$("#block_quantity").val(),"fish_grade":$("#fish_grade").val(),"pack_size":$("#pack_size").val(),"cartons":$("#cartons").val(),"total_in_kg":$("#total_in_kg").val(),"rate":$("#rate").val(),"freight_rate":cfr_rate,"total_cfr_rate":total_cfr_rate,"total_cif_rate":"N/A","total_amount":$("#total_amount").val(),"total_amount_cfr":total_amount_cfr,"total_amount_cif":"N/A","status":"stay"});
        }
        else if (cif_rate>0  ) {
            var total_amount_cif = 0; 
            var total_cif_rate = (parseFloat($("#total_in_kg").val()) * parseFloat(cif_rate));
            total_amount_cif = (parseFloat($("#total_amount").val()) + parseFloat(total_cif_rate));
            grand_total += total_amount_cif;
            items_array.push({"consignment_type":$("#consignment_type").val(),"hs_code":$("#hs_code").val(),"type":$("#type").val(),"item_name":$("#item_name").val(),"variant":$("#variant").val(),"grade":$("#grade").val(),"block_size_id":$("#block_size_id").val(),"block_quantity":$("#block_quantity").val(),"fish_grade":$("#fish_grade").val(),"pack_size":$("#pack_size").val(),"cartons":$("#cartons").val(),"total_in_kg":$("#total_in_kg").val(),"rate":$("#rate").val(),"freight_rate":cif_rate,"total_cfr_rate":"N/A","total_cif_rate":total_cif_rate,"total_amount":$("#total_amount").val(),"total_amount_cfr":"N/A","total_amount_cif":total_amount_cif,"status":"stay"});
        }
        else{
        items_array.push({"consignment_type":$("#consignment_type").val(),"hs_code":$("#hs_code").val(),"type":$("#type").val(),"item_name":$("#item_name").val(),"variant":$("#variant").val(),"grade":$("#grade").val(),"block_size_id":$("#block_size_id").val(),"block_quantity":$("#block_quantity").val(),"fish_grade":$("#fish_grade").val(),"pack_size":$("#pack_size").val(),"cartons":$("#cartons").val(),"total_in_kg":$("#total_in_kg").val(),"rate":$("#rate").val(),"freight_rate":"N/A","total_cfr_rate":"N/A","total_cif_rate":"N/A","total_amount":$("#total_amount").val(),"total_amount_cfr":"N/A","total_amount_cif":"N/A","status":"stay"});
        }
        grand_total += parseFloat($("#total_amount").val());
        $('.grand_total').val(grand_total);
            $("#provided_item").val('');
            $("#provided_item").val(JSON.stringify(items_array));
            $.each( items_array, function( key, item ) {
                // console.log(item);
                if (item.status == "stay") {
                        $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+item.consignment_type+"</td><td>"+item.hs_code+"</td><td>"+item.type+"</td><td>"+item.item_name+"</td><td>"+item.variant+"</td><td>"+item.grade+"</td><td>"+item.block_size_id+"</td><td>"+item.block_quantity+"</td><td>"+item.fish_grade+"</td><td>"+item.pack_size+"</td><td>"+item.cartons+"</td><td>"+item.total_in_kg+"</td><td>"+item.rate+"</td><td>"+item.freight_rate+"</td><td>"+item.total_cfr_rate+"</td><td>"+item.total_cif_rate+"</td><td>"+item.total_amount+"</td><td>"+item.total_amount_cfr+"</td><td>"+item.total_amount_cif+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
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
    $('.paid_in_percentage').keyup(function () {
        console.log(grand_total);
        var percentage = (parseFloat(grand_total)*($(this).val()/100))
        var ab = (parseFloat(grand_total)-(percentage));
        $('#due_amount').val(parseFloat(ab));    
    });
    $('.paid_in_amount').keyup(function () {
        console.log($(this).val());
        var amount = $(this).val();
        var ac = (parseFloat(grand_total)-(amount));
        $('#due_amount').val(parseFloat(ac));
    });
    $('.advising_bank').on('change',function () {
        $('.advising_bank_account_no').val($(this).find(':selected').attr('data-account_number'));
        $('.advising_bank_swift_code').val($(this).find(':selected').attr('data-swift_code'));
    });

    $('.imporeter_bank_name').on('change',function() {
        $('.importer_account_name').val($(this).find(':selected').attr('data-a_c_name'));
        $('.importer_account_no').val($(this).find(':selected').attr('data-a_c_no'));
        $('.importer_bank_branch').val($(this).find(':selected').attr('data-branch'));
        $('.bank_country').val($(this).find(':selected').attr('data-bank_country'));
    });
        
    });
</script>


@endsection



