
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
                            <li style="margin-bottom:5px;" class="active"><a href="#fillet" data-id="fillet" class="fillet" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Fillet({{$fillet_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#whole" class="whole" data-id="whole" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole({{$whole_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#whole_gutted" class="whole_gutted" data-id="whole_gutted" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole Gutted({{$whole_gutted_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#cleaned" class="cleaned" data-id="cleaned" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Cleaned({{$cleaned_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#sliced_fmly" class="sliced_fmly" data-id="sliced_fmly" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Sliced(Family Cut) ({{$sliced_fmly_cut_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#sliced_chinese" class="sliced_chinese" data-id="sliced_chinese" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Sliced(Chinese Cut) ({{$sliced_chinese_cut_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#butter_fly" class="butter_fly" data-id="butter_fly" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Butter Fly({{$butter_fly_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#hgto" class="hgto" data-id="hgto" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HGTO({{$hgto_count}})</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                                @include('backend.production.processing.iqf.fillet.index')
                                @include('backend.production.processing.iqf.whole.index')
                                @include('backend.production.processing.iqf.whole_gutted.index')
                                @include('backend.production.processing.iqf.cleaned.index')
                                @include('backend.production.processing.iqf.sliced_fmly.index')
                                @include('backend.production.processing.iqf.sliced_chinese.index')
                                @include('backend.production.processing.iqf.butter_fly.index')
                                @include('backend.production.processing.iqf.hgto.index')
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
            id = 'fillet';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'fillet',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    // console.log(data);
                    $("table#fillet_table tbody tr").empty();
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
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"' data-toggle='modal' href='#filletProcessingDataModal' class='btn btn-success fillet_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Raw Filleting</button></td></tr>");
                            $('.fillet_processing').click(function () {
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((fillet_qty) - a)/(fillet_qty))*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletGradingModal' class='btn btn-primary iqf_grading'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.iqf_grading').click(function () {
                                $("table.fillet_grading_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.grade_ppu_id').val(ppu_id);
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
                                    $("table.fillet_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.fillet_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                            // console.log(data);
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(parseFloat(product.alive_quantity)+parseFloat(product.dead_quantity))+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletSoakingModal' class='btn btn-warning iqf_soaking' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.iqf_soaking').click(function () {
                                $("table.fillet_soaking_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                $('.fillet_soaking_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((initial_weight) - a)/(initial_weight))*100);
                                    p = p.toFixed(2);
                                    $('.Soaking_percentage').html(p+'%');
                                });
                                // console.log(initial_weight);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.soaking_ppu_id').val(ppu_id);
                                $('.filleting_weight').html(initial_weight);
                                $('.filleting_date_time').html(initial_weight_datetime);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.fillet_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletGlazingModal' class='btn btn-info iqf_glazing' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-fillet_soaking_weight='"+product.fillet_soaking_weight+"' data-fillet_soaking_weight_datetime='"+product.fillet_soaking_weight_datetime+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.fillet_glazing_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var fillet_soaking_weight = $(this).attr("data-fillet_soaking_weight");
                                var fillet_soaking_weight_datetime = $(this).attr("data-fillet_soaking_weight_datetime");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $('.filleting_weight').html(initial_weight);
                                $('.filleting_date_time').html(initial_weight_datetime);
                                $('.fillet_soaking_weight').html(fillet_soaking_weight);
                                $('.fillet_soaking_date_time').html(fillet_soaking_weight_datetime);
                                $('.fillet_glazing_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((a - (fillet_soaking_weight))/(fillet_soaking_weight))*100);
                                    p = p.toFixed(2);
                                    $('.glazing_percentage').html(p+'%');
                                });
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.fillet_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletReturnModal' class='btn btn-danger iqf_randw' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-fillet_soaking_weight='"+product.fillet_soaking_weight+"' data-fillet_soaking_weight_datetime='"+product.fillet_soaking_weight_datetime+"' data-fillet_glazing_weight='"+product.fillet_glazing_weight+"' data-fillet_glazing_weight_datetime='"+product.fillet_glazing_weight_datetime+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.fillet_randw_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var fillet_soaking_weight = $(this).attr("data-fillet_soaking_weight");
                                var fillet_soaking_weight_datetime = $(this).attr("data-fillet_soaking_weight_datetime");
                                var fillet_glazing_weight = $(this).attr("data-fillet_glazing_weight");
                                var fillet_glazing_weight_datetime = $(this).attr("data-fillet_glazing_weight_datetime");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $('.filleting_weight').html(initial_weight);
                                $('.filleting_date_time').html(initial_weight_datetime);
                                $('.fillet_soaking_weight').html(fillet_soaking_weight);
                                $('.fillet_soaking_date_time').html(fillet_soaking_weight_datetime);
                                $('.fillet_glazing_weight').html(fillet_glazing_weight);
                                $('.fillet_glazing_weight_datetime').html(fillet_glazing_weight_datetime);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.fillet_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        $('.fillet').on("load click",function() {
            // $(".fillet_tbody").empty();
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'fillet',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    // console.log(data);
                    $("table#fillet_table tbody tr").empty();
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
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"' data-toggle='modal' href='#filletProcessingDataModal' class='btn btn-success fillet_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Raw Filleting</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.fillet_processing').click(function () {
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
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
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletGradingModal' class='btn btn-primary iqf_grading'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.iqf_grading').click(function () {
                                $("table.fillet_grading_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.grade_ppu_id').val(ppu_id);
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
                                    $("table.fillet_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.fillet_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                            // console.log(data);
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletSoakingModal' class='btn btn-warning iqf_soaking' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.iqf_soaking').click(function () {
                                $("table.fillet_soaking_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                $('.fillet_soaking_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((initial_weight) - a)/(initial_weight))*100);
                                    p = p.toFixed(2);
                                    $('.Soaking_percentage').html(p+'%');
                                });
                                // console.log(initial_weight);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.soaking_ppu_id').val(ppu_id);
                                $('.filleting_weight').html(initial_weight);
                                $('.filleting_date_time').html(initial_weight_datetime);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.fillet_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletGlazingModal' class='btn btn-info iqf_glazing' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-fillet_soaking_weight='"+product.fillet_soaking_weight+"' data-fillet_soaking_weight_datetime='"+product.fillet_soaking_weight_datetime+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.fillet_glazing_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var fillet_soaking_weight = $(this).attr("data-fillet_soaking_weight");
                                var fillet_soaking_weight_datetime = $(this).attr("data-fillet_soaking_weight_datetime");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $('.filleting_weight').html(initial_weight);
                                $('.filleting_date_time').html(initial_weight_datetime);
                                $('.fillet_soaking_weight').html(fillet_soaking_weight);
                                $('.fillet_soaking_date_time').html(fillet_soaking_weight_datetime);
                                $('.fillet_glazing_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((a - (fillet_soaking_weight))/(fillet_soaking_weight))*100);
                                    p = p.toFixed(2);
                                    $('.glazing_percentage').html(p+'%');
                                });
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.fillet_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletReturnModal' class='btn btn-danger iqf_randw' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-fillet_soaking_weight='"+product.fillet_soaking_weight+"' data-fillet_soaking_weight_datetime='"+product.fillet_soaking_weight_datetime+"' data-fillet_glazing_weight='"+product.fillet_glazing_weight+"' data-fillet_glazing_weight_datetime='"+product.fillet_glazing_weight_datetime+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.fillet_randw_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var fillet_soaking_weight = $(this).attr("data-fillet_soaking_weight");
                                var fillet_soaking_weight_datetime = $(this).attr("data-fillet_soaking_weight_datetime");
                                var fillet_glazing_weight = $(this).attr("data-fillet_glazing_weight");
                                var fillet_glazing_weight_datetime = $(this).attr("data-fillet_glazing_weight_datetime");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $('.filleting_weight').html(initial_weight);
                                $('.filleting_date_time').html(initial_weight_datetime);
                                $('.fillet_soaking_weight').html(fillet_soaking_weight);
                                $('.fillet_soaking_date_time').html(fillet_soaking_weight_datetime);
                                $('.fillet_glazing_weight').html(fillet_glazing_weight);
                                $('.fillet_glazing_weight_datetime').html(fillet_glazing_weight_datetime);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.fillet_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        });
        $('.whole').click(function() {
            // $(".whole_tbody").empty();
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'whole',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#whole_table tbody tr").empty();
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
                        // $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#wholeProcessingDataModal' class='btn btn-success'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button><button style='margin-bottom:3px' data-toggle='modal' href='#wholeGradingModal' class='btn btn-primary'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button><button style='margin-bottom:3px' data-toggle='modal' href='#wholeGlazingModal' class='btn btn-info'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button><button style='margin-bottom:3px' data-toggle='modal' href='#wholeReturnModal' class='btn btn-danger'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                        // $('.whole_invoice').html(product.requisition_code);
                        // $('.whole_item').html(product.production_processing_item.name);
                        // $('.whole_qty').html(total_quantity);
                        if (product.status == "Initial") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"' data-toggle='modal' href='#wholeProcessingDataModal' class='btn btn-success whole_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.whole_processing').click(function () {
                                var whole_invoice = $(this).attr("data-fillet_invoice");
                                var whole_item = $(this).attr("data-fillet_item");
                                var whole_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.whole_invoice').html(whole_invoice);
                                $('.whole_item').html(whole_item);
                                $('.whole_qty').html((whole_qty));
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
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#wholeGradingModal' class='btn btn-primary iqf_grading'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-Initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'  data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.iqf_grading').click(function () {
                                $("table.whole_grading_table tbody tr").empty();
                                var whole_invoice = $(this).attr("data-fillet_invoice");
                                var whole_item = $(this).attr("data-fillet_item");
                                var whole_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(initial_weight);
                                $('.whole_invoice').html(whole_invoice);
                                $('.whole_item').html(whole_item);
                                $('.whole_qty').html((whole_qty));
                                $('.grade_ppu_id').val(ppu_id);
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
                                    $("table.whole_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        console.log(product);
                                        if (product.status == "stay") {
                                            $("table.whole_grading_table tr").last().after("<tr class='delete"+key+"' id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button type='button' class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                                });
                            });

                        }
                        if (product.status == "Glazing") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#wholeGlazingModal' class='btn btn-info iqf_glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.whole_glazing_table tbody tr").empty();
                                var whole_invoice = $(this).attr("data-fillet_invoice");
                                var whole_item = $(this).attr("data-fillet_item");
                                var whole_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.whole_invoice').html(whole_invoice);
                                $('.whole_item').html(whole_item);
                                $('.whole_qty').html((whole_qty));
                                $('.glazing_ppu_id').val(ppu_id);
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
                                        $("table.whole_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.whole_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#wholeReturnModal' class='btn btn-danger iqf_randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.whole_randw_table tbody tr").empty();
                                var whole_invoice = $(this).attr("data-fillet_invoice");
                                var whole_item = $(this).attr("data-fillet_item");
                                var whole_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(product);
                                $('.whole_invoice').html(whole_invoice);
                                $('.whole_item').html(whole_item);
                                $('.whole_qty').html((whole_qty));
                                $('.randw_ppu_id').val(ppu_id);
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
                                        $("table.whole_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.whole_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        });
        $('.whole_gutted').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'whole_gutted',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#whole_gutted_table tbody tr").empty();
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
                        // $("table#whole_gutted_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_guttedProcessingDataModal' class='btn btn-success'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button><button style='margin-bottom:3px' data-toggle='modal' href='#whole_guttedCleanModal' class='btn btn-warning'><i class='fa fa-refresh' aria-hidden='true'></i> Gutted Clean</button><button style='margin-bottom:3px' data-toggle='modal' href='#whole_guttedGradingModal' class='btn btn-primary'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button><button style='margin-bottom:3px' data-toggle='modal' href='#whole_guttedGlazingModal' class='btn btn-info'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button><button style='margin-bottom:3px' data-toggle='modal' href='#whole_guttedReturnModal' class='btn btn-danger'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                        // $('.whole_gutted_invoice').html(product.requisition_code);
                        // $('.whole_gutted_item').html(product.production_processing_item.name);
                        // $('.whole_gutted_qty').html(total_quantity);
                        if (product.status == "Initial") {
                            $("table#whole_gutted_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"' data-toggle='modal' href='#whole_guttedProcessingDataModal' class='btn btn-success whole_gutted_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.whole_gutted_processing').click(function () {
                                var whole_gutted_invoice = $(this).attr("data-fillet_invoice");
                                var whole_gutted_item = $(this).attr("data-fillet_item");
                                var whole_gutted_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");                               
                                console.log(ppu_id);
                                $('.whole_gutted_invoice').html(whole_gutted_invoice);
                                $('.whole_gutted_item').html(whole_gutted_item);
                                $('.whole_gutted_qty').html((whole_gutted_qty));
                                $('.whole_gutted_ppu_id').val(ppu_id);
                                var product_array = [];
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Clean") {
                            $("table#whole_gutted_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_guttedCleanModal' class='btn btn-warning whole_gutted_clean' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Gutted Clean</button></td></tr>");
                            $('.whole_gutted_clean').click(function () {
                                var whole_gutted_invoice = $(this).attr("data-fillet_invoice");
                                var whole_gutted_item = $(this).attr("data-fillet_item");
                                var whole_gutted_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(initial_weight_datetime);
                                $('.whole_gutted_invoice').html(whole_gutted_invoice);
                                $('.whole_gutted_item').html(whole_gutted_item);
                                $('.whole_gutted_qty').html((whole_gutted_qty));
                                $('.whole_gutted_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                var product_array = [];
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((initial_weight) - a)/(initial_weight))*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "Grading") {
                            $("table#whole_gutted_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_guttedGradingModal' class='btn btn-primary iqf_grading' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.iqf_grading').click(function () {
                                $("table.whole_gutted_grading_table tbody tr").empty();
                                var whole_gutted_invoice = $(this).attr("data-fillet_invoice");
                                var whole_gutted_item = $(this).attr("data-fillet_item");
                                var whole_gutted_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(cleaning_weight);
                                $('.whole_gutted_invoice').html(whole_gutted_invoice);
                                $('.whole_gutted_item').html(whole_gutted_item);
                                $('.whole_gutted_qty').html((whole_gutted_qty));
                                $('.grade_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                var product_array = [];
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
                                    $("table.whole_gutted_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.whole_gutted_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#whole_gutted_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_guttedGlazingModal' class='btn btn-info iqf_glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"'  data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.whole_gutted_glazing_table tbody tr").empty();
                                var whole_gutted_invoice = $(this).attr("data-fillet_invoice");
                                var whole_gutted_item = $(this).attr("data-fillet_item");
                                var whole_gutted_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.whole_gutted_invoice').html(whole_gutted_invoice);
                                $('.whole_gutted_item').html(whole_gutted_item);
                                $('.whole_gutted_qty').html((whole_gutted_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                var product_array = [];
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.whole_gutted_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.whole_gutted_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#whole_gutted_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#whole_guttedReturnModal' class='btn btn-danger iqf_randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.whole_gutted_randw_table tbody tr").empty();
                                var whole_gutted_invoice = $(this).attr("data-fillet_invoice");
                                var whole_gutted_item = $(this).attr("data-fillet_item");
                                var whole_gutted_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.whole_gutted_invoice').html(whole_gutted_invoice);
                                $('.whole_gutted_item').html(whole_gutted_item);
                                $('.whole_gutted_qty').html((whole_gutted_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                var product_array = [];
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.whole_gutted_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.whole_gutted_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        });
        $('.cleaned').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'cleaned',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#cleaned_table tbody tr").empty();
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
                        // $("table#cleaned_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cleanedProcessingDataModal' class='btn btn-success'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button><button style='margin-bottom:3px' data-toggle='modal' href='#cleanedcleangModal' class='btn btn-warning'><i class='fa fa-refresh' aria-hidden='true'></i>Clean</button><button style='margin-bottom:3px' data-toggle='modal' href='#cleanedGradingModal' class='btn btn-primary'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button><button style='margin-bottom:3px' data-toggle='modal' href='#cleanedGlazingModal' class='btn btn-info'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button><button style='margin-bottom:3px' data-toggle='modal' href='#cleanedReturnModal' class='btn btn-danger'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                        // $('.cleaned_invoice').html(product.requisition_code);
                        // $('.cleaned_item').html(product.production_processing_item.name);
                        // $('.cleaned_qty').html(total_quantity);
                        if (product.status == "Initial") {
                            $("table#cleaned_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"' data-toggle='modal' href='#cleanedProcessingDataModal' class='btn btn-success cleaned_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.cleaned_processing').click(function () {
                                var cleaned_invoice = $(this).attr("data-fillet_invoice");
                                var cleaned_item = $(this).attr("data-fillet_item");
                                var cleaned_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.cleaned_invoice').html(cleaned_invoice);
                                $('.cleaned_item').html(cleaned_item);
                                $('.cleaned_qty').html((cleaned_qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Clean") {
                            $("table#cleaned_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cleanedcleangModal' class='btn btn-warning cleaned_clean' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i>Clean</button></td></tr>");
                            $('.cleaned_clean').click(function () {
                                var cleaned_invoice = $(this).attr("data-fillet_invoice");
                                var cleaned_item = $(this).attr("data-fillet_item");
                                var cleaned_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.cleaned_invoice').html(cleaned_invoice);
                                $('.cleaned_item').html(cleaned_item);
                                $('.cleaned_qty').html((cleaned_qty));
                                $('.cleaned_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "Grading") {
                            $("table#cleaned_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cleanedGradingModal' class='btn btn-primary cleaned_grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.cleaned_grading').click(function () {
                                $("table.cleaned_grading_table tbody tr").empty();
                                var cleaned_invoice = $(this).attr("data-fillet_invoice");
                                var cleaned_item = $(this).attr("data-fillet_item");
                                var cleaned_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.cleaned_invoice').html(cleaned_invoice);
                                $('.cleaned_item').html(cleaned_item);
                                $('.cleaned_qty').html((cleaned_qty));
                                $('.grade_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
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
                                    $("table.cleaned_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.cleaned_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#cleaned_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cleanedGlazingModal' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' class='btn btn-info iqf_glazing' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.cleaned_glazing_table tbody tr").empty();
                                var cleaned_invoice = $(this).attr("data-fillet_invoice");
                                var cleaned_item = $(this).attr("data-fillet_item");
                                var cleaned_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.cleaned_invoice').html(cleaned_invoice);
                                $('.cleaned_item').html(cleaned_item);
                                $('.cleaned_qty').html((cleaned_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.cleaned_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.cleaned_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#cleaned_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#cleanedReturnModal' class='btn btn-danger iqf_randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.cleaned_randw_table tbody tr").empty();
                                var cleaned_invoice = $(this).attr("data-fillet_invoice");
                                var cleaned_item = $(this).attr("data-fillet_item");
                                var cleaned_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.cleaned_invoice').html(cleaned_invoice);
                                $('.cleaned_item').html(cleaned_item);
                                $('.cleaned_qty').html((cleaned_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.cleaned_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.cleaned_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        });
        $('.sliced_fmly').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'sliced_fmly_cut',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#sliced_fmly_table tbody tr").empty();
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
                        // $("table#sliced_fmly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_fmlyProcessingDataModal' class='btn btn-success'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_fmlyCLeaningModal' class='btn btn-warning'><i class='fa fa-refresh' aria-hidden='true'></i>Cleaning</button><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_fmlyGradingModal' class='btn btn-primary'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_fmlyGlazingModal' class='btn btn-info'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_fmlyReturnModal' class='btn btn-danger'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                        // $('.sliced_fmly_invoice').html(product.requisition_code);
                        // $('.sliced_fmly_item').html(product.production_processing_item.name);
                        // $('.sliced_fmly_qty').html(total_quantity);

                        if (product.status == "Initial") {
                            $("table#sliced_fmly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"' data-toggle='modal' href='#sliced_fmlyProcessingDataModal' class='btn btn-success sliced_fmly_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.sliced_fmly_processing').click(function () {
                                var sliced_fmly_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_fmly_item = $(this).attr("data-fillet_item");
                                var sliced_fmly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.sliced_fmly_invoice').html(sliced_fmly_invoice);
                                $('.sliced_fmly_item').html(sliced_fmly_item);
                                $('.sliced_fmly_qty').html((sliced_fmly_qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Clean") {
                            $("table#sliced_fmly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_fmlyCLeaningModal' class='btn btn-warning sliced_fmly_clean' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i>Clean</button></td></tr>");
                            $('.sliced_fmly_clean').click(function () {
                                var sliced_fmly_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_fmly_item = $(this).attr("data-fillet_item");
                                var sliced_fmly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.sliced_fmly_invoice').html(sliced_fmly_invoice);
                                $('.sliced_fmly_item').html(sliced_fmly_item);
                                $('.sliced_fmly_qty').html((sliced_fmly_qty));
                                $('.cleaned_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "Grading") {
                            $("table#sliced_fmly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_fmlyGradingModal' class='btn btn-primary sliced_fmly_grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.sliced_fmly_grading').click(function () {
                                $("table.sliced_fmly_grading_table tbody tr").empty();
                                var sliced_fmly_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_fmly_item = $(this).attr("data-fillet_item");
                                var sliced_fmly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.sliced_fmly_invoice').html(sliced_fmly_invoice);
                                $('.sliced_fmly_item').html(sliced_fmly_item);
                                $('.sliced_fmly_qty').html((sliced_fmly_qty));
                                $('.grade_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
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
                                    $("table.sliced_fmly_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.sliced_fmly_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#sliced_fmly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_fmlyGlazingModal' class='btn btn-info iqf_glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.sliced_fmly_glazing_table tbody tr").empty();
                                var sliced_fmly_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_fmly_item = $(this).attr("data-fillet_item");
                                var sliced_fmly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.sliced_fmly_invoice').html(sliced_fmly_invoice);
                                $('.sliced_fmly_item').html(sliced_fmly_item);
                                $('.sliced_fmly_qty').html((sliced_fmly_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.sliced_fmly_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.sliced_fmly_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01'  class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#sliced_fmly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_fmlyReturnModal' class='btn btn-danger iqf_randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.sliced_fmly_randw_table tbody tr").empty();
                                var sliced_fmly_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_fmly_item = $(this).attr("data-fillet_item");
                                var sliced_fmly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.sliced_fmly_invoice').html(sliced_fmly_invoice);
                                $('.sliced_fmly_item').html(sliced_fmly_item);
                                $('.sliced_fmly_qty').html((sliced_fmly_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.sliced_fmly_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.sliced_fmly_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        });
        $('.sliced_chinese').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'sliced_chinese_cut',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#sliced_chinese_table tbody tr").empty();
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
                        // $("table#sliced_chinese_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_chineseProcessingDataModal' class='btn btn-success'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_chineseCleaningModal' class='btn btn-warning'><i class='fa fa-refresh' aria-hidden='true'></i>Cleaning</button><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_chineseGradingModal' class='btn btn-primary'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_chineseGlazingModal' class='btn btn-info'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_chineseReturnModal' class='btn btn-danger'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                        // $('.sliced_chinese_invoice').html(product.requisition_code);
                        // $('.sliced_chinese_item').html(product.production_processing_item.name);
                        // $('.sliced_chinese_qty').html(total_quantity);

                        if (product.status == "Initial") {
                            $("table#sliced_chinese_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"' data-toggle='modal' href='#sliced_chineseProcessingDataModal' class='btn btn-success sliced_chinese_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.sliced_chinese_processing').click(function () {
                                var sliced_chinese_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_chinese_item = $(this).attr("data-fillet_item");
                                var sliced_chinese_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.sliced_chinese_invoice').html(sliced_chinese_invoice);
                                $('.sliced_chinese_item').html(sliced_chinese_item);
                                $('.sliced_chinese_qty').html((sliced_chinese_qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Clean") {
                            $("table#sliced_chinese_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_chineseCleaningModal' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' class='btn btn-warning cleaned_clean' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i>Clean</button></td></tr>");
                            $('.cleaned_clean').click(function () {
                                var sliced_chinese_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_chinese_item = $(this).attr("data-fillet_item");
                                var sliced_chinese_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.sliced_chinese_invoice').html(sliced_chinese_invoice);
                                $('.sliced_chinese_item').html(sliced_chinese_item);
                                $('.sliced_chinese_qty').html((sliced_chinese_qty));
                                $('.cleaned_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "Grading") {
                            $("table#sliced_chinese_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_chineseGradingModal' class='btn btn-primary sliced_chinese_grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.sliced_chinese_grading').click(function () {
                                $("table.sliced_chinese_grading_table tbody tr").empty();
                                var sliced_chinese_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_chinese_item = $(this).attr("data-fillet_item");
                                var sliced_chinese_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.sliced_chinese_invoice').html(sliced_chinese_invoice);
                                $('.sliced_chinese_item').html(sliced_chinese_item);
                                $('.sliced_chinese_qty').html((sliced_chinese_qty));
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $('.grade_ppu_id').val(ppu_id);
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
                                    $("table.sliced_chinese_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.sliced_chinese_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#sliced_chinese_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_chineseGlazingModal' class='btn btn-info iqf_glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.sliced_chinese_glazing_table tbody tr").empty();
                                var sliced_chinese_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_chinese_item = $(this).attr("data-fillet_item");
                                var sliced_chinese_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.sliced_chinese_invoice').html(sliced_chinese_invoice);
                                $('.sliced_chinese_item').html(sliced_chinese_item);
                                $('.sliced_chinese_qty').html((sliced_chinese_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.sliced_chinese_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.sliced_chinese_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#sliced_chinese_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#sliced_chineseReturnModal' class='btn btn-danger iqf_randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.sliced_chinese_randw_table tbody tr").empty();
                                var sliced_chinese_invoice = $(this).attr("data-fillet_invoice");
                                var sliced_chinese_item = $(this).attr("data-fillet_item");
                                var sliced_chinese_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.sliced_chinese_invoice').html(sliced_chinese_invoice);
                                $('.sliced_chinese_item').html(sliced_chinese_item);
                                $('.sliced_chinese_qty').html((sliced_chinese_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.sliced_chinese_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.sliced_chinese_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        });
        $('.butter_fly').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'butter_fly',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#butter_fly_table tbody tr").empty();
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
                        // $("table#butter_fly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#butter_flyProcessingDataModal' class='btn btn-success'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button><button style='margin-bottom:3px' data-toggle='modal' href='#butter_flyCleaningModal' class='btn btn-warning'><i class='fa fa-refresh' aria-hidden='true'></i>Cleaning</button><button style='margin-bottom:3px' data-toggle='modal' href='#butter_flyGradingModal' class='btn btn-primary'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button><button style='margin-bottom:3px' data-toggle='modal' href='#butter_flyGlazingModal' class='btn btn-info'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button><button style='margin-bottom:3px' data-toggle='modal' href='#butter_flyReturnModal' class='btn btn-danger'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                        // $('.butter_fly_invoice').html(product.requisition_code);
                        // $('.butter_fly_item').html(product.production_processing_item.name);
                        // $('.butter_fly_qty').html(total_quantity);

                        if (product.status == "Initial") {
                            $("table#butter_fly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"' data-toggle='modal' href='#butter_flyProcessingDataModal' class='btn btn-success butter_fly_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.butter_fly_processing').click(function () {
                                var butter_fly_invoice = $(this).attr("data-fillet_invoice");
                                var butter_fly_item = $(this).attr("data-fillet_item");
                                var butter_fly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.butter_fly_invoice').html(butter_fly_invoice);
                                $('.butter_fly_item').html(butter_fly_item);
                                $('.butter_fly_qty').html((butter_fly_qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Clean") {
                            $("table#butter_fly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#butter_flyCleaningModal' class='btn btn-warning butter_fly_clean' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i>Clean</button></td></tr>");
                            $('.butter_fly_clean').click(function () {
                                var butter_fly_invoice = $(this).attr("data-fillet_invoice");
                                var butter_fly_item = $(this).attr("data-fillet_item");
                                var butter_fly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.butter_fly_invoice').html(butter_fly_invoice);
                                $('.butter_fly_item').html(butter_fly_item);
                                $('.butter_fly_qty').html((butter_fly_qty));
                                $('.cleaned_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "Grading") {
                            $("table#butter_fly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#butter_flyGradingModal' class='btn btn-primary butter_fly_grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.butter_fly_grading').click(function () {
                                $("table.butter_fly_grading_table tbody tr").empty();
                                var butter_fly_invoice = $(this).attr("data-fillet_invoice");
                                var butter_fly_item = $(this).attr("data-fillet_item");
                                var butter_fly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.butter_fly_invoice').html(butter_fly_invoice);
                                $('.butter_fly_item').html(butter_fly_item);
                                $('.butter_fly_qty').html((butter_fly_qty));
                                $('.grade_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
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
                                    $("table.butter_fly_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.butter_fly_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#butter_fly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#butter_flyGlazingModal' class='btn btn-info iqf_glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.butter_fly_glazing_table tbody tr").empty();
                                var butter_fly_invoice = $(this).attr("data-fillet_invoice");
                                var butter_fly_item = $(this).attr("data-fillet_item");
                                var butter_fly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.butter_fly_invoice').html(butter_fly_invoice);
                                $('.butter_fly_item').html(butter_fly_item);
                                $('.butter_fly_qty').html((butter_fly_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.butter_fly_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.butter_fly_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#butter_fly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#butter_flyReturnModal' class='btn btn-danger iqf_randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.butter_fly_randw_table tbody tr").empty();
                                var butter_fly_invoice = $(this).attr("data-fillet_invoice");
                                var butter_fly_item = $(this).attr("data-fillet_item");
                                var butter_fly_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.butter_fly_invoice').html(butter_fly_invoice);
                                $('.butter_fly_item').html(butter_fly_item);
                                $('.butter_fly_qty').html((butter_fly_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.butter_fly_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.butter_fly_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        }); 
        });
        $('.hgto').click(function() {
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'hgto',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#hgto_table tbody tr").empty();
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
                        // $("table#hgto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hgtoProcessingDataModal' class='btn btn-success'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button><button style='margin-bottom:3px' data-toggle='modal' href='#hgtoCleaningModal' class='btn btn-warning'><i class='fa fa-refresh' aria-hidden='true'></i>Cleaning</button><button style='margin-bottom:3px' data-toggle='modal' href='#hgtoGradingModal' class='btn btn-primary'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button><button style='margin-bottom:3px' data-toggle='modal' href='#hgtoGlazingModal' class='btn btn-info'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button><button style='margin-bottom:3px' data-toggle='modal' href='#hgtoReturnModal' class='btn btn-danger'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                        // $('.hgto_invoice').html(product.requisition_code);
                        // $('.hgto_item').html(product.production_processing_item.name);
                        // $('.hgto_qty').html(total_quantity);

                        if (product.status == "Initial") {
                            $("table#hgto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"' data-toggle='modal' href='#hgtoProcessingDataModal' class='btn btn-success hgto_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.hgto_processing').click(function () {
                                var hgto_invoice = $(this).attr("data-fillet_invoice");
                                var hgto_item = $(this).attr("data-fillet_item");
                                var hgto_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.hgto_invoice').html(hgto_invoice);
                                $('.hgto_item').html(hgto_item);
                                $('.hgto_qty').html((hgto_qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Clean") {
                            $("table#hgto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hgtoCleaningModal' class='btn btn-warning hgto_clean' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i>Clean</button></td></tr>");
                            $('.hgto_clean').click(function () {
                                var hgto_invoice = $(this).attr("data-fillet_invoice");
                                var hgto_item = $(this).attr("data-fillet_item");
                                var hgto_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                console.log(ppu_id);
                                $('.hgto_invoice').html(hgto_invoice);
                                $('.hgto_item').html(hgto_item);
                                $('.hgto_qty').html((hgto_qty));
                                $('.hgto_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.percentage').html(p+'%');
                                });
                            });

                        }
                        if (product.status == "Grading") {
                            $("table#hgto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hgtoGradingModal' class='btn btn-primary hgto_grading' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.hgto_grading').click(function () {
                                $("table.hgto_grading_table tbody tr").empty();
                                var hgto_invoice = $(this).attr("data-fillet_invoice");
                                var hgto_item = $(this).attr("data-fillet_item");
                                var hgto_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.hgto_invoice').html(hgto_invoice);
                                $('.hgto_item').html(hgto_item);
                                $('.hgto_qty').html((hgto_qty));
                                $('.grade_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
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
                                    $("table.hgto_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight,"status":"stay"});
                                    $.each( product_array, function( key, product ) {
                                        if (product.status == "stay") {
                                            $("table.hgto_grading_table tr").last().after("<tr class='delete"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
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
                        if (product.status == "Glazing") {
                            $("table#hgto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hgtoGlazingModal' class='btn btn-info iqf_glazing' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.hgto_glazing_table tbody tr").empty();
                                var hgto_invoice = $(this).attr("data-fillet_invoice");
                                var hgto_item = $(this).attr("data-fillet_item");
                                var hgto_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.hgto_invoice').html(hgto_invoice);
                                $('.hgto_item').html(hgto_item);
                                $('.hgto_qty').html((hgto_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hgto_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hgto_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control glazing_weight' name='glazing_weight[]' data-qty='"+product.grade_quantity+"' data-id='"+key+"' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><span class='percentage"+key+"'></span></td></tr>");
                                        });
                                        $('.glazing_weight').on("change keyup",function() {
                                            var glazing_weight = parseFloat($(this).val());
                                            var initial_weight = parseFloat($(this).data("qty")); 
                                            var p = (((glazing_weight - initial_weight)/initial_weight)*100);
                                            p = p.toFixed(2);
                                            $(".percentage"+$(this).data("id")).html(p+'%');
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hgto_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hgtoReturnModal' class='btn btn-danger iqf_randw' data-initial_weight='"+product.Initial_weight+"' data-initial_weight_datetime='"+product.initial_weight_datetime+"' data-cleaning_weight='"+product.cleaning_weight+"' data-cleaning_weight_datetime='"+product.cleaning_weight_datetime+"' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.hgto_randw_table tbody tr").empty();
                                var hgto_invoice = $(this).attr("data-fillet_invoice");
                                var hgto_item = $(this).attr("data-fillet_item");
                                var hgto_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                var initial_weight = $(this).attr("data-Initial_weight");
                                var initial_weight_datetime = $(this).attr("data-initial_weight_datetime");
                                var cleaning_weight = $(this).attr("data-cleaning_weight");
                                var cleaning_weight_datetime = $(this).attr("data-cleaning_weight_datetime");
                                console.log(ppu_id);
                                $('.hgto_invoice').html(hgto_invoice);
                                $('.hgto_item').html(hgto_item);
                                $('.hgto_qty').html((hgto_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $('.initial_weight').html(initial_weight);
                                $('.initial_weight_datetime').html((initial_weight_datetime));
                                $('.cleaning_weight').html(cleaning_weight);
                                $('.cleaning_weight_datetime').html((cleaning_weight_datetime));
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hgto_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hgto_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.glazing_weight+"</td></tr>");
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



