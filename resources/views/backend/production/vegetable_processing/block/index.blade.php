
@extends('backend.master')
@section('site-title')
    Block
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
                                @include('backend.production.vegetable_processing.block.cut_n_clean.index')
                                @include('backend.production.vegetable_processing.block.whole.index')
                                @include('backend.production.vegetable_processing.block.whole_n_clean.index')
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
                    'type' : 'vegetable_block',
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
                        if (product.status == "Blocking") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_blockingModal' class='btn btn-info blocking'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Blocking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
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
                                var product_array = [];
                                var block_id , block_name,block_size_id,block_size_name,grade_weight = null; 
                                $('.block_select').change(function() {
                                    block_id=$('option:selected',this).val();
                                    block_name =$('option:selected',this).attr("data-block_size");
                                    console.log(block_name);
                                });
                                $('.size_select').change(function() {
                                    block_size_id=$('option:selected',this).val();
                                    block_size_name =$('option:selected',this).attr("data-size");
                                    console.log(block_size_name);
                                });
                                $('.add_btn').click(function () {
                                    var append = null;
                                    $("table.block_table tbody tr").empty();
                                    product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            append+= "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                        }
                                    });
                                    $("table.block_table tbody").append(append);
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.block_select').val("");
                                    $('.size_select').val("");
                                    $(".delete").click(function(){
                                        console.log('good');
                                        product_array[$(this).data("id")].status="delete";
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.grade_weight').val(0);
                                        $('.grade_select').val("--select--");
                                        $(".delete"+$(this).data("id")).remove();
                                    });
                                })
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_block_counterModal' class='btn blue block_counter'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
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
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        var append = null;
                                        $("table.block_counter_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            append += "<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>";
                                        });
                                        $("table.block_counter_table tbody").append(append);
                                    }
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
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        var append = null;
                                        console.log(data);
                                        $("table.block_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            append +="<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td></tr>";
                                        });
                                        $("table.block_randw_table tbody").append(append);
                                    }
                                });
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
                    'type' : 'vegetable_block',
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
                        if (product.status == "Blocking") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_blockingModal' class='btn btn-info blocking'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Blocking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
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
                                var product_array = [];
                                var block_id , block_name,block_size_id,block_size_name,grade_weight = null; 
                                $('.block_select').change(function() {
                                    block_id=$('option:selected',this).val();
                                    block_name =$('option:selected',this).attr("data-block_size");
                                    console.log(block_name);
                                });
                                $('.size_select').change(function() {
                                    block_size_id=$('option:selected',this).val();
                                    block_size_name =$('option:selected',this).attr("data-size");
                                    console.log(block_size_name);
                                });
                                $('.add_btn').click(function () {
                                    var append = null;
                                    $("table.block_table tbody tr").empty();
                                    product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            append+= "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                        }
                                    });
                                    $("table.block_table tbody").append(append);
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.block_select').val("");
                                    $('.size_select').val("");
                                    $(".delete").click(function(){
                                        console.log('good');
                                        product_array[$(this).data("id")].status="delete";
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.grade_weight').val(0);
                                        $('.grade_select').val("--select--");
                                        $(".delete"+$(this).data("id")).remove();
                                    });
                                })
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_block_counterModal' class='btn blue block_counter'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
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
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        var append = null;
                                        $("table.block_counter_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            append += "<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>";
                                        });
                                        $("table.block_counter_table tbody").append(append);
                                    }
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
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        var append = null;
                                        console.log(data);
                                        $("table.block_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            append +="<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td></tr>";
                                        });
                                        $("table.block_randw_table tbody").append(append);
                                    }
                                });
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
                    'type' : 'vegetable_block',
                    'sub_type' : 'whole',
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
                        if (product.status == "Blocking") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_blockingModal' class='btn btn-info blocking'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Blocking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
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
                                var product_array = [];
                                var block_id , block_name,block_size_id,block_size_name,grade_weight = null; 
                                $('.block_select').change(function() {
                                    block_id=$('option:selected',this).val();
                                    block_name =$('option:selected',this).attr("data-block_size");
                                    console.log(block_name);
                                });
                                $('.size_select').change(function() {
                                    block_size_id=$('option:selected',this).val();
                                    block_size_name =$('option:selected',this).attr("data-size");
                                    console.log(block_size_name);
                                });
                                $('.add_btn').click(function () {
                                    var append = null;
                                    $("table.block_table tbody tr").empty();
                                    product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            append+= "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                        }
                                    });
                                    $("table.block_table tbody").append(append);
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.block_select').val("");
                                    $('.size_select').val("");
                                    $(".delete").click(function(){
                                        console.log('good');
                                        product_array[$(this).data("id")].status="delete";
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.grade_weight').val(0);
                                        $('.grade_select').val("--select--");
                                        $(".delete"+$(this).data("id")).remove();
                                    });
                                })
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#cut_n_clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cut_n_clean_block_counterModal' class='btn blue block_counter'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
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
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        var append = null;
                                        $("table.block_counter_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            append += "<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>";
                                        });
                                        $("table.block_counter_table tbody").append(append);
                                    }
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
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        var append = null;
                                        console.log(data);
                                        $("table.block_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            append +="<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td></tr>";
                                        });
                                        $("table.block_randw_table tbody").append(append);
                                    }
                                });
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
                    'type' : 'vegetable_block',
                    'sub_type' : 'whole_n_clean',
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
                        if (product.status == "Blocking") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_blockingModal' class='btn btn-info blocking'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Blocking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
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
                                var product_array = [];
                                var block_id , block_name,block_size_id,block_size_name,grade_weight = null; 
                                $('.block_select').change(function() {
                                    block_id=$('option:selected',this).val();
                                    block_name =$('option:selected',this).attr("data-block_size");
                                    console.log(block_name);
                                });
                                $('.size_select').change(function() {
                                    block_size_id=$('option:selected',this).val();
                                    block_size_name =$('option:selected',this).attr("data-size");
                                    console.log(block_size_name);
                                });
                                $('.add_btn').click(function () {
                                    var append = null;
                                    $("table.block_table tbody tr").empty();
                                    product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            append+= "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                        }
                                    });
                                    $("table.block_table tbody").append(append);
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.block_select').val("");
                                    $('.size_select').val("");
                                    $(".delete").click(function(){
                                        console.log('good');
                                        product_array[$(this).data("id")].status="delete";
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.grade_weight').val(0);
                                        $('.grade_select').val("--select--");
                                        $(".delete"+$(this).data("id")).remove();
                                    });
                                })
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_block_counterModal' class='btn blue block_counter'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-washing_n_cutting_weight='"+product.Initial_weight+"' data-washing_n_cutting_date_time='"+product.initial_weight_datetime+"'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
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
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        var append = null;
                                        $("table.block_counter_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            append += "<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>";
                                        });
                                        $("table.block_counter_table tbody").append(append);
                                    }
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
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.washing_n_cutting_weight').html(washing_n_cutting_weight);
                                $('.washing_n_cutting_date_time').html(washing_n_cutting_date_time);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        var append = null;
                                        console.log(data);
                                        $("table.block_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            append +="<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td></tr>";
                                        });
                                        $("table.block_randw_table tbody").append(append);
                                    }
                                });
                            });
                        }
                    });
                }
            });
        });
    });
    
  </script>
@endsection



