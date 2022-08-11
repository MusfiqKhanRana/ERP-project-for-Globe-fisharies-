@extends('backend.master')
@section('site-title')
    Unloading Unit
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                    <script>
                        $(document).ready(function(){
                            swal("{{Session::get('msg')}}","", "success");
                        });
                    </script>
            @endif
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Production Management
                <small> </small>
            </h3>
            <!-- END PAGE TITLE-->
            
            <div class="portlet box green">
                <div class="portlet-title col-md-12">
                    <div class="caption col-md-4">
                        <i class="fa fa-cogs"></i> Unload Unit
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <b>Supplier Info.</b>
                                </div>
                                <div class="col-md-6">
                                    {{-- @php
                                        dd($production_requistion->toArray());
                                    @endphp --}}
                                    <span>{{$production_requistion->production_supplier->name}}</span><br>
                                    <span>{{$production_requistion->production_supplier->phone}}</span><br>
                                    <span>{{$production_requistion->production_supplier->address}}</span><br>
                                </div>
                            </div>
                            <div class="row" style="margin-top:2%;margin-bottom:2%;">
                                <div class="col-md-6">
                                    <div>
                                        <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."><label for="">is there anything uncategorized?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row new_item_add" style="margin-top:2%;margin-bottom:2%;">
                                <div class="col-md-3">
                                    <label for="">Items:</label>
                                    <select class="form-control newitems" name="item" id="">
                                        <option value="">--select--</option>
                                        @foreach ($items as $item)
                                            <option value="{{$item->id}}" data-category="{{$item->category}}" data-grade="{{$item->grade->name}}" data-name="{{$item->name}}">{{$item->name}}({{$item->grade->name}})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Category:</label>
                                    <input type="text" class="form-control category">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Grade:</label>
                                    <input type="text" class="form-control grade">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Requested Qty :</label>
                                    <input type="number" class="form-control qnty" placeholder="type qty">
                                </div>
                                <div class="col-md-1"><br><button class="btn btn-success" id="addbtn">add</button></div>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('production-unload-store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <b>Items.</b>
                                    </div>
                                </div>
                                <div class="portlet-body" >
                                    <div class=" table-responsive table-scrollable">
                                        <table class="table table-striped table-bordered table-hover" id="mytable">
                                            <thead>
                                                <tr class="trtr">
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Grade</th>
                                                    <th>Req. Qty(kg)</th>
                                                    <th style="width:100%">Recived Quatity(kg)(Alive/Dead)</th>
                                                    <th>Missing Quantity(kg)</th>
                                                    <th>Return Qty</th>
                                                    <th style="width:15%">Total(kg)</th>
                                                    <th style="width:45%">Remark(short note)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $lastcount=0;
                                                @endphp
                                                <input type="hidden" name="requisition_id" value="{{$production_requistion->id}}">
                                                <input type="hidden" name="requisition_code" value="{{$production_requistion->invoice_code}}">
                                                @foreach ($production_requistion->production_requisition_items as $key=>$item)
                                                    <input type="hidden" name="id[]" value="{{$item->pivot->id}}">
                                                    <input type="hidden" name="supply_item_id[]" value="{{$item->pivot->supply_item_id}}">
                                                    <input type="hidden" name="caregory[]" value="{{$item->category}}">
                                                    <tr>
                                                        <th scope="row">{{++$key}}</th>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->category}}</td>
                                                        <td>{{$item->grade->name}}</td>
                                                        <td>{{$item->pivot->quantity}}</td>
                                                        <td style="width:100%"><div class="row"><div class="col-md-6"><label for="">Alive</label><span><input type="number" step="0.01" name="alive_quantity[]" class="form-control alive_quantity" data-id="{{$key}}" data-req_quantity="{{$item->pivot->quantity}}"></span></div><div class="col-md-6"><label for="">Dead/qty</label> <input type="number" step="0.01"  name="dead_quantity[]" data-id="{{$key}}" class="form-control dead_quantity"></div></div></td>
                                                        <td style="width:30%"><div class="row"><div class="col-md-6"><label for="">Missing</label><span class="missing_quantity{{$key}}"></span></div><div class="col-md-6"><Label>Excess</Label><span class="excess_quantity{{$key}}"></span></div></div></td>
                                                        <td><input type="number" step="0.01" name="return_quantity[]" data-id="{{$key}}" class="form-control return_quantity"></td>
                                                        <td style="width:15%"><input type="hidden" name="total_quantity[]" class="total_qty{{$key}}"><span class="total_quantity{{$key}}"></span></td>
                                                        <td style="width:45%"><input type="text" name="received_remark[]" class="form-control"></td>
                                                    </tr>
                                                    @php
                                                        $lascount = $key;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn green">Comfirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var items,grade,qnty,alive,dead,req_quantity,missing,ttl,rtn,id,supply_item_id = 0;
            var alive = [],dead =[],rtn=[],ttl=[],missing=[],req_quantity=[];
            function load() {
                $('.alive_quantity').keyup(function(){
                id = $(this).data('id');
                req_quantity[id] = $(this).data('req_quantity');
                alive[id]=parseFloat($(this).val());
                console.log(parseFloat(dead[id]));
                if(isNaN(parseFloat(dead[id]))) {
                     dead[id] = 0;
                };
                if(isNaN(parseFloat(alive[id]))) {
                    alive[id] = 0;
                };
                console.log(parseFloat(dead[id]));
                ttl[id] = parseFloat(dead[id]) + parseFloat(alive[id]);
                missing[id] =req_quantity[id]-ttl[id];
                if (missing[id]>0) {
                    $('.missing_quantity'+id).html(missing[id]);
                    $('.excess_quantity'+id).html(null);
                }
                if (missing[id]<0){
                    missing[id] = 0 - missing[id];
                    $('.excess_quantity'+id).html(missing[id]);
                    $('.missing_quantity'+id).html(null);
                }
                if (missing[id]==0){
                    missing[id] = 0 - missing[id];
                    $('.excess_quantity'+id).html(null);
                    $('.missing_quantity'+id).html(null);
                }
                console.log(1);
                $('.total_quantity'+id).html(ttl[id]);
                $('.total_qty'+id).val(ttl[id]);
                });
               function dead() {
                    $('.dead_quantity').keyup(function(){
                        id = $(this).data('id');
                        dead[id] =parseFloat($(this).val());
                        if(isNaN(parseFloat(dead[id]))) {
                            dead[id] = 0;
                        };
                        if(isNaN(parseFloat(alive[id]))) {
                            alive[id] = 0;
                        };
                        ttl[id] = parseFloat(alive[id])+parseFloat(dead[id]);
                        missing[id] =req_quantity[id]-ttl[id];
                        console.log(ttl[id]);
                        if (missing[id]>0) {
                            $('.missing_quantity'+id).html(missing[id]);
                            $('.excess_quantity'+id).html(null);
                        }
                        if (missing[id]<0){
                            missing[id] = 0 - missing[id];
                            $('.excess_quantity'+id).html(missing[id]);
                            $('.missing_quantity'+id).html(null);
                        }
                        if (missing[id]==0){
                            missing[id] = 0 - missing[id];
                            $('.excess_quantity'+id).html(null);
                            $('.missing_quantity'+id).html(null);
                        }
                        $('.total_quantity'+id).html(ttl[id]);
                        $('.total_qty'+id).val(ttl[id]);
                    });
               }
               dead();
                $('.return_quantity').keyup(function(){
                    id = $(this).data('id');
                    rtn[id] =parseFloat($(this).val());
                    $('.total_quantity'+id).html(ttl[id]-rtn[id]);
                    $('.total_qty'+id).val(ttl[id]-rtn[id]);
                });
            }
            load();
            
            $('.new_item_add').hide();
            $('#checkboxNoLabel').click(function(){
                if ($(this).is(':checked'))
                    $('.new_item_add').show();
                else
                    $('.new_item_add').hide();
            });
            var loop_lastcount = {{$lascount}};
            // console.log(loop_lastcount);
            function nullmaking(){
                $(".newitems").val(null);
                $(".grade").val(null);
                $(".qnty").val(null);
            };
            $('.newitems').change(function(){
                grade = $(this).find(':selected').attr('data-grade');
                items = $(this).find(':selected').attr('data-name');
                category = $(this).find(':selected').attr('data-category');
                supply_item_id = $(this).find(':selected').val();
                // console.log(supply_item_id);
                $('.grade').val(grade);
                $('.category').val(category);
            });
            var product_array = [];
            $("#addbtn").click(function() {
                loop_lastcount = ++loop_lastcount;
                items = items;
                console.log(items);
                grade = $(".grade").val();
                qnty = $(".qnty").val();
                product_array.push({"items":items,"category":category,"grade":grade,"qnty":qnty,"supply_item_id":supply_item_id,"status":"stay"})
                console.log(product_array);
                $("#reports").val('');
                $("#reports").val(JSON.stringify(product_array));
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        if(product_array.length-1 == key){
                            $('#mytable tr:last').after("<tr><td>"+loop_lastcount+"</td><td>"+product.items+"</td><td><input type='hidden' name='caregory[]' value='"+product.category+"'>"+product.category+"</td><td>"+product.grade+"</td><td>"+product.qnty+"</td><td style='width:100%'><div class='row'><div class='col-md-6'><label>Alive</label><input type='number' step='0.01' data-id='"+loop_lastcount+"' data-req_quantity='"+product.qnty+"' name='alive_quantity[]' class='form-control alive_quantity'></div><div class='row'><div class='col-md-6'><label>Dead/qty</label><input type='number' step='0.01' data-id='"+loop_lastcount+"' name='dead_quantity[]' class='form-control dead_quantity'></div></div></td><td style='width:30%'><div class='row'><div class='col-md-6'><label>Missing</label><span class='missing_quantity"+loop_lastcount+"'></span></div><div class='row'><div class='col-md-6'><label>Excess</label><span class='excess_quantity"+loop_lastcount+"'></span></div></div></td><td><input type='number' step='0.01' data-id='"+loop_lastcount+"' name='return_quantity[]' class='form-control return_quantity'></td><td style='width:15%'><input type='hidden' name='total_quantity[]' class='total_qty"+loop_lastcount+"'><span class='total_quantity"+loop_lastcount+"'></span></td><td style='width:45%'><input type='text' name='received_remark[]' class='form-control'><input type='hidden' name='id[]' value='no_id'><input type='hidden' name='supply_item_id[]' value="+product.supply_item_id+"></td></tr>");
                        }
                    }
                });
                nullmaking();
                load();
            });
        });
    </script>
@endsection