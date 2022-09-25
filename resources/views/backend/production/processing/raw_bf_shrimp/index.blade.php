
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
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoBlockingModal')
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
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudBlockingModal')
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
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dBlockingModal')
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
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoBlockingModal')
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
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoBlockingModal')
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
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#hlsoProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoGradingModal' class='btn btn-success raw_grading' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.raw_grading').click(function () {
                                $("table.grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.grade_ppu_id').val(ppu_id);
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
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
                                    $("table.grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        // console.log(product);
                                        if (product.status == "stay") {
                                            let append = "<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                            $("table.grading_table tbody").append(append);
                                        }
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
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
                        if (product.status == "Blocking") {
                            // console.log(product);
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoBlockingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-qty='"+total_quantity+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><div class='col-md-5'><label>Block Size</label><select type='text' class='form-control block_select' ><option>--Select--</option>@foreach ($blocks as $item) <option value='{{$item->id}}' data-block_size='{{$item->block_size}}'>{{$item->block_size}} kg</option>@endforeach</select></div><div class='col-md-5'><label>Size</label><select type='text' class='form-control size_select'><option>--Select--</option>@foreach ($blocks_size as $itemx)<option value='{{$itemx->id}}' data-size='{{$itemx->size}}'>{{$itemx->size}}</option>@endforeach</select></div><div class='col-md-1' style='margin-top: 4%'><button class='btn btn-success add_btn' data-key="+key+" data-batch_code="+product.batch_code+" data-grade_block_id="+product.id+" type='button'>+ Add</button></div></div><br><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Action</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.grade_to_block').append(append);
                                        });
                                        var product_array = [];
                                        var block_id , block_name,block_size_id,block_size_name,grade_weight, grade_batch_code,grade_block_id = null; 
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
                                            var value  =$(this).attr("data-key");
                                            var batch_code = $(this).attr("data-batch_code");
                                            grade_block_id = $(this).attr("data-grade_block_id");
                                            console.log(value);
                                            $("table.block_table"+value+" tbody tr").empty();
                                            product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"grade_batch_code":batch_code,'grade_block_id':grade_block_id,"status":"stay"});
                                            $.each( product_array, function( key, product ) {
                                                if (product.status == "stay" && product.grade_batch_code == batch_code) {
                                                    let append = "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                                    $("table.block_table"+value+" tbody").append(append);
                                                }
                                            });
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
                                    }
                                });
                                
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.block_to_blockcounter').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_counter_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.block_to_blockcounter').append(append);
                                            $("table.block_counter_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+value.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.block_counter_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Soaking") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoSoakingModal' class='btn btn-warning soakingtable' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soakingtable').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            let append = "<tr id='"+key+"'><td>"+product.grade_name+" kg</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>";
                                            $("table.hlso_soaking_table tbody").append(append);
                                        });
                                        $('.soaking_weight').on("change keyup",function() {
                                            var soaking_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((soaking_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                            $('.excess_volume').click(function () {
                                $("table.excess_volume_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.blockcounter_to_excess_volume').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover excess_volume_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.blockcounter_to_excess_volume').append(append);
                                            $("table.excess_volume_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+value.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.excess_volume_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.block_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.randw_div').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover randw_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.randw_div').append(append);
                                            $("table.randw_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td>"+value.excess_volume+"</td></tr>";
                                                $("table.randw_table"+key+" tbody").append(append);
                                            });
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
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#hlsoProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoGradingModal' class='btn btn-success raw_grading' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.raw_grading').click(function () {
                                $("table.grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.grade_ppu_id').val(ppu_id);
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
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
                                    $("table.grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        // console.log(product);
                                        if (product.status == "stay") {
                                            let append = "<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                            $("table.grading_table tbody").append(append);
                                        }
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
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
                        if (product.status == "Blocking") {
                            // console.log(product);
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoBlockingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-qty='"+total_quantity+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><div class='col-md-5'><label>Block Size</label><select type='text' class='form-control block_select' ><option>--Select--</option>@foreach ($blocks as $item) <option value='{{$item->id}}' data-block_size='{{$item->block_size}}'>{{$item->block_size}} kg</option>@endforeach</select></div><div class='col-md-5'><label>Size</label><select type='text' class='form-control size_select'><option>--Select--</option>@foreach ($blocks_size as $itemx)<option value='{{$itemx->id}}' data-size='{{$itemx->size}}'>{{$itemx->size}}</option>@endforeach</select></div><div class='col-md-1' style='margin-top: 4%'><button class='btn btn-success add_btn' data-key="+key+" data-batch_code="+product.batch_code+" data-grade_block_id="+product.id+" type='button'>+ Add</button></div></div><br><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Action</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.grade_to_block').append(append);
                                        });
                                        var product_array = [];
                                        var block_id , block_name,block_size_id,block_size_name,grade_weight, grade_batch_code,grade_block_id = null; 
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
                                            var value  =$(this).attr("data-key");
                                            var batch_code = $(this).attr("data-batch_code");
                                            grade_block_id = $(this).attr("data-grade_block_id");
                                            console.log(value);
                                            $("table.block_table"+value+" tbody tr").empty();
                                            product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"grade_batch_code":batch_code,'grade_block_id':grade_block_id,"status":"stay"});
                                            $.each( product_array, function( key, product ) {
                                                if (product.status == "stay" && product.grade_batch_code == batch_code) {
                                                    let append = "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                                    $("table.block_table"+value+" tbody").append(append);
                                                }
                                            });
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
                                    }
                                });
                                
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.block_to_blockcounter').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_counter_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.block_to_blockcounter').append(append);
                                            $("table.block_counter_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+value.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.block_counter_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Soaking") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoSoakingModal' class='btn btn-warning soakingtable' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soakingtable').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            let append = "<tr id='"+key+"'><td>"+product.grade_name+" kg</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>";
                                            $("table.hlso_soaking_table tbody").append(append);
                                        });
                                        $('.soaking_weight').on("change keyup",function() {
                                            var soaking_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((soaking_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                            $('.excess_volume').click(function () {
                                $("table.excess_volume_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.blockcounter_to_excess_volume').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover excess_volume_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.blockcounter_to_excess_volume').append(append);
                                            $("table.excess_volume_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+value.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.excess_volume_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlsoReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.block_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.randw_div').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover randw_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.randw_div').append(append);
                                            $("table.randw_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td>"+value.excess_volume+"</td></tr>";
                                                $("table.randw_table"+key+" tbody").append(append);
                                            });
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
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#pudProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudGradingModal' class='btn btn-success raw_grading' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.raw_grading').click(function () {
                                $("table.grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.grade_ppu_id').val(ppu_id);
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
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
                                    $("table.grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        // console.log(product);
                                        if (product.status == "stay") {
                                            let append = "<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                            $("table.grading_table tbody").append(append);
                                        }
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
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
                        if (product.status == "Blocking") {
                            // console.log(product);
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudBlockingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-qty='"+total_quantity+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><div class='col-md-5'><label>Block Size</label><select type='text' class='form-control block_select' ><option>--Select--</option>@foreach ($blocks as $item) <option value='{{$item->id}}' data-block_size='{{$item->block_size}}'>{{$item->block_size}} kg</option>@endforeach</select></div><div class='col-md-5'><label>Size</label><select type='text' class='form-control size_select'><option>--Select--</option>@foreach ($blocks_size as $itemx)<option value='{{$itemx->id}}' data-size='{{$itemx->size}}'>{{$itemx->size}}</option>@endforeach</select></div><div class='col-md-1' style='margin-top: 4%'><button class='btn btn-success add_btn' data-key="+key+" data-batch_code="+product.batch_code+" data-grade_block_id="+product.id+" type='button'>+ Add</button></div></div><br><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Action</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.grade_to_block').append(append);
                                        });
                                        var product_array = [];
                                        var block_id , block_name,block_size_id,block_size_name,grade_weight, grade_batch_code,grade_block_id = null; 
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
                                            var value  =$(this).attr("data-key");
                                            var batch_code = $(this).attr("data-batch_code");
                                            grade_block_id = $(this).attr("data-grade_block_id");
                                            console.log(value);
                                            $("table.block_table"+value+" tbody tr").empty();
                                            product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"grade_batch_code":batch_code,'grade_block_id':grade_block_id,"status":"stay"});
                                            $.each( product_array, function( key, product ) {
                                                if (product.status == "stay" && product.grade_batch_code == batch_code) {
                                                    let append = "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                                    $("table.block_table"+value+" tbody").append(append);
                                                }
                                            });
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
                                    }
                                });
                                
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.block_to_blockcounter').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_counter_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.block_to_blockcounter').append(append);
                                            $("table.block_counter_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+value.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.block_counter_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Soaking") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudSoakingModal' class='btn btn-warning soakingtable' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soakingtable').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            let append = "<tr id='"+key+"'><td>"+product.grade_name+" kg</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>";
                                            $("table.hlso_soaking_table tbody").append(append);
                                        });
                                        $('.soaking_weight').on("change keyup",function() {
                                            var soaking_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((soaking_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                            $('.excess_volume').click(function () {
                                $("table.excess_volume_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.blockcounter_to_excess_volume').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover excess_volume_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.blockcounter_to_excess_volume').append(append);
                                            $("table.excess_volume_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+value.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.excess_volume_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pudReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.block_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.randw_div').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover randw_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.randw_div').append(append);
                                            $("table.randw_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td>"+value.excess_volume+"</td></tr>";
                                                $("table.randw_table"+key+" tbody").append(append);
                                            });
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
                            $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#p_n_dProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dGradingModal' class='btn btn-success raw_grading' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.raw_grading').click(function () {
                                $("table.grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.grade_ppu_id').val(ppu_id);
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
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
                                    $("table.grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        // console.log(product);
                                        if (product.status == "stay") {
                                            let append = "<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                            $("table.grading_table tbody").append(append);
                                        }
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
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
                        if (product.status == "Blocking") {
                            // console.log(product);
                            $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dBlockingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-qty='"+total_quantity+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><div class='col-md-5'><label>Block Size</label><select type='text' class='form-control block_select' ><option>--Select--</option>@foreach ($blocks as $item) <option value='{{$item->id}}' data-block_size='{{$item->block_size}}'>{{$item->block_size}} kg</option>@endforeach</select></div><div class='col-md-5'><label>Size</label><select type='text' class='form-control size_select'><option>--Select--</option>@foreach ($blocks_size as $itemx)<option value='{{$itemx->id}}' data-size='{{$itemx->size}}'>{{$itemx->size}}</option>@endforeach</select></div><div class='col-md-1' style='margin-top: 4%'><button class='btn btn-success add_btn' data-key="+key+" data-batch_code="+product.batch_code+" data-grade_block_id="+product.id+" type='button'>+ Add</button></div></div><br><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Action</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.grade_to_block').append(append);
                                        });
                                        var product_array = [];
                                        var block_id , block_name,block_size_id,block_size_name,grade_weight, grade_batch_code,grade_block_id = null; 
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
                                            var value  =$(this).attr("data-key");
                                            var batch_code = $(this).attr("data-batch_code");
                                            grade_block_id = $(this).attr("data-grade_block_id");
                                            console.log(value);
                                            $("table.block_table"+value+" tbody tr").empty();
                                            product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"grade_batch_code":batch_code,'grade_block_id':grade_block_id,"status":"stay"});
                                            $.each( product_array, function( key, product ) {
                                                if (product.status == "stay" && product.grade_batch_code == batch_code) {
                                                    let append = "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                                    $("table.block_table"+value+" tbody").append(append);
                                                }
                                            });
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
                                    }
                                });
                                
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.block_to_blockcounter').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_counter_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.block_to_blockcounter').append(append);
                                            $("table.block_counter_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+value.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.block_counter_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Soaking") {
                            $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dSoakingModal' class='btn btn-warning soakingtable' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soakingtable').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            let append = "<tr id='"+key+"'><td>"+product.grade_name+" kg</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>";
                                            $("table.hlso_soaking_table tbody").append(append);
                                        });
                                        $('.soaking_weight').on("change keyup",function() {
                                            var soaking_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((soaking_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                            $('.excess_volume').click(function () {
                                $("table.excess_volume_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.blockcounter_to_excess_volume').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover excess_volume_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.blockcounter_to_excess_volume').append(append);
                                            $("table.excess_volume_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+value.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.excess_volume_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#p_n_d_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#p_n_dReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.block_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.randw_div').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover randw_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.randw_div').append(append);
                                            $("table.randw_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td>"+value.excess_volume+"</td></tr>";
                                                $("table.randw_table"+key+" tbody").append(append);
                                            });
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
                            $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#pdtoProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoGradingModal' class='btn btn-success raw_grading' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.raw_grading').click(function () {
                                $("table.grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.grade_ppu_id').val(ppu_id);
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
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
                                    $("table.grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        // console.log(product);
                                        if (product.status == "stay") {
                                            let append = "<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                            $("table.grading_table tbody").append(append);
                                        }
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
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
                        if (product.status == "Blocking") {
                            // console.log(product);
                            $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoBlockingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-qty='"+total_quantity+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><div class='col-md-5'><label>Block Size</label><select type='text' class='form-control block_select' ><option>--Select--</option>@foreach ($blocks as $item) <option value='{{$item->id}}' data-block_size='{{$item->block_size}}'>{{$item->block_size}} kg</option>@endforeach</select></div><div class='col-md-5'><label>Size</label><select type='text' class='form-control size_select'><option>--Select--</option>@foreach ($blocks_size as $itemx)<option value='{{$itemx->id}}' data-size='{{$itemx->size}}'>{{$itemx->size}}</option>@endforeach</select></div><div class='col-md-1' style='margin-top: 4%'><button class='btn btn-success add_btn' data-key="+key+" data-batch_code="+product.batch_code+" data-grade_block_id="+product.id+" type='button'>+ Add</button></div></div><br><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Action</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.grade_to_block').append(append);
                                        });
                                        var product_array = [];
                                        var block_id , block_name,block_size_id,block_size_name,grade_weight, grade_batch_code,grade_block_id = null; 
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
                                            var value  =$(this).attr("data-key");
                                            var batch_code = $(this).attr("data-batch_code");
                                            grade_block_id = $(this).attr("data-grade_block_id");
                                            console.log(value);
                                            $("table.block_table"+value+" tbody tr").empty();
                                            product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"grade_batch_code":batch_code,'grade_block_id':grade_block_id,"status":"stay"});
                                            $.each( product_array, function( key, product ) {
                                                if (product.status == "stay" && product.grade_batch_code == batch_code) {
                                                    let append = "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                                    $("table.block_table"+value+" tbody").append(append);
                                                }
                                            });
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
                                    }
                                });
                                
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.block_to_blockcounter').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_counter_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.block_to_blockcounter').append(append);
                                            $("table.block_counter_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+value.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.block_counter_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Soaking") {
                            $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoSoakingModal' class='btn btn-warning soakingtable' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soakingtable').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            let append = "<tr id='"+key+"'><td>"+product.grade_name+" kg</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>";
                                            $("table.hlso_soaking_table tbody").append(append);
                                        });
                                        $('.soaking_weight').on("change keyup",function() {
                                            var soaking_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((soaking_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                            $('.excess_volume').click(function () {
                                $("table.excess_volume_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.blockcounter_to_excess_volume').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover excess_volume_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.blockcounter_to_excess_volume').append(append);
                                            $("table.excess_volume_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+value.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.excess_volume_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pdto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pdtoReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.block_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.randw_div').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover randw_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.randw_div').append(append);
                                            $("table.randw_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td>"+value.excess_volume+"</td></tr>";
                                                $("table.randw_table"+key+" tbody").append(append);
                                            });
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
                            $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#ptoProcessingDataModal' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoGradingModal' class='btn btn-success raw_grading' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.raw_grading').click(function () {
                                $("table.grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.grade_ppu_id').val(ppu_id);
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
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
                                    $("table.grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        // console.log(product);
                                        if (product.status == "stay") {
                                            let append = "<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                            $("table.grading_table tbody").append(append);
                                        }
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
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
                        if (product.status == "Blocking") {
                            // console.log(product);
                            $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoBlockingModal' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-qty='"+total_quantity+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                            $('.blocking').click(function () {
                                $("table.block_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><div class='col-md-5'><label>Block Size</label><select type='text' class='form-control block_select' ><option>--Select--</option>@foreach ($blocks as $item) <option value='{{$item->id}}' data-block_size='{{$item->block_size}}'>{{$item->block_size}} kg</option>@endforeach</select></div><div class='col-md-5'><label>Size</label><select type='text' class='form-control size_select'><option>--Select--</option>@foreach ($blocks_size as $itemx)<option value='{{$itemx->id}}' data-size='{{$itemx->size}}'>{{$itemx->size}}</option>@endforeach</select></div><div class='col-md-1' style='margin-top: 4%'><button class='btn btn-success add_btn' data-key="+key+" data-batch_code="+product.batch_code+" data-grade_block_id="+product.id+" type='button'>+ Add</button></div></div><br><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Action</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.grade_to_block').append(append);
                                        });
                                        var product_array = [];
                                        var block_id , block_name,block_size_id,block_size_name,grade_weight, grade_batch_code,grade_block_id = null; 
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
                                            var value  =$(this).attr("data-key");
                                            var batch_code = $(this).attr("data-batch_code");
                                            grade_block_id = $(this).attr("data-grade_block_id");
                                            console.log(value);
                                            $("table.block_table"+value+" tbody tr").empty();
                                            product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name,"grade_batch_code":batch_code,'grade_block_id':grade_block_id,"status":"stay"});
                                            $.each( product_array, function( key, product ) {
                                                if (product.status == "stay" && product.grade_batch_code == batch_code) {
                                                    let append = "<tr class='delete"+key+"'><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>";
                                                    $("table.block_table"+value+" tbody").append(append);
                                                }
                                            });
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
                                    }
                                });
                                
                            });

                        }
                        if (product.status == "BlockCounter") {
                            $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoBlockCounterModal' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                            $('.block_counter').click(function () {
                                $("table.block_counter_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.block_to_blockcounter').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover block_counter_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.block_to_blockcounter').append(append);
                                            $("table.block_counter_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td><input type='number' step='0.01' class='form-control' name='block_quantity[]' value='"+value.block_quantity+"' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.block_counter_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Soaking") {
                            $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoSoakingModal' class='btn btn-warning soakingtable' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-superpowers' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soakingtable').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            let append = "<tr id='"+key+"'><td>"+product.grade_name+" kg</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='soaking weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>";
                                            $("table.hlso_soaking_table tbody").append(append);
                                        });
                                        $('.soaking_weight').on("change keyup",function() {
                                            var soaking_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((soaking_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoExcessVolumeModal' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                            $('.excess_volume').click(function () {
                                $("table.excess_volume_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.blockcounter_to_excess_volume').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover excess_volume_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.blockcounter_to_excess_volume').append(append);
                                            $("table.excess_volume_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='excess_volume[]' value='"+value.excess_volume+"' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+value.id+"'></td></tr>";
                                                $("table.excess_volume_table"+key+" tbody").append(append);
                                            });
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#ptoReturnModal' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.block_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.raw_bf_data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $('.randw_div').empty();
                                        $.each( data, function( key, product ) {
                                            let  append="<div class='col-md-12' style='text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;margin-top:2%;'>Grade:<b>"+product.grade_name+"</b> || Grade_Weight:"+product.grade_quantity+" || Soaking_weight:"+product.soaking_weight+"</div><div class='col-md-12' style='margin-top:2%;'><table class='table table-striped table-bordered table-hover randw_table"+key+"'><thead><tr><th style='text-align: center'>Block Size</th><th style='text-align: center'>Size</th><th style='text-align: center'>Block Counter</th><th style='text-align: center'>Excess Volume</th></tr></thead><tbody><tr></tr></tbody></div>";
                                            $('.randw_div').append(append);
                                            $("table.randw_table"+key+" tbody tr").empty();
                                            $.each(product.production_processing_grades, function (keyy,value) {
                                                let append = "<tr id='"+keyy+"'><td>"+value.block_name+" kg</td><td>"+value.block_size+"</td><td>"+value.block_quantity+"</td><td>"+value.excess_volume+"</td></tr>";
                                                $("table.randw_table"+key+" tbody").append(append);
                                            });
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