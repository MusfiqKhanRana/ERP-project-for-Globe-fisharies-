
@extends('backend.master')
@section('site-title')
   Block Frozen
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
                            <li style="margin-bottom:5px;" class="active"><a class="whole" href="#tab_a" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole({{$whole_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a class="clean" href="#tab_b" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Clean({{$clean_count}})</b></a></li>
                            <li style="margin-bottom:5px;"><a class="slice" href="#tab_c" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Slice({{$slice_count}})</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            @include('backend.production.processing.block_frozen.whole.index')
                            @include('backend.production.processing.block_frozen.clean.index')
                            @include('backend.production.processing.block_frozen.slice.index')
                            <!--------Whole Modals---------->
                            @include('backend.production.processing.block_frozen.whole.modals.processData')
                            @include('backend.production.processing.block_frozen.whole.modals.blocking')
                            @include('backend.production.processing.block_frozen.whole.modals.blockCounter')
                            @include('backend.production.processing.block_frozen.whole.modals.excessVolume')
                            @include('backend.production.processing.block_frozen.whole.modals.WastageReturn')
                            <!--------Clean Modals----------->
                            @include('backend.production.processing.block_frozen.clean.modals.processData_b')
                            @include('backend.production.processing.block_frozen.clean.modals.blocking_b')
                            @include('backend.production.processing.block_frozen.clean.modals.blockCounter_b')
                            @include('backend.production.processing.block_frozen.clean.modals.excessVolume_b')
                            @include('backend.production.processing.block_frozen.clean.modals.WastageReturn_b')
                            <!-------Slice Modals------------>
                            @include('backend.production.processing.block_frozen.slice.modals.processData_c')
                            @include('backend.production.processing.block_frozen.slice.modals.blocking_c')
                            @include('backend.production.processing.block_frozen.slice.modals.blockCounter_c')
                            @include('backend.production.processing.block_frozen.slice.modals.excessVolume_c')
                            @include('backend.production.processing.block_frozen.slice.modals.WastageReturn_c')
                        </div><!-- tab content -->
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


        id = 'whole';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'block_frozen',
                    'sub_type' : 'whole',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#whole_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        if (product.status == "Initial") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' data-toggle='modal' href='#processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blocking' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
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
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blockCounter' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
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
                                            $("table.block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' class='form-control' name='block_quantity[]' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "ExcessVolume") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#excessVolume' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
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
                                            $("table.excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' class='form-control' name='excess_volume[]' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
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
                                            $("table.block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.excess_volume+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });

        $('.whole').on("click",function() {
                id = 'whole';
                $.ajax({
                    type:"POST",
                    url:"{{route('production.processing-unit.iqf.data_pass')}}",
                    data:{
                        'type' : 'block_frozen',
                        'sub_type' : 'whole',
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $("table#whole_table tbody tr").empty();
                        $.each( data, function( key, product ) {
                            if (product.status == "Initial") {
                                $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' data-toggle='modal' href='#processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blocking' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
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
                                $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blockCounter' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
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
                                                $("table.block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' class='form-control' name='block_quantity[]' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "ExcessVolume") {
                                $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#excessVolume' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
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
                                                $("table.excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' class='form-control' name='excess_volume[]' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "RandW") {
                                $("table#whole_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
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
                                                $("table.block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.excess_volume+"</td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                        });
                    }
            });
        });
        $('.clean').on("click",function() {
                id = 'clean';
                $.ajax({
                    type:"POST",
                    url:"{{route('production.processing-unit.iqf.data_pass')}}",
                    data:{
                        'type' : 'block_frozen',
                        'sub_type' : 'clean',
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $("table#clean_table tbody tr").empty();
                        $.each( data, function( key, product ) {
                            if (product.status == "Initial") {
                                $("table#clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' data-toggle='modal' href='#processData_b' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                $("table#clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blocking_b' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                                $('.blocking').click(function () {
                                    $("table.clean_block_table tbody tr").empty();
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
                                        $("table.clean_block_table tbody tr").empty();
                                        product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                        $.each( product_array, function( key, product ) {
                                            $("table.clean_block_table tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                        });
                                        $(".inputs").val('');
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.block_select').val("");
                                        $('.size_select').val("");
                                    })
                                });

                            }
                            if (product.status == "BlockCounter") {
                                $("table#clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blockCounter_b' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                                $('.block_counter').click(function () {
                                    $("table.clean_block_counter_table tbody tr").empty();
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
                                            $("table.clean_block_counter_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.clean_block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' class='form-control' name='block_quantity[]' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "ExcessVolume") {
                                $("table#clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#excessVolume_b' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                                $('.excess_volume').click(function () {
                                    $("table.clean_excess_volume_table tbody tr").empty();
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
                                            $("table.clean_excess_volume_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.clean_excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' class='form-control' name='excess_volume[]' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "RandW") {
                                $("table#clean_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_b' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                                $('.randw').click(function () {
                                    $("table.clean_block_randw_table tbody tr").empty();
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
                                            $("table.clean_block_randw_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.clean_block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.excess_volume+"</td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                        });
                    }
            });
        });
        $('.slice').on("click",function() {
                id = 'slice';
                $.ajax({
                    type:"POST",
                    url:"{{route('production.processing-unit.iqf.data_pass')}}",
                    data:{
                        'type' : 'block_frozen',
                        'sub_type' : 'slice',
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                        $("table#slice_table tbody tr").empty();
                        $.each( data, function( key, product ) {
                            if (product.status == "Initial") {
                                $("table#slice_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' data-toggle='modal' href='#processData_c' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
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
                                $("table#slice_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blocking_c' class='btn btn-success blocking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-bar-chart' aria-hidden='true'></i> Bloicking</button></td></tr>");
                                $('.blocking').click(function () {
                                    $("table.slice_block_table tbody tr").empty();
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
                                        $("table.slice_block_table tbody tr").empty();
                                        product_array.push({"block_id":block_id,"block_name":block_name,"block_size_id":block_size_id,"block_size_name":block_size_name});
                                        $.each( product_array, function( key, product ) {
                                            $("table.slice_block_table tr").last().after("<tr><td>"+product.block_name+"</td><td>"+product.block_size_name+"</td></tr>");
                                        });
                                        $(".inputs").val('');
                                        $(".inputs").val(JSON.stringify(product_array));
                                        $('.block_select').val("");
                                        $('.size_select').val("");
                                    })
                                });

                            }
                            if (product.status == "BlockCounter") {
                                $("table#slice_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#blockCounter_c' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"' class='btn blue block_counter'><i class='fa fa-calculator' aria-hidden='true'></i> Block Counter</button></td></tr>");
                                $('.block_counter').click(function () {
                                    $("table.slice_block_counter_table tbody tr").empty();
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
                                            $("table.slice_block_counter_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.slice_block_counter_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td><input type='number' class='form-control' name='block_quantity[]' placeholder='Block Quantity'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "ExcessVolume") {
                                $("table#slice_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#excessVolume_c' class='btn btn-warning excess_volume' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Excess Volume</button></td></tr>");
                                $('.excess_volume').click(function () {
                                    $("table.slice_excess_volume_table tbody tr").empty();
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
                                            $("table.slice_excess_volume_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.slice_excess_volume_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td><input type='number' class='form-control' name='excess_volume[]' placeholder='excess volume'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                            });
                                        }
                                    });
                                });
                            }
                            if (product.status == "RandW") {
                                $("table#slice_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_c' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                                $('.randw').click(function () {
                                    $("table.slice_block_randw_table tbody tr").empty();
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
                                            $("table.slice_block_randw_table tbody tr").empty();
                                            $.each( data, function( key, product ) {
                                                $("table.slice_block_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.block_name+" kg</td><td>"+product.block_size+"</td><td>"+product.block_quantity+"</td><td>"+product.excess_volume+"</td></tr>");
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



