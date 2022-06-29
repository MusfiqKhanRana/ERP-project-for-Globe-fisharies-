
@extends('backend.master')
@section('site-title')
    Semi IQF
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
                            <li style="margin-bottom:5px;" class="active"><a href="#semi_hoso" class="hoso" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HOSO({{$hoso_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#semi_hoto" class="hoto" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HOTO({{$hoto_count}})</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            <div class="tab-pane active" id="semi_hoso">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>HOSO List</b>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-bordered table-hover" id="hoso_table">
                                    <thead>
                                        <tr>
                                            <th>
                                                Invoice No.
                                            </th>
                                            <th>
                                                Item Name
                                            </th>
                                            <th>
                                                Grade
                                            </th>
                                            <th>
                                                Quantity 
                                            </th>
                                            <th style="text-align: center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1001
                                            </td>
                                            <td>
                                                Rui
                                            </td>
                                            <td>
                                                300-500gm
                                            </td>
                                            <td>
                                                60kg
                                            </td>
                                            <td>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_hoso" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_hoso" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockCounter_hoso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#excess_hoso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Excess Volume</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_hoso" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="semi_hoto">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>HOTO List</b>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-bordered table-hover" id="hoto_table">
                                    <thead>
                                        <tr>
                                            <th>
                                                Invoice No.
                                            </th>
                                            <th>
                                                Item Name
                                            </th>
                                            <th>
                                                Grade
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th style="text-align: center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                10001
                                            </td>
                                            <td>
                                                Rui
                                            </td>
                                            <td>
                                                300-500gm
                                            </td>
                                            <td>
                                                60kg
                                            </td>
                                            <td>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_hoto" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_hoto" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockCounter_hoto" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Block Counter</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#excess_hoto" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Excess Volume</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_hoto" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <!-------- HOSO Modals--------------->
                            @include('backend.production.processing.semi_iqf.modals.hoso.processData_hoso')
                            @include('backend.production.processing.semi_iqf.modals.hoso.grading_hoso')
                            @include('backend.production.processing.semi_iqf.modals.hoso.blockCounter_hoso')
                            @include('backend.production.processing.semi_iqf.modals.hoso.excess_hoso')
                            @include('backend.production.processing.semi_iqf.modals.hoso.WastageReturn_hoso')


                            <!-------------HOTO Modals---------------->
                            @include('backend.production.processing.semi_iqf.modals.hoto.processData_hoto')
                            @include('backend.production.processing.semi_iqf.modals.hoto.grading_hoto')
                            @include('backend.production.processing.semi_iqf.modals.hoto.blockCounter_hoto')
                            @include('backend.production.processing.semi_iqf.modals.hoto.excess_hoto')
                            @include('backend.production.processing.semi_iqf.modals.hoto.WastageReturn_hoto')    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.tiny.cloud/1/i2a8bjsghb2egjws1cli2w9fcs5ke9j47f8jhfky1sq28f5q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(document).ready(function()
    {
        tinymce.init({
            selector: 'textarea',
            init_instance_callback : function(editor) {
                var freeTiny = document.querySelector('.tox .tox-notification--in');
                freeTiny.style.display = 'none';
            }
        });

        id = 'hoso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'semi_iqf',
                    'sub_type' : 'hoso',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#hoso_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        console.log(product);
                        if (product.status == "Initial") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' data-toggle='modal' href='#processData_hoso' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html((product.alive_quantity+product.dead_quantity));
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((product.alive_quantity+product.dead_quantity) - a)/(product.alive_quantity+product.dead_quantity))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Blocking") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_hoso' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table_hoso tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                var product_array = [];
                                var block_id , block_name,block_size_id,block_size_name,grade_weight = null; 
                                $('.block_select').change(function() {
                                    block_id=$('option:selected',this).val();
                                    block_name =$('option:selected',this).attr("data-block_size");
                                    console.log(grade_name);
                                });
                                $('.size_select').change(function() {
                                    block_size_id=$('option:selected',this).val();
                                    block_size_name =$('option:selected',this).attr("data-size");
                                    console.log(grade_name);
                                });
                                $('.add_btn').click(function () {
                                    $("table.block_table_hoso tbody tr").empty();
                                    product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                    $.each( product_array, function( key, product ) {
                                        $("table.block_table_hoso tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.block_select').val("");
                                    $('.size_select').val("");
                                })
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blockCounter_hoso' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table_hoso tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                // console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.block_counter_table_hoso tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.block_counter_table_hoso tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#excess_hoso' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                            $('.excess_volume').click(function () {
                                $("table.excess_volume_table_hoso tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.excess_volume_table_hoso tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.excess_volume_table_hoso tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+product.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_hoso' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.block_randw_table_hosox tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.block_randw_table_hosox tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            console.log(product.block_size);
                                            $("table.block_randw_table_hosox  tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.excess_volume+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });

        $('.hoso').on("click",function() {
            id = 'hoso';
            $.ajax({
                    type:"POST",
                    url:"{{route('production.processing-unit.iqf.data_pass')}}",
                    data:{
                        'type' : 'semi_iqf',
                        'sub_type' : 'hoso',
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $("table#hoso_table tbody tr").empty();
                        $.each( data, function( key, product ) {
                            if (product.status == "Initial") {
                                $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' data-toggle='modal' href='#processData_hoso' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                                // $('.fillet_invoice').html(product.requisition_code);
                                // $('.fillet_item').html(product.production_processing_item.name);
                                // $('.fillet_qty').html((product.alive_quantity+product.dead_quantity));
                                $('.processing').click(function () {
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    $('.initial_weight').on("change keyup",function() {
                                        var a = $(this).val();
                                        var p = ((((product.alive_quantity+product.dead_quantity) - a)/(product.alive_quantity+product.dead_quantity))*100);
                                        p = p.toFixed(2);
                                        $('.parcentage').html(p+'%');
                                    });
                                });
                                
                            }
                            if (product.status == "Blocking") {
                                $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_hoso' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                                $('.blocking').click(function () {
                                    $("table.block_table_hoso tbody tr").empty();
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    var product_array = [];
                                    var block_id , block_name,block_size_id,block_size_name,grade_weight = null; 
                                    $('.block_select').change(function() {
                                        block_id=$('option:selected',this).val();
                                        block_name =$('option:selected',this).attr("data-block_size");
                                        console.log(grade_name);
                                    });
                                    $('.size_select').change(function() {
                                        block_size_id=$('option:selected',this).val();
                                        block_size_name =$('option:selected',this).attr("data-size");
                                        console.log(grade_name);
                                    });
                                    $('.add_btn').click(function () {
                                        $("table.block_table_hoso tbody tr").empty();
                                        product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                        $.each( product_array, function( key, product ) {
                                            $("table.block_table_hoso tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                        });
                                        $(".inputs").val('');
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.block_select').val("");
                                        $('.size_select').val("");
                                    })
                                });

                            }
                            if (product.status == "BlockCounter") {
                                $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blockCounter_hoso' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                                $('.block_counter').click(function () {
                                    $("table.block_counter_table_hoso tbody tr").empty();
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    // console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    $.ajax({
                                        type:"POST",
                                        url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                        data:{
                                            'id' : ppu_id,
                                            '_token' : $('input[name=_token]').val()
                                        },
                                        success:function(data){
                                            console.log(data);
                                            $("table.block_counter_table_hoso tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.block_counter_table_hoso tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "ExcessVolume") {
                                $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#excess_hoso' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                                $('.excess_volume').click(function () {
                                    $("table.excess_volume_table_hoso tbody tr").empty();
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    $.ajax({
                                        type:"POST",
                                        url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                        data:{
                                            'id' : ppu_id,
                                            '_token' : $('input[name=_token]').val()
                                        },
                                        success:function(data){
                                            console.log(data);
                                            $("table.excess_volume_table_hoso tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.excess_volume_table_hoso tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+product.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "RandW") {
                                $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_hoso' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                                $('.randw').click(function () {
                                    $("table.block_randw_table_hosox tbody tr").empty();
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    $.ajax({
                                        type:"POST",
                                        url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                        data:{
                                            'id' : ppu_id,
                                            '_token' : $('input[name=_token]').val()
                                        },
                                        success:function(data){
                                            console.log(data);
                                            $("table.block_randw_table_hosox tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.block_randw_table_hosox tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.excess_volume+"</td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                        });
                    }
            });
        });
        $('.hoto').on("click",function() {
            id = 'hoto';
            $.ajax({
                    type:"POST",
                    url:"{{route('production.processing-unit.iqf.data_pass')}}",
                    data:{
                        'type' : 'semi_iqf',
                        'sub_type' : 'hoto',
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $("table#hoto_table tbody tr").empty();
                        $.each( data, function( key, product ) {
                            if (product.status == "Initial") {
                                $("table#hoto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' data-toggle='modal' href='#processData_hoto' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                                // $('.fillet_invoice').html(product.requisition_code);
                                // $('.fillet_item').html(product.production_processing_item.name);
                                // $('.fillet_qty').html((product.alive_quantity+product.dead_quantity));
                                $('.processing').click(function () {
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    $('.initial_weight').on("change keyup",function() {
                                        var a = $(this).val();
                                        var p = ((((product.alive_quantity+product.dead_quantity) - a)/(product.alive_quantity+product.dead_quantity))*100);
                                        p = p.toFixed(2);
                                        $('.parcentage').html(p+'%');
                                    });
                                });
                                
                            }
                            if (product.status == "Blocking") {
                                $("table#hoto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_hoto' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                                $('.blocking').click(function () {
                                    $("table.block_table_hoto tbody tr").empty();
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    var product_array = [];
                                    var block_id , block_name,block_size_id,block_size_name,grade_weight = null; 
                                    $('.block_select').change(function() {
                                        block_id=$('option:selected',this).val();
                                        block_name =$('option:selected',this).attr("data-block_size");
                                        console.log(grade_name);
                                    });
                                    $('.size_select').change(function() {
                                        block_size_id=$('option:selected',this).val();
                                        block_size_name =$('option:selected',this).attr("data-size");
                                        console.log(grade_name);
                                    });
                                    $('.add_btn').click(function () {
                                        $("table.block_table_hoto tbody tr").empty();
                                        product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                        $.each( product_array, function( key, product ) {
                                            $("table.block_table_hoto tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                        });
                                        $(".inputs").val('');
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.block_select').val("");
                                        $('.size_select').val("");
                                    })
                                });

                            }
                            if (product.status == "BlockCounter") {
                            $("table#hoto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blockCounter_hoto' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                                $('.block_counter').click(function () {
                                    $("table.block_counter_table_hoto tbody tr").empty();
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    // console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    $.ajax({
                                        type:"POST",
                                        url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                        data:{
                                            'id' : ppu_id,
                                            '_token' : $('input[name=_token]').val()
                                        },
                                        success:function(data){
                                            console.log(data);
                                            $("table.block_counter_table_hoto tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.block_counter_table_hoto tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "ExcessVolume") {
                                $("table#hoto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#excess_hoto' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                                $('.excess_volume').click(function () {
                                    $("table.excess_volume_table_hoto tbody tr").empty();
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    $.ajax({
                                        type:"POST",
                                        url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                        data:{
                                            'id' : ppu_id,
                                            '_token' : $('input[name=_token]').val()
                                        },
                                        success:function(data){
                                            console.log(data);
                                            $("table.excess_volume_table_hoto tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.excess_volume_table_hoto tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+product.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "RandW") {
                                $("table#hoto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_hoto' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                                $('.randw').click(function () {
                                    $("table.block_randw_table_hoto tbody tr").empty();
                                    var invoice = $(this).attr("data-invoice");
                                    var item = $(this).attr("data-item");
                                    var qty = $(this).attr("data-qty");
                                    var ppu_id =  $(this).attr("data-ppu_id");
                                    console.log(ppu_id);
                                    $('.invoice').html(invoice);
                                    $('.item').html(item);
                                    $('.qty').html((qty));
                                    $('.ppu_id').val(ppu_id);
                                    $.ajax({
                                        type:"POST",
                                        url:"{{route('production.processing-unit.blocking.data_pass')}}",
                                        data:{
                                            'id' : ppu_id,
                                            '_token' : $('input[name=_token]').val()
                                        },
                                        success:function(data){
                                            console.log(data);
                                            $("table.block_randw_table_hoto tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.block_randw_table_hoto tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.excess_volume+"</td></tr>");
                                            });
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



