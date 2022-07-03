
@extends('backend.master')
@section('site-title')
    RAW BF Shrimp
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
                            <li style="margin-bottom:5px;" class="active"><a class="hlso" href="#hlso" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO({{$hlso_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a class="pud" href="#pud" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD({{$pud_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a class="p_n_d" href="#p_n_d" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D({{$p_n_d_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a class="pdto" href="#pdto" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PDTO({{$pdto_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a class="pto" href="#pto" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PTO({{$pto_count}})</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            <div class="tab-pane active" id="hlso">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">HLSO</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="hlso_table">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pud">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">PUD</h2> 
                                            </div>
                                            <div class="panel-body">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="p_n_d">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">P & D List</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="p_n_d_table">
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
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                11111
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pdto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">P & D Tail On List</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="pdto_table">
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
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                11111
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">P & D Tail Off List</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="pto_table">
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
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                11111
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_bf_shrimp',
                    'sub_type' : 'hlso',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#hlso_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        if (product.status == "Initial") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' data-toggle='modal' href='#hlsoProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html((parseFloat(product.alive_quantity+product.dead_quantity)));
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
                                    var p = ((((parseFloat(product.alive_quantity+product.dead_quantity)) - a)/(parseFloat(product.alive_quantity+product.dead_quantity)))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Blocking") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoGradingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
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
                                    $("table.block_table tbody tr").empty();
                                    product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                    $.each( product_array, function( key, product ) {
                                        $("table.block_table tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.block_select').val("");
                                    $('.size_select').val("");
                                })
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
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
                                        $("table.block_counter_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Soaking") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoSoakingModal' class='btn btn-warning soakingtable' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soakingtable').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
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
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' class='form-control' name='soaking_return[]' value='"+product.soaking_return+"' placeholder='soaking return'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                            $('.excess_volume').click(function () {
                                $("table.excess_volume_table tbody tr").empty();
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
                                        $("table.excess_volume_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+product.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.block_randw_table tbody tr").empty();
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
                                        $("table.block_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.excess_volume+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });

        $('.hlso').on("click",function() {
            id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_bf_shrimp',
                    'sub_type' : 'hlso',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#hlso_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        if (product.status == "Initial") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' data-toggle='modal' href='#hlsoProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html((parseFloat(product.alive_quantity+product.dead_quantity)));
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
                                    var p = ((((parseFloat(product.alive_quantity+product.dead_quantity)) - a)/(parseFloat(product.alive_quantity+product.dead_quantity)))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Blocking") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoGradingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
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
                                    $("table.block_table tbody tr").empty();
                                    product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                    $.each( product_array, function( key, product ) {
                                        $("table.block_table tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.block_select').val("");
                                    $('.size_select').val("");
                                })
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
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
                                        $("table.block_counter_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Soaking") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoSoakingModal' class='btn btn-warning soakingtable' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soakingtable').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
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
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='soaking_return[]' value='"+product.soaking_return+"' placeholder='soaking return'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                            $('.excess_volume').click(function () {
                                $("table.excess_volume_table tbody tr").empty();
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
                                        $("table.excess_volume_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+product.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.block_randw_table tbody tr").empty();
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
                                        $("table.block_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.excess_volume+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
            });
        });
        $('.pud').on("click",function() {
                id = 'pud';
                $.ajax({
                    type:"POST",
                    url:"{{route('production.processing-unit.iqf.data_pass')}}",
                    data:{
                        'type' : 'raw_bf_shrimp',
                        'sub_type' : 'pud',
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $("table#pud_table tbody tr").empty();
                        $.each( data, function( key, product ) {
                            if (product.status == "Initial") {
                                $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' data-toggle='modal' href='#pudProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                                // $('.fillet_invoice').html(product.requisition_code);
                                // $('.fillet_item').html(product.production_processing_item.name);
                                // $('.fillet_qty').html((parseFloat(product.alive_quantity+product.dead_quantity)));
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
                                        var p = ((((parseFloat(product.alive_quantity+product.dead_quantity)) - a)/(parseFloat(product.alive_quantity+product.dead_quantity)))*100);
                                        p = p.toFixed(2);
                                        $('.parcentage').html(p+'%');
                                    });
                                });
                                
                            }
                            if (product.status == "Blocking") {
                                $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudGradingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                                $('.blocking').click(function () {
                                    $("table.pud_block_table tbody tr").empty();
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
                                        $("table.pud_block_table tbody tr").empty();
                                        product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                        $.each( product_array, function( key, product ) {
                                            $("table.pud_block_table tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                        });
                                        $(".inputs").val('');
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.block_select').val("");
                                        $('.size_select').val("");
                                    })
                                });

                            }
                            if (product.status == "BlockCounter") {
                                $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                                $('.block_counter').click(function () {
                                    $("table.pud_block_counter_table tbody tr").empty();
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
                                            $("table.pud_block_counter_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pud_block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "Soaking") {
                                $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudSoakingModal' class='btn btn-warning soakingtable' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                                $('.soakingtable').click(function () {
                                    $("table.pud_soaking_table tbody tr").empty();
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
                                            $("table.pud_soaking_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pud_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='soaking_return[]' value='"+product.soaking_return+"' placeholder='soaking return'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "ExcessVolume") {
                                $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                                $('.excess_volume').click(function () {
                                    $("table.pud_excess_volume_table tbody tr").empty();
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
                                            $("table.pud_excess_volume_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pud_excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+product.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "RandW") {
                                $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                                $('.randw').click(function () {
                                    $("table.block_randw_table tbody tr").empty();
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
                                            $("table.block_randw_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.excess_volume+"</td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                        });
                    }
            });
        });
        $('.p_n_d').on("click",function() {
                id = 'p_n_d';
                $.ajax({
                    type:"POST",
                    url:"{{route('production.processing-unit.iqf.data_pass')}}",
                    data:{
                        'type' : 'raw_bf_shrimp',
                        'sub_type' : 'p_n_d',
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $("table#p_n_d_table tbody tr").empty();
                        $.each( data, function( key, product ) {
                            if (product.status == "Initial") {
                                $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' data-toggle='modal' href='#p_n_dProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                                // $('.fillet_invoice').html(product.requisition_code);
                                // $('.fillet_item').html(product.production_processing_item.name);
                                // $('.fillet_qty').html((parseFloat(product.alive_quantity+product.dead_quantity)));
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
                                        var p = ((((parseFloat(product.alive_quantity+product.dead_quantity)) - a)/(parseFloat(product.alive_quantity+product.dead_quantity)))*100);
                                        p = p.toFixed(2);
                                        $('.parcentage').html(p+'%');
                                    });
                                });
                                
                            }
                            if (product.status == "Blocking") {
                                $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dGradingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                                $('.blocking').click(function () {
                                    $("table.p_n_d_block_table tbody tr").empty();
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
                                        $("table.p_n_d_block_table tbody tr").empty();
                                        product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                        $.each( product_array, function( key, product ) {
                                            $("table.p_n_d_block_table tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                        });
                                        $(".inputs").val('');
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.block_select').val("");
                                        $('.size_select').val("");
                                    })
                                });

                            }
                            if (product.status == "BlockCounter") {
                                $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                                $('.block_counter').click(function () {
                                    $("table.p_n_d_block_counter_table tbody tr").empty();
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
                                            $("table.p_n_d_block_counter_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.p_n_d_block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "Soaking") {
                                $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dSoakingModal' class='btn btn-warning soakingtable' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                                $('.soakingtable').click(function () {
                                    $("table.p_n_d_soaking_table tbody tr").empty();
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
                                            $("table.p_n_d_soaking_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.p_n_d_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='soaking_return[]' value='"+product.soaking_return+"' placeholder='soaking return'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "ExcessVolume") {
                                $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                                $('.excess_volume').click(function () {
                                    $("table.p_n_d_excess_volume_table tbody tr").empty();
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
                                            $("table.p_n_d_excess_volume_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.p_n_d_excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+product.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "RandW") {
                                $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                                $('.randw').click(function () {
                                    $("table.p_n_d_block_randw_table tbody tr").empty();
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
                                            $("table.p_n_d_block_randw_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.p_n_d_block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.excess_volume+"</td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                        });
                    }
            });
        });
        $('.pdto').on("click",function() {
                id = 'pdto';
                $.ajax({
                    type:"POST",
                    url:"{{route('production.processing-unit.iqf.data_pass')}}",
                    data:{
                        'type' : 'raw_bf_shrimp',
                        'sub_type' : 'pdto',
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $("table#pdto_table tbody tr").empty();
                        $.each( data, function( key, product ) {
                            if (product.status == "Initial") {
                                $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' data-toggle='modal' href='#pdtoProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                                // $('.fillet_invoice').html(product.requisition_code);
                                // $('.fillet_item').html(product.production_processing_item.name);
                                // $('.fillet_qty').html((parseFloat(product.alive_quantity+product.dead_quantity)));
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
                                        var p = ((((parseFloat(product.alive_quantity+product.dead_quantity)) - a)/(parseFloat(product.alive_quantity+product.dead_quantity)))*100);
                                        p = p.toFixed(2);
                                        $('.parcentage').html(p+'%');
                                    });
                                });
                                
                            }
                            if (product.status == "Blocking") {
                                $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoGradingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                                $('.blocking').click(function () {
                                    $("table.pdto_block_table tbody tr").empty();
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
                                        $("table.pdto_block_table tbody tr").empty();
                                        product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                        $.each( product_array, function( key, product ) {
                                            $("table.pdto_block_table tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                        });
                                        $(".inputs").val('');
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.block_select').val("");
                                        $('.size_select').val("");
                                    })
                                });

                            }
                            if (product.status == "BlockCounter") {
                                $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                                $('.block_counter').click(function () {
                                    $("table.pdto_block_counter_table tbody tr").empty();
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
                                            $("table.pdto_block_counter_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pdto_block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "Soaking") {
                                $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoSoakingModal' class='btn btn-warning soakingtable' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                                $('.soakingtable').click(function () {
                                    $("table.pdto_soaking_table tbody tr").empty();
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
                                            $("table.pdto_soaking_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pdto_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='soaking_return[]' value='"+product.soaking_return+"' placeholder='soaking return'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "ExcessVolume") {
                                $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                                $('.excess_volume').click(function () {
                                    $("table.pdto_excess_volume_table tbody tr").empty();
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
                                            $("table.pdto_excess_volume_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pdto_excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+product.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "RandW") {
                                $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                                $('.randw').click(function () {
                                    $("table.pdto_block_randw_table tbody tr").empty();
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
                                            $("table.pdto_block_randw_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pdto_block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.excess_volume+"</td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                        });
                    }
            });
        });
        $('.pto').on("click",function() {
                id = 'pto';
                $.ajax({
                    type:"POST",
                    url:"{{route('production.processing-unit.iqf.data_pass')}}",
                    data:{
                        'type' : 'raw_bf_shrimp',
                        'sub_type' : 'pto',
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $("table#pto_table tbody tr").empty();
                        $.each( data, function( key, product ) {
                            if (product.status == "Initial") {
                                $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' data-toggle='modal' href='#ptoProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                                // $('.fillet_invoice').html(product.requisition_code);
                                // $('.fillet_item').html(product.production_processing_item.name);
                                // $('.fillet_qty').html((parseFloat(product.alive_quantity+product.dead_quantity)));
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
                                        var p = ((((parseFloat(product.alive_quantity+product.dead_quantity)) - a)/(parseFloat(product.alive_quantity+product.dead_quantity)))*100);
                                        p = p.toFixed(2);
                                        $('.parcentage').html(p+'%');
                                    });
                                });
                                
                            }
                            if (product.status == "Blocking") {
                                $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoGradingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                                $('.blocking').click(function () {
                                    $("table.pto_block_table tbody tr").empty();
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
                                        $("table.pto_block_table tbody tr").empty();
                                        product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                        $.each( product_array, function( key, product ) {
                                            $("table.pto_block_table tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                        });
                                        $(".inputs").val('');
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.block_select').val("");
                                        $('.size_select').val("");
                                    })
                                });

                            }
                            if (product.status == "BlockCounter") {
                                $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                                $('.block_counter').click(function () {
                                    $("table.pto_block_counter_table tbody tr").empty();
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
                                            $("table.pto_block_counter_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pto_block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+product.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "Soaking") {
                                $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoSoakingModal' class='btn btn-warning soakingtable' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                                $('.soakingtable').click(function () {
                                    $("table.pto_soaking_table tbody tr").empty();
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
                                            $("table.pto_soaking_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pto_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='soaking_return[]' value='"+product.soaking_return+"' placeholder='soaking return'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "ExcessVolume") {
                                $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                                $('.excess_volume').click(function () {
                                    $("table.pto_excess_volume_table tbody tr").empty();
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
                                            $("table.pto_excess_volume_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pto_excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+product.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "RandW") {
                                $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity+product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(parseFloat(product.alive_quantity+product.dead_quantity))+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                                $('.randw').click(function () {
                                    $("table.pto_block_randw_table tbody tr").empty();
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
                                            $("table.pto_block_randw_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.pto_block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.excess_volume+"</td></tr>");
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