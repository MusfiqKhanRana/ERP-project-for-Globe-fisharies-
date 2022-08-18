
@extends('backend.master')
@section('site-title')
    Cooked IQF
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark"><b>Production Management</b>
                <small>Cooked IQF</small>
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
                            <li style="margin-bottom:5px;" class="active"><a href="#cooked_hoso" class="cooked_hoso" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HOSO({{$hoso_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#cooked_pud" class="cooked_pud" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD({{$pud_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#cooked_p_d_tail_on" class="cooked_p_d_tail_on" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail on({{$p_n_d_tail_on_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#cooked_p_d_tail_off" class="cooked_p_d_tail_off" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail Off({{$p_n_d_tail_off_count}})</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            <div class="tab-pane active" id="cooked_hoso">
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
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="cooked_pud">
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
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="cooked_p_d_tail_on">
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
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="cooked_p_d_tail_off">
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
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!--------HOSO Modals-------->
                            @include('backend.production.processing.cooked_iqf.modals.hoso.processData_hoso')
                            @include('backend.production.processing.cooked_iqf.modals.hoso.grading_hoso')
                            @include('backend.production.processing.cooked_iqf.modals.hoso.soaking_hoso')
                            @include('backend.production.processing.cooked_iqf.modals.hoso.glazing_hoso')
                            @include('backend.production.processing.cooked_iqf.modals.hoso.WastageReturn_hoso')

                            <!--------PUD Modals-------->
                            @include('backend.production.processing.cooked_iqf.modals.pud.processData_pud')
                            @include('backend.production.processing.cooked_iqf.modals.pud.grading_pud')
                            @include('backend.production.processing.cooked_iqf.modals.pud.soaking_pud')
                            @include('backend.production.processing.cooked_iqf.modals.pud.glazing_pud')
                            @include('backend.production.processing.cooked_iqf.modals.pud.WastageReturn_pud')

                            <!--------P & D Tail On Modals-------->
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.processData_p_d_tail_on')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.grading_p_d_tail_on')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.soaking_p_d_tail_on')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.glazing_p_d_tail_on')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.WastageReturn_p_d_tail_on')

                            <!--------P & D Tail Off Modals-------->
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.processData_p_d_tail_off')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.grading_p_d_tail_off')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.soaking_p_d_tail_off')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.glazing_p_d_tail_off')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.WastageReturn_p_d_tail_off')       
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
                    'type' : 'cooked_iqf_shrimp',
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
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_hoso' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_hoso' class='btn btn-primary grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.hoso_grading_table tbody tr").empty();
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
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.hoso_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Soaking") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_hoso' class='btn btn-warning soaking' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.hoso_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.hoso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_hoso' class='btn btn-info glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.hoso_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hoso_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.soaking_weight+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var soaking_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - soaking_weight)/soaking_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_hoso' class='btn btn-danger randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.hoso_randw_table tbody tr").empty();
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
        $('.cooked_hoso').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'hoso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'cooked_iqf_shrimp',
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
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_hoso' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_hoso' class='btn btn-primary grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.hoso_grading_table tbody tr").empty();
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
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.hoso_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Soaking") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_hoso' class='btn btn-warning soaking' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.hoso_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.hoso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='text' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td><td><span class='percentage"+key+"'></span></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_hoso' class='btn btn-info glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.hoso_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hoso_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hoso_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.soaking_weight+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var soaking_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - soaking_weight)/soaking_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hoso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_hoso' class='btn btn-danger randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.hoso_randw_table tbody tr").empty();
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
        $('.cooked_pud').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'pud';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'cooked_iqf_shrimp',
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
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_pud' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_pud' class='btn btn-primary grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pud_grading_table tbody tr").empty();
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
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.pud_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Soaking") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_pud' class='btn btn-warning soaking' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pud_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pud_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td><td><span class='percentage"+key+"'></span></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_pud' class='btn btn-info glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pud_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pud_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.soaking_weight+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var soaking_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - soaking_weight)/soaking_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_pud' class='btn btn-danger randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pud_randw_table tbody tr").empty();
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
        $('.cooked_p_d_tail_on').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'p_n_d_tail_on';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'cooked_iqf_shrimp',
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
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_p_d_tail_on' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_p_d_tail_on' class='btn btn-primary grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pd_tail_on_grading_table tbody tr").empty();
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
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.pd_tail_on_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Soaking") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_p_d_tail_on' class='btn btn-warning soaking' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pd_tail_on_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pd_tail_on_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_on_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td><td><span class='percentage"+key+"'></span></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_p_d_tail_on' class='btn btn-info glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pd_tail_on_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_on_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_on_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.soaking_weight+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var soaking_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - soaking_weight)/soaking_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_p_d_tail_on' class='btn btn-danger randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pd_tail_on_randw_table tbody tr").empty();
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
        $('.cooked_p_d_tail_off').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'p_n_d_tail_off';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'cooked_iqf_shrimp',
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
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_p_d_tail_off' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grading_p_d_tail_off' class='btn btn-primary grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pd_tail_off_grading_table tbody tr").empty();
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
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.pd_tail_off_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Soaking") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_p_d_tail_off' class='btn btn-warning soaking' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pd_tail_off_soaking_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pd_tail_off_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_off_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control soaking_weight' name='soaking_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td><td><span class='percentage"+key+"'></span></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_p_d_tail_off' class='btn btn-info glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pd_tail_off_glazing_table tbody tr").empty();
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
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_off_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_off_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.soaking_weight+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var soaking_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - soaking_weight)/soaking_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_p_d_tail_off' class='btn btn-danger randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pd_tail_off_randw_table tbody tr").empty();
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



