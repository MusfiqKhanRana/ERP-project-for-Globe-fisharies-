@extends('backend.master')
@section('site-title')
   CS List
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
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
            <h3 class="page-title bold">Purchase Management
            </h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-briefcase"></i>CS List
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <form class="form-horizontal" role="form" method="post" action="{{route('production.purchase.quotation.cs.data_pass')}}">
                            {{csrf_field()}}
                            <div class="row" style="margin: 3%" >
                                <p ><b>Item name:</b> {{$cs_item->item_name}}</p>
                                <p ><b>Department:</b> {{$cs_item->production_purchase_requisition->departments->name}}</p>
                                <p ><b>Request By:</b> {{$cs_item->production_purchase_requisition->users->name}}</p>
                                <p ><b>Demand Date:</b> {{$cs_item->demand_date}}</p>
                            </div>
                            <hr>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            S.l
                                        </th>
                                        <th>Supplier Name</th>
                                        <th>Price</th>
                                        <th>Speciality</th>
                                        <th>Negotiable Price</th>
                                        <th>add new Negotiable Price</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="item_id" value="{{$cs_item->id}}">
                                    <input type="hidden" name="requisition_id" value="{{$cs_item->production_purchase_requisition_id}}">
                                    @php
                                        $ifBtn=false;
                                    @endphp
                                    @foreach($cs_item->production_general_purchase_quotation as $key=> $data)
                                        <tr>
                                            <td>
                                                {{++ $key}}
                                            </td>
                                            <td>{{$data->supplier->name}}</td>
                                            <td>{{$data->price}}</td>
                                            <td>{{$data->speciality}}</td>
                                            <td>
                                                @if ($data->negotiable_price)
                                                    @php
                                                        $ifBtn=true;
                                                    @endphp
                                                    @foreach ($data->negotiable_price as $key2=> $nego_price)
                                                        <label class="btn btn-default"><input type="checkbox" data-id="{{$key2}}" data-key="{{$key}}" class="nego_click{{$key}}{{$key2}} nego_price" name="final_rate{{$key}}" value="{{$nego_price}}"/> No - {{++ $key2}} : {{$nego_price}}</label> 
                                                    @endforeach
                                                @else
                                                <p>N/A</p>
                                                @endif                                             
                                            </td>
                                            <td>
                                                <input type="hidden" name="quotation_id[]" value="{{$data->id}}">
                                                <input type="number" class="price" placeholder="Price" name="negotiable_price[]" id="negotiable_price">
                                            </td>
                                            <td>
                                                <textarea type="text" class="remark" placeholder="Remark" name="cs_remark[]" id="cd_remark"></textarea>
                                            </td>
                                            
                                            <td>
                                                <a class="btn btn-danger" data-toggle="modal" href="#rejectModal" >Reject</a>
                                                {{-- @if($ifBtn == false) --}}
                                                    <a class="btn btn-info nego_confirm" data-quotation_id="{{$data->id}}" data-supplier_info="{{$data->supplier->id}}" data-item_id="{{$cs_item->id}}" id="nego_confirm{{$key}}" data-toggle="modal" href="#ConfirmModal" {!!$data->negotiable_price != null ? "style='display:none'" : "style='display:block'" !!} >Confirm</a>
                                                {{-- @endif --}}
                                            </td>
                                        </tr>
                                        <div id="rejectModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Reject Note</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" role="form" method="post" action="{{route('production.quotation.reject',$data->id)}}">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                <p>Are You Sure You Want to Remove?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                <a href="{{route('production.quotation.reject',$data->id)}}" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</a>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <button type="submit" class="col-md-12 btn btn-info submitButton" ><i class="fa fa-floppy-o"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="ConfirmModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.quotation.confirm')}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Want to Confirm it?</h4>
                    </div>
                    <div class="modal-body">
                            {{csrf_field()}}
                            <input type="hidden" class="item_id" name="item_id" value="">
                            <input type="hidden" class="quotation_id" name="quotation_id" value="">
                            <input type="hidden" class="nego_input" name="nego_price" value="">
                            <input type="hidden" class="supplier_info" name="supplier_info" value="">
                            <p>The Price you are confirming is : <b><span class="nego_span"></span></b></p>
                    </div>
                    <div class="modal-footer"><br>
                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                        <button type="submit"  class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Confirm</button>
                    </div>
            </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var nego_price =0;
            $('input[type="checkbox"]').on('change click',function() {
                var key = 0;
                // console.log($(this).attr("data-prices"));
                key = $(this).attr("data-key");
                if($(this).is(":checked")){
                    nego_price = $(this).val();
                    console.log(nego_price);
                    $('#nego_confirm'+key).attr('style', 'display : block !important');
                    $('.nego_price').attr("disabled", true);
                    $('.nego_click'+$(this).attr("data-key")+$(this).attr("data-id")).attr("disabled", false);
                }
                if(!$(this).is(":checked")){
                    $('#nego_confirm'+key).attr('style', 'display : none !important');
                    $('.nego_price').attr("disabled", false);
                }     
            });
            $('.nego_confirm').on('change click',function() { 
                console.log(nego_price);
               var item_id = $(this).attr("data-item_id");
               var quotation_id = $(this).attr("data-quotation_id");
               var supplier_info = $(this).attr("data-supplier_info");
                $(".nego_input").val(nego_price);
                $(".quotation_id").val(quotation_id);
                $(".item_id").val(item_id);
                $(".supplier_info").val(supplier_info);
                $(".nego_span").html(nego_price);
            });
            $('.submitButton').hide();
                $('.price').keyup(function()
                {
                    ($(this).is(':input')) 
                        $('.submitButton').show();

            });
            var pivot_item = null;
            var all_item = null;
            var supplier_id,name,requisition_id,requisition_item_id,price,speciality = null;
            $('.addquation').click(function(){
                 console.log($(this).data('all')); 
                // console.log($(this).data('pivot')); 
                //console.log($(this).data('pivot').users.name);
                pivot_item = $(this).data('pivot');
                all_item = $(this).data('all');
                $('#item_name').html(pivot_item.item_name);
                $('#department').html(all_item.departments.name);
                $('#request_by').html(all_item.users.name);
                $('#demand_date').html(pivot_item.demand_date);
                $('#requisition_id').val(all_item.id)
                $('#requisition_item_id').val(pivot_item.id)
            })
          
        var items_array = [];
        function nullmaking(){
                $("#supplier_id").val(null);
                $("#price").val(null);
                $("#speciality").val(null);
            }
        $(".add_quotation").click(function() {
            // console.log($(this).attr("data-requisition_id"));
            var id = $(this).attr("data-requisition_id");
            $.ajax({
                    type:"POST",
                    url:"{{route('production.purchase.quotation.data_pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                    }
                });

        });
        // $(".supplier_name").change(function(){
        //    //console.log($(this).attr("name"));
        //    name = $(this).attr("name");
        
        // });
        $('.supplier_name').change(function(){
            supplier_id = $(this).val();
            // console.log($(this).find(':selected').data("name"));
            name = $(this).find(':selected').data("supplier_name");
            //console.log(name);
                
            });
        $(".ItemAdd").click(function(){
            console.log($(".supplier_name").val());
                items_array.push({"supplier_id":supplier_id,"name":name,"price":$("#price").val(),"speciality":$("#speciality").val(),"status":"stay"});
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $.each( items_array, function( key, item ) {
                    // console.log(item);
                    
                        if(items_array.length-1 == key){
                            $("table.itemsTable tr").last().before("<tr id='"+key+"'><td ><input name='supplier_id' type='hidden' value='"+item.supplier_id+"'> <span>"+item.name+"</span></td><td ><input name='price' type='hidden' value='"+item.price+"'> <span>"+item.price+"</span></td><td ><input name='speciality'type='hidden' value='"+item.speciality+"'> <span>"+item.speciality+"</span></td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    
                });
                $(".delete_item").click(function(){
                    items_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#provided_item").val('');
                    $("#provided_item").val(JSON.stringify(items_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
        });
            
        });
    </script>
@endsection
