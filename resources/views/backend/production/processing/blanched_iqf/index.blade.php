
@extends('backend.master')
@section('site-title')
    Blanched IQF 
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
                            <li style="margin-bottom:5px;" class="active"><a href="#hlso_blanched" class="hlso_blanched" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO({{$hoso_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#pud_blanched" class="pud_blanched" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD({{$pud_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#p_d_tail_on_blanched" class="p_d_tail_on_blanched" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail on({{$p_n_d_tail_on_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#p_d_tail_off_blanched" class="p_d_tail_off_blanched" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail Off({{$p_n_d_tail_off_count}})</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            <div class="tab-pane active" id="hlso_blanched">
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_hlso" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_hlso" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_hlso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_hlso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_hlso" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="pud_blanched">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>PUD List</b>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-bordered table-hover" id="pud_table">
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_pud" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_pud" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_pud" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_pud" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_pud" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="p_d_tail_on_blanched">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>P & D Tail On List</b>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-bordered table-hover" id="pd_tail_on_table">
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_p_d_tail_on" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_p_d_tail_on" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_p_d_tail_on" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_p_d_tail_on" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_p_d_tail_on" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="p_d_tail_off_blanched">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>P & D Tail Off List</b>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-bordered table-hover" id="pd_tail_off_table">
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_p_d_tail_off" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_p_d_tail_off" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_p_d_tail_off" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_p_d_tail_off" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_p_d_tail_off" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!----  HLSO Modals----->
                            @include('backend.production.processing.blanched_iqf.modals.hlso.processData_hlso')
                            @include('backend.production.processing.blanched_iqf.modals.hlso.grading_hlso')
                            @include('backend.production.processing.blanched_iqf.modals.hlso.soaking_hlso')
                            @include('backend.production.processing.blanched_iqf.modals.hlso.glazing_hlso')
                            @include('backend.production.processing.blanched_iqf.modals.hlso.WastageReturn_hlso')
                            
                           
                            <!----  PUD Modals----->
                            @include('backend.production.processing.blanched_iqf.modals.pud.processData_pud')
                            @include('backend.production.processing.blanched_iqf.modals.pud.grading_pud')
                            @include('backend.production.processing.blanched_iqf.modals.pud.soaking_pud')
                            @include('backend.production.processing.blanched_iqf.modals.pud.glazing_pud')
                            @include('backend.production.processing.blanched_iqf.modals.pud.WastageReturn_pud')
                            
                            <!----  P & D Tail on Modals----->
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.processData_p_d_tail_on')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.grading_p_d_tail_on')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.soaking_p_d_tail_on')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.glazing_p_d_tail_on')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.WastageReturn_p_d_tail_on')


                            <!----  P & D Tail Off Modals----->
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.processData_p_d_tail_off')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.grading_p_d_tail_off')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.soaking_p_d_tail_off')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.glazing_p_d_tail_off')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.WastageReturn_p_d_tail_off')
                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.tiny.cloud/1/i2a8bjsghb2egjws1cli2w9fcs5ke9j47f8jhfky1sq28f5q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $(document).ready(function() {
        tinymce.init({
            selector: 'textarea',
            init_instance_callback : function(editor) {
                var freeTiny = document.querySelector('.tox .tox-notification--in');
                freeTiny.style.display = 'none';
            }
        });

        
                // $(".fillet_tbody").empty();
                id = 'hoso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'blanched_iqf_shrimp',
                    'sub_type' : 'hoso',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#hoso_table tbody tr").empty();
                    $.each( data, function( key, product ) {
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
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_hlso' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
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
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_hlso' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.hoso_grading_table tbody tr").empty();
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
                                var grade_id , grade_name ,grade_weight = null; 
                                $('.grade_select').change(function() {
                                    grade_id=$('option:selected',this).val();
                                    grade_name =$('option:selected',this).attr("data-grade_name");
                                    console.log(grade_name);
                                });
                                $('.grade_weight').on("change keyup",function() {
                                    grade_weight = $(this).val();
                                });
                                $('.add_btn').click(function () {
                                    $("table.hoso_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.hoso_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_hlso' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.hoso_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.hoso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_hlso' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.hoso_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hoso_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_hlso' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.hoso_randw_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hoso_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        $('.hlso_blanched').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'hoso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'blanched_iqf_shrimp',
                    'sub_type' : 'hoso',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#hoso_table tbody tr").empty();
                    $.each( data, function( key, product ) {
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
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_hoso' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
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
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_hoso' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.hoso_grading_table tbody tr").empty();
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
                                var grade_id , grade_name ,grade_weight = null; 
                                $('.grade_select').change(function() {
                                    grade_id=$('option:selected',this).val();
                                    grade_name =$('option:selected',this).attr("data-grade_name");
                                    console.log(grade_name);
                                });
                                $('.grade_weight').on("change keyup",function() {
                                    grade_weight = $(this).val();
                                });
                                $('.add_btn').click(function () {
                                    $("table.hoso_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.hoso_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_hoso' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.hoso_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.hoso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_hoso' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.hoso_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hoso_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_hoso' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.hoso_randw_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hoso_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.pud_blanched').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'pud';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'blanched_iqf_shrimp',
                    'sub_type' : 'pud',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#pud_table tbody tr").empty();
                    $.each( data, function( key, product ) {
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
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_pud' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
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
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_pud' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pud_grading_table tbody tr").empty();
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
                                var grade_id , grade_name ,grade_weight = null; 
                                $('.grade_select').change(function() {
                                    grade_id=$('option:selected',this).val();
                                    grade_name =$('option:selected',this).attr("data-grade_name");
                                    console.log(grade_name);
                                });
                                $('.grade_weight').on("change keyup",function() {
                                    grade_weight = $(this).val();
                                });
                                $('.add_btn').click(function () {
                                    $("table.pud_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.pud_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_pud' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pud_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pud_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_pud' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pud_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pud_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_pud' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pud_randw_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pud_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.p_d_tail_on_blanched').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'p_n_d_tail_on';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'blanched_iqf_shrimp',
                    'sub_type' : 'p_n_d_tail_on',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#pd_tail_on_table tbody tr").empty();
                    $.each( data, function( key, product ) {
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
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_p_d_tail_on' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
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
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_p_d_tail_on' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pd_tail_on_grading_table tbody tr").empty();
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
                                var grade_id , grade_name ,grade_weight = null; 
                                $('.grade_select').change(function() {
                                    grade_id=$('option:selected',this).val();
                                    grade_name =$('option:selected',this).attr("data-grade_name");
                                    console.log(grade_name);
                                });
                                $('.grade_weight').on("change keyup",function() {
                                    grade_weight = $(this).val();
                                });
                                $('.add_btn').click(function () {
                                    $("table.pd_tail_on_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.pd_tail_on_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_p_d_tail_on' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pd_tail_on_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pd_tail_on_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_on_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_p_d_tail_on' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pd_tail_on_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_on_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_on_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_p_d_tail_on' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pd_tail_on_randw_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_on_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_on_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.p_d_tail_off_blanched').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'p_n_d_tail_off';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'blanched_iqf_shrimp',
                    'sub_type' : 'p_n_d_tail_off',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#pd_tail_off_table tbody tr").empty();
                    $.each( data, function( key, product ) {
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
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_p_d_tail_off' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
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
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_p_d_tail_off' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pd_tail_off_grading_table tbody tr").empty();
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
                                var grade_id , grade_name ,grade_weight = null; 
                                $('.grade_select').change(function() {
                                    grade_id=$('option:selected',this).val();
                                    grade_name =$('option:selected',this).attr("data-grade_name");
                                    console.log(grade_name);
                                });
                                $('.grade_weight').on("change keyup",function() {
                                    grade_weight = $(this).val();
                                });
                                $('.add_btn').click(function () {
                                    $("table.pd_tail_off_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.pd_tail_off_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_p_d_tail_off' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pd_tail_off_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pd_tail_off_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_off_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_p_d_tail_off' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pd_tail_off_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_off_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_off_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01'  class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_p_d_tail_off' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pd_tail_off_randw_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_off_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_off_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
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



