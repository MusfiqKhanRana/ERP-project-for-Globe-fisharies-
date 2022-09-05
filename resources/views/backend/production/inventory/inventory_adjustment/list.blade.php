@extends('backend.master')
@section('site-title')
   Inventory-Adjustment
@endsection 
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Inventory Management
            </h3>
            <a class="btn btn-danger" href="{{route('inventory.adjustment.list',"status=Pending")}}"><i class="fa fa-spinner"></i> Pending Orders ({{$pendingcount}})</a>
            <a class="btn btn-primary"  href="{{route('inventory.adjustment.list',"status=Confirm")}}"><i class="fa fa-check-circle"></i> Confirm Order ({{$confirmcount}})</a>
                <br><br>
            <!-- END PAGE TITLE-->
            
            <!--category table start-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Inventory Adjustment</div>
                    <div class="tools"> </div>
                </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">Serial</th>
                                        <th style="text-align: center;">Adjustment Type</th>
                                        <th style="text-align: center">Adjustment Name</th>
                                        <th style="text-align: center"> Target Storage</th>
                                        <th style="text-align: center"> Production Date</th>
                                        <th style="text-align: center"> Receiver Name</th>
                                        <th style="text-align: center"> Invoice Number</th>
                                        <th style="text-align: center"> Adjustment Date</th>
                                        <th style="text-align: center"> Item Name</th>
                                        <th style="text-align: center"> Processing Type</th>
                                        <th style="text-align: center"> Processing Variant</th>
                                        <th style="text-align: center"> Grade</th>
                                        <th style="text-align: center"> Block</th>
                                        <th style="text-align: center"> Block Size</th>
                                        <th style="text-align: center"> MC Size</th>
                                        <th style="text-align: center"> MC Quantity</th>
                                        <th style="text-align: center"> Quantity</th>
                                        <th style="text-align: center"> Remark</th>
                                        <th style="text-align: center"> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($adjustments as $key=> $data)
                                            <tr id="row1">
                                                <td>{{++$key}}</td>
                                                <td class="text-align: center;"> {{$data->adj_type}}</td>
                                                <td class="text-align: center;"> {{$data->adj_name}}</td>
                                                <td class="text-align: center;"> {{$data->target_storage}}</td>
                                                <td class="text-align: center;"> {{$data->production_date}}</td>
                                                <td class="text-align: center;"> {{$data->receiver_name}}</td>
                                                <td class="text-align: center;"> {{$data->invoice_no}}</td>
                                                <td class="text-align: center;"> {{$data->adjustment_date}}</td>
                                                <td class="text-align: center;">
                                                    @if ($data->supply_item)
                                                        {{$data->supply_item->name}}
                                                    @else
                                                    NULL
                                                    @endif 
                                                </td>
                                                <td class="text-align: center;"> {{$data->type}}</td>
                                                <td class="text-align: center;"> {{$data->variant}}</td>
                                                <td class="text-align: center;"> 
                                                    @if ($data->grade)
                                                        {{$data->grade->name}}
                                                    @else
                                                    NULL  
                                                    @endif
                                                </td>
                                                <td class="text-align: center;">                        
                                                    @if ($data->block)
                                                    {{$data->block->block_size}}
                                                    @else
                                                    NULL
                                                    @endif
                                                </td>
                                                <td class="text-align: center;">
                                                    @if ($data->block_size)
                                                    {{$data->block_size->size}}
                                                    @else
                                                    NULL 
                                                    @endif
                                                    </td>
                                                <td class="text-align: center;">
                                                    @if ($data->m_c_size)
                                                    {{$data->m_c_size->name}}
                                                    @else
                                                    NULL
                                                    @endif
                                                   </td>
                                                <td class="text-align: center;"> {{$data->quantity}}</td>
                                                <td class="text-align: center;"> {{$data->remark}}</td>
                                                <td class="text-align: center;">
                                                    @if ($data->status == 'Pending')
                                                        <button class="btn btn-success confirm" data-id="{{$data->id}}" data-toggle="modal" data-target="#confirmModal">Confirm</button><button class="btn btn-primary edit" data-toggle="modal" data-id="{{$data->id}}" data-target="#editModal">Edit</button><button class="btn btn-danger delete" data-toggle="modal" data-id="{{$data->id}}" data-target="#deleteModal">DELETE</button>
                                                    @else
                                                    Confirmed
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Adjustment Confirm</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <form action="{{route('inventory.adjustment.confirm')}}" class="form-horizontal" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" class="adjustment_id">
                                                        Are You Sure You Want To Confirm???
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                          </div>
                                          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Adjustment Edit</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-2 adjust_type">
                                                            <label for="product">Adjustment Type:</label>
                                                            <select class="form-control adj_type" name="adj_type" id="">
                                                                <option value="" selected>--Select--</option>
                                                                <option value="Stock In" >Stock In</option>
                                                                <option value="Stock Out">Stock Out</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="product">Adjustment Name:</label>
                                                            <select class="form-control adj_name" name="adj_name" id="">
                                                                <option value="" selected>--Select--</option>
                                                                <option class="stock_in" value="Previously Produced">Previously Produced</option>
                                                                <option class="stock_in" value="Export Return">Export Return</option>
                                                                <option class="stock_in" value="Local Sale Return">Local Sale Return</option>
                                                                <option class="stock_out" value="Provide Sample">Provide Sample</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="product">Target Storage:</label>
                                                            <select class="form-control target_storage" name="target_storage" id="">
                                                                <option value="" selected>--Select--</option>
                                                                <option class="bulk_storage" value="Bulk Storage" >Bulk Storage</option>
                                                                <option value="Export Storage 1">Export Storage 1</option>
                                                                <option value="Export Storage 2">Export Storage 2</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 production_date">
                                                            <label for="product">Production Date:</label>
                                                            <input type="date" class="form-control" name="production_date">
                                                        </div>
                                                        <div class="col-md-2 receiver_name">
                                                            <label for="product">Receiver Name:</label>
                                                            <input type="text" class="form-control" placeholder="name" name="receiver_name">
                                                        </div>
                                                        <div class="col-md-2 invoice_no">
                                                            <label for="product">Invoice No:</label>
                                                            <input type="text" class="form-control" placeholder="invoice number" name="invoice_no">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="product">Adjustment Date:</label>
                                                            <input type="date" class="form-control" name="adjustment_date">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row stock"> 
                                                        <div class="col-md-12" style="background-color: aqua;height:30px;text-align:center;">
                                                            <p><b>Available Stock :</b></p>
                                                        </div>
                                                    </div>
                                                    <hr><br>
                                                    <div class="row">
                                                        <div class="card-header">
                                                            <h4 style="text-align: center; background-color: rgb(208, 208, 241);"><b>Item Info</b></h4>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="product">Item<span class="required">* </span></label>
                                                            <select class="form-control" name="item" id="item_name">
                                                                <option value="">--Select--</option>
                                                                @foreach ($items as $supply_item)
                                                                    <option value="{{$supply_item->id}}">{{$supply_item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="product">Type<span class="required">* </span></label>
                                                            <select class="form-control type" name="type" id="type">
                                                                <option value="">--Select--</option>
                                                                <option value="iqf">IQF</option>
                                                                <option value="block_frozen">Block Frozen</option>
                                                                <option value="raw_bf_shrimp">Raw BF(Shrimp)</option>
                                                                <option value="raw_iqf_shrimp">Raw IQF(Shrimp)</option>
                                                                <option value="semi_iqf">Semi IQF</option>
                                                                <option value="cooked_iqf_shrimp">Cooked IQF(Shrimp)</option>
                                                                <option value="blanched_iqf_shrimp">Balanched IQF(Shrimp)</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="product">Variant<span class="required">* </span></label>
                                                            <select class="form-control varient" name="variant" id="variant">
                                                                <option value="">--Select--</option>
                                                                <option class="iqf" value="fillet">Fillet</option>
                                                                <option class="iqf" value="whole">Whole</option>
                                                                <option class="iqf" value="whole_gutted">Whole Gutted</option>
                                                                <option class="iqf" value="cleaned">Cleaned</option>
                                                                <option class="iqf" value="sliced_fmly_cut">Sliced(Family Cut)</option>
                                                                <option class="iqf" value="sliced_chinese_cut">Sliced(Chinese Cut)</option>
                                                                <option class="iqf" value="butter_fly">Butter Fly</option>
                                                                <option class="iqf" value="hgto">HGTO</option>
                                                                <option class="block_frozen" value="whole">Whole</option>
                                                                <option class="block_frozen" value="clean">Clean</option>
                                                                <option class="block_frozen" value="slice">Slice</option>
                                                                <option class="raw_bf_shrimp" value="hlso">HLSO</option>
                                                                <option class="raw_bf_shrimp" value="pud">PUD</option>
                                                                <option class="raw_bf_shrimp" value="p_n_d">P & D</option>
                                                                <option class="raw_bf_shrimp" value="pdto">PDTO</option>
                                                                <option class="raw_bf_shrimp" value="pto">PTO</option>
                                                                <option class="raw_iqf_shrimp" value="hlso">HLSO</option>
                                                                <option class="raw_iqf_shrimp" value="pud">PUD</option>
                                                                <option class="raw_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                                <option class="raw_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                                <option class="raw_iqf_shrimp" value="special_cut_p_n_d">Special Cut P&D</option>
                                                                <option class="raw_iqf_shrimp" value="hlso_easy_pell">HLSO Easy Pell</option>
                                                                <option class="raw_iqf_shrimp" value="butterfly_pud_skewer">Butterfly/PUD Skewer</option>
                                                                <option class="raw_iqf_shrimp" value="pud_pull_vein">PUD Pull Vein</option>
                                                                <option class="semi_iqf" value="hoso">HOSO</option>
                                                                <option class="semi_iqf" value="hoto">HOTO</option>
                                                                <option class="cooked_iqf_shrimp" value="hoso">HOSO</option>
                                                                <option class="cooked_iqf_shrimp" value="pud">PUD</option>
                                                                <option class="cooked_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                                <option class="cooked_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                                <option class="blanched_iqf_shrimp" value="hoso">HOSO</option>
                                                                <option class="blanched_iqf_shrimp" value="pud">PUD</option>
                                                                <option class="blanched_iqf_shrimp" value="p_n_d_tail_on">P&D Tail On</option>
                                                                <option class="blanched_iqf_shrimp" value="p_n_d_tail_off">P&D Tail Off</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 grade_list_show" >
                                                            <label class="control-label" for="product">Grade <span class="required">* </span></label>
                                                            <select class="form-control grade_list" name="grade" id="grade">
                                                                <option value="">--Select--</option>
                                                                @foreach ($grades as $grade)
                                                                    <option value="{{$grade->id}}">{{$grade->name}}</option>  
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 block_list_show">
                                                            <label class="control-label" for="product">Block List <span class="required">* </span></label>
                                                            <select class="form-control block_list" name="block_id">
                                                                <option value="">--Select--</option>
                                                                @foreach ($blocks as $block)
                                                                    <option value="{{$block->id}}">{{$block->block_size}}</option>  
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 size_list_show">
                                                            <label class="control-label" for="product">Block size<span>* </span></label>
                                                            <select class="form-control size_list" name="block_size_id">
                                                                <option value="">--Select--</option>
                                                                @foreach ($sizes as $size)
                                                                    <option value="{{$size->id}}">{{$size->size}}</option>  
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 mc_size">
                                                            <label class="control-label" for="product">MC size<span>* </span></label>
                                                            <select class="form-control mc_size" name="mc_size" id="grade">
                                                                <option value="">--Select--</option>
                                                                @foreach ($mc_sizes as $mc_size)
                                                                    <option value="{{$mc_size->id}}">{{$mc_size->name}}</option>  
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 mc_quantity">
                                                            <label class="control-label" for="product">MC quantity<span>* </span></label>
                                                            <input class="form-control mc_quantity" placeholder="mc qty" name="mc_quantity">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="control-label" for="product">Quantity<span>* </span></label>
                                                            <input class="form-control cartons_qty" name="quantity">
                                                        </div>
                                                    </div>
                                                    <div class="row" >
                                                        <div class="col-md-12">
                                                            <label class="control-label" for="product">Remark :</label>
                                                            <textarea name="remark" class="form-control" id="" cols="5" rows="2"></textarea>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Adjustment Delete</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <form action="{{route('inventory.adjustment.delete')}}" class="form-horizontal" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" class="adjustment_id">
                                                        Are You Sure You Want To Delete???
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    jQuery(document).ready(function() {
        $(".confirm").click(function () {
            var id = $(this).data("id");
            $('.adjustment_id').val(id);
        });
        $(".delete").click(function () {
            var id = $(this).data("id");
            $('.adjustment_id').val(id);
        });
        $(".varient").chained(".type");
            function nullmaking(){

                $("#item").val(null);
                $("#grade").val(null);
                $("#unit_price").val(null);
                $("#quantity").val(null);
                $("#amount").val(null);
            }
            var item_id,item_name,item_grade_id,item_grade_name,item_unit_price,discount_in_amount,discount_in_percentage,product_id,total_price,packet_quantity,product_name,product_online_rate,product_inhouse_rate,product_pack_name,product_pack_weight,product_pack_id,inhouse_rate,online_rate = null;
            var product_array = [];
            $('#item').change(function(){
                item_id = $(this).val();
                category = $(this).find(':selected').data("category");
                item_name = $(this).find(':selected').data("name");
                item_grade_id = $(this).find(':selected').data("grade_id");
                item_grade_name = $(this).find(':selected').data("grade_name");
                $("#grade").val(item_grade_name);
            })
            $("#addbtn").click(function() {
                product_array.push({"item_id":item_id,"item_name":item_name,"category":category,"item_grade_id":item_grade_id,"item_grade_name":$('#grade').val(),"quantity":$('#quantity').val(),"status":"stay"})
                $("#products").val('');
                $("#products").val(JSON.stringify(product_array));
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        if(product_array.length-1 == key){
                            $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+product.item_name+"</td><td>"+product.category+"</td><td>"+product.item_grade_name+"</td><td>"+product.quantity+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $("#intotal_amount").html("")
                $("#intotal_amount").html(total())
                $("#grand_total").val(total())
                $(".delete").click(function(){
                    product_array[$(this).data("id")].status="delete";
                    $("#products").val('');
                    $("#products").val(JSON.stringify(product_array));
                    $("#intotal_amount").html("")
                    $("#intotal_amount").html(total())
                    $("#grand_total").val(total())
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
            });
            function total() {
                var inTotal = 0;
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        inTotal+= parseInt(product.quantity);
                    }
                    
                });
                return inTotal;
            }
            $(".invoice_no").show();
            $(".production_date").hide();
            $(".mc_size").hide();
            $(".mc_quantity").hide();
            $(".receiver_name").hide();
            $('.adj_name').change(function(){
                var adj_name = $(this).find(':selected').val();
                console.log(adj_name);
                if (adj_name == 'Export Return') {
                    $(".mc_size").show();
                    $(".mc_quantity").show();
                    $(".bulk_storage").hide();
                }
                else{
                    $(".mc_size").hide();
                    $(".mc_quantity").hide();
                    $(".bulk_storage").show();
                }
                if (adj_name == 'Previously Produced') {
                    $(".invoice_no").hide();
                    $(".production_date").show();
                }
                else if (adj_name == 'Provide Sample') {
                    $(".invoice_no").hide();
                    $(".receiver_name").show();
                }
                else{
                    $(".invoice_no").show();
                    $(".production_date").hide();
                    $(".receiver_name").hide();
                }
            });
            // $('.adj_name').change(function(){
            //     var adj_name = $(this).find(':selected').val();
            //     console.log(adj_name);
            //     if (adj_name == 'Provide Sample') {
            //         $(".invoice_no").hide();
            //         $(".receiver_name").show();
            //     }
            //     else{
            //         $(".invoice_no").show();
            //         $(".receiver_name").hide();
            //     }
            // });
            // $(".mc_size").hide();
            // $(".mc_quantity").hide();
            $(".block_list_show").hide();
            $(".size_list_show").hide();
            $(".grade_list_show").show();
            $('.type').change(function(){
                var type_name = $(this).find(':selected').val();
                console.log(type_name);
                if (type_name == 'block_frozen' || type_name == 'raw_bf_shrimp' || type_name == 'semi_iqf') {
                    $(".block_list_show").show();
                    $(".size_list_show").show();
                    $(".grade_list_show").hide();
                }
                else{
                    $(".block_list_show").hide();
                    $(".size_list_show").hide();
                    $(".grade_list_show").show();
                }
            });
            $(".stock_out").hide();
            $(".stock_in").show();
            $('.adj_type').change(function(){
                var adj_type = $(this).find(':selected').val();
                console.log(adj_type);
                if (adj_type == 'Stock Out') {
                    // $(".invoice_no").hide();
                    // $(".receiver_name").show();
                    $(".stock_out").show();
                    $(".stock_in").hide();
                }
                else{
                    // $(".invoice_no").show();
                    // $(".receiver_name").hide();
                    $(".stock_out").hide();
                    $(".stock_in").show();
                }
            });
            $(".stock").hide();
            $(".target_storage").change(function () {
                $(".stock").show();
            });
    });
</script>
@endsection


