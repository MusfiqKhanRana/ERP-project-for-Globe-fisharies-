
@extends('backend.master')
@section('site-title')
    IQF
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark"><b>Production Management</b>
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
                    <div class="portlet-body" style="height: auto;">
                        <ul class="nav nav-pills nav-stacked col-md-2">
                            <li style="margin-bottom:5px;" class="active"><a href="#cut_n_clean" data-id="cut_n_clean" class="cut_n_clean" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Cut & Clean({{$cut_n_clean_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#whole" class="whole" data-id="whole" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole({{$whole_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#whole_n_clean" class="whole_n_clean" data-id="whole_n_clean" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole & Clean({{$whole_n_clean_count}})</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                                @include('backend.production.vegetable_processing.iqf.cut_n_clean.index')
                                @include('backend.production.vegetable_processing.iqf.whole.index')
                                @include('backend.production.vegetable_processing.iqf.whole_n_clean.index')
                        </div><!-- tab content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function()
    {
        // $(".fillet_tbody").empty();
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'vegetable_iqf',
                    'sub_type' : 'cut_n_clean',
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#cut_n_clean_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        console.log(product);
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#cut_n_clean_washing_n_cuttingModal' class='btn btn-success washing_n_cutting'><i class='fa fa-refresh' aria-hidden='true'></i> Washing & Cutting</button></td></tr>");
                            $('.washing_n_cutting').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((qty) - a)/(qty))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Glazing") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_glazingModal' class='btn btn-info iqf_glazing'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var washing_n_cutting_weight =  $(this).attr("data-washing_n_cutting_weight");
                                var washing_n_cutting_date_time =  $(this).attr("data-washing_n_cutting_date_time");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $('.glazing_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                     var p = (((a -(washing_n_cutting_weight))/(a))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "RandW") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_return_n_wastageModal' class='btn btn-danger iqf_randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"' data-vegetable_glazing_weight='"+product.vegetable_glazing_weight+"' data-vegetable_glazing_datetime='"+product.vegetable_glazing_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var washing_n_cutting_weight =  $(this).attr("data-washing_n_cutting_weight");
                                var washing_n_cutting_date_time =  $(this).attr("data-washing_n_cutting_date_time");
                                var vegetable_glazing_weight =  $(this).attr("data-vegetable_glazing_weight");
                                var vegetable_glazing_datetime =  $(this).attr("data-vegetable_glazing_datetime");
                                console.log(vegetable_glazing_datetime);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $('.glazing_weight').html(vegetable_glazing_weight);
                                $('.glazing_date_time').html(vegetable_glazing_datetime);
                            });
                        }
                    });
                }
        });
        $('.cut_n_clean').on("load click",function() {
            // $(".fillet_tbody").empty();
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'vegetable_iqf',
                    'sub_type' : 'cut_n_clean',
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#cut_n_clean_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        console.log(product);
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#cut_n_clean_washing_n_cuttingModal' class='btn btn-success washing_n_cutting'><i class='fa fa-refresh' aria-hidden='true'></i> Washing & Cutting</button></td></tr>");
                            $('.washing_n_cutting').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((qty) - a)/(qty))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Glazing") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_glazingModal' class='btn btn-info iqf_glazing'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var washing_n_cutting_weight =  $(this).attr("data-washing_n_cutting_weight");
                                var washing_n_cutting_date_time =  $(this).attr("data-washing_n_cutting_date_time");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $('.glazing_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                     var p = (((a -(washing_n_cutting_weight))/(a))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "RandW") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_return_n_wastageModal' class='btn btn-danger iqf_randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"' data-vegetable_glazing_weight='"+product.vegetable_glazing_weight+"' data-vegetable_glazing_datetime='"+product.vegetable_glazing_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var washing_n_cutting_weight =  $(this).attr("data-washing_n_cutting_weight");
                                var washing_n_cutting_date_time =  $(this).attr("data-washing_n_cutting_date_time");
                                var vegetable_glazing_weight =  $(this).attr("data-vegetable_glazing_weight");
                                var vegetable_glazing_datetime =  $(this).attr("data-vegetable_glazing_datetime");
                                console.log(vegetable_glazing_datetime);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $('.glazing_weight').html(vegetable_glazing_weight);
                                $('.glazing_date_time').html(vegetable_glazing_datetime);
                            });
                        }
                    });
                }
            });
        });
        $('.whole').on("load click",function() {
            // $(".fillet_tbody").empty();
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'vegetable_iqf',
                    'sub_type' : 'whole',
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#whole_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        console.log(product);
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#whole_washing_n_cuttingModal' class='btn btn-success washing_n_cutting'><i class='fa fa-refresh' aria-hidden='true'></i> Washing & Cutting</button></td></tr>");
                            $('.washing_n_cutting').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((qty) - a)/(qty))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Glazing") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_glazingModal' class='btn btn-info iqf_glazing'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var washing_n_cutting_weight =  $(this).attr("data-washing_n_cutting_weight");
                                var washing_n_cutting_date_time =  $(this).attr("data-washing_n_cutting_date_time");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $('.glazing_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                     var p = (((a -(washing_n_cutting_weight))/(a))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "RandW") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_return_n_wastageModal' class='btn btn-danger iqf_randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"' data-vegetable_glazing_weight='"+product.vegetable_glazing_weight+"' data-vegetable_glazing_datetime='"+product.vegetable_glazing_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var washing_n_cutting_weight =  $(this).attr("data-washing_n_cutting_weight");
                                var washing_n_cutting_date_time =  $(this).attr("data-washing_n_cutting_date_time");
                                var vegetable_glazing_weight =  $(this).attr("data-vegetable_glazing_weight");
                                var vegetable_glazing_datetime =  $(this).attr("data-vegetable_glazing_datetime");
                                console.log(vegetable_glazing_datetime);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $('.glazing_weight').html(vegetable_glazing_weight);
                                $('.glazing_date_time').html(vegetable_glazing_datetime);
                            });
                        }
                    });
                }
            });
        });
        $('.whole_n_clean').on("load click",function() {
            // $(".fillet_tbody").empty();
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'vegetable_iqf',
                    'sub_type' : 'whole_n_clean',
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#whole_n_clean_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        console.log(product);
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#whole_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#whole_n_clean_washing_n_cuttingModal' class='btn btn-success washing_n_cutting'><i class='fa fa-refresh' aria-hidden='true'></i> Washing & Cutting</button></td></tr>");
                            $('.washing_n_cutting').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((qty) - a)/(qty))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Glazing") {
                            $("table#whole_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_n_clean_glazingModal' class='btn btn-info iqf_glazing'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var washing_n_cutting_weight =  $(this).attr("data-washing_n_cutting_weight");
                                var washing_n_cutting_date_time =  $(this).attr("data-washing_n_cutting_date_time");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $('.glazing_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                     var p = (((a -(washing_n_cutting_weight))/(a))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "RandW") {
                            $("table#whole_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_n_clean_return_n_wastageModal' class='btn btn-danger iqf_randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"' data-vegetable_glazing_weight='"+product.vegetable_glazing_weight+"' data-vegetable_glazing_datetime='"+product.vegetable_glazing_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var washing_n_cutting_weight =  $(this).attr("data-washing_n_cutting_weight");
                                var washing_n_cutting_date_time =  $(this).attr("data-washing_n_cutting_date_time");
                                var vegetable_glazing_weight =  $(this).attr("data-vegetable_glazing_weight");
                                var vegetable_glazing_datetime =  $(this).attr("data-vegetable_glazing_datetime");
                                console.log(vegetable_glazing_datetime);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $('.glazing_weight').html(vegetable_glazing_weight);
                                $('.glazing_date_time').html(vegetable_glazing_datetime);
                            });
                        }
                    });
                }
            });
        });
       
    });
    
  </script>
@endsection



