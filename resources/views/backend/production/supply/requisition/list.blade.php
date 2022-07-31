@extends('backend.master')
@section('site-title')
   Requisition
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
            <!-- BEGIN PAGE HEADER-->
            <span class="page-title" class="portlet box dark"><b>Production Requisition: </b><span>{{ request()->status}} list</span>
            </span>
            <a class="btn btn-danger" href="{{route('production-requisition.index',['status'=>'Pending','page'=>1])}}"><i class="fa fa-spinner"></i> Pending List ({{$production_requisition_pending_count}})</a>
            {{-- <a class="btn btn-primary"  href="{{route('order-history.index',"status=Confirm")}}"><i class="fa fa-check-circle"></i> Confirm Order List ({{$confirmcount}})</a> --}}
            <a class="btn btn-success" href="{{route('production-requisition.index',['status'=>'Confirm','page'=>1])}}"><i class="fa fa-cart-plus"></i> Request  List ({{$production_requisition_Confirm_count}})</a>
            <a class="btn purple" href="{{route('production-requisition.index',['status'=>'Approved','page'=>1])}}"><i class="fa fa-check"></i> Approved List ({{$production_requisition_Approved_count}})</a>
                <br><br>
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
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        
                                        <th style="text-align: center;">Serial</th>
                                        <th style="text-align: center"> Supplier Name</th>
                                        <th style="text-align: center"> Status</th>
                                        <th style="text-align: center"> Details</th>
                                        <th style="text-align: center"> Enlisted Item</th>
                                        <th style="text-align: center"> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($production_requisition as $key=> $data)
                                            <tr id="row1">
                                                <td>{{++$key}}</td>
                                                <td class="text-align: center;"> {{$data->production_supplier->name}}</td>
                                                <td class="text-align: center;"> {{$data->status}}</td>
                                                <td class="text-align: center;"> {{$data->details}}</td>
                                                <td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl.</th>
                                                                <th>Name</th>
                                                                <th>Category</th>
                                                                <th>Grade Name</th>
                                                                <th>Quantity(kg)</th>
                                                                <th>Rate</th>
                                                                <th>Amount(total)</th>
                                                                @if (request()->status=="Pending")
                                                                    <th>Action</th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $total = 0;
                                                            @endphp
                                                            @foreach($data->production_requisition_items as $key2=> $item)
                                                                <tr>
                                                                    <th>{{++$key2}}</th>
                                                                    <th>{{$item->name}}</th>
                                                                    <th>{{$item->category}}</th>
                                                                    <th>{{$item->grade->name}}</th>
                                                                    <th>{{$item->pivot->quantity}}</th>  
                                                                    <th>{{$item->pivot->rate}}</th>  
                                                                    <th>
                                                                        @php
                                                                            $total+=$item->pivot->quantity*$item->pivot->rate;
                                                                        @endphp
                                                                        {{$item->pivot->quantity*$item->pivot->rate}}
                                                                    </th> 
                                                                    @if (request()->status=="Pending")
                                                                        <th>
                                                                            <a class="btn red" data-toggle="modal" href="#deletproductModal{{$item->pivot->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                                            
                                                                            <a class="btn blue"  data-toggle="modal" href="#edit_product_Modal{{$item->pivot->id}}"><i class="fa fa-edit"></i> Edit</a>
                                                                        </th>
                                                                    @endif 
                                                                </tr>
                                                                @include('backend.production.supply.requisition.modals.edit_product_Modal')
                                                                @include('backend.production.supply.requisition.modals.deletproductModal')
                                                                
                                                            @endforeach
                                                            <tr>
                                                                <th colspan="5" class="text-center">Total</th>
                                                                <th>{{$total}}</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="text-align: center">
                                                    @if (request()->status=="Pending")
                                                        {{-- <a class="btn blue"  data-toggle="modal" href="#edit_partyModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a> --}}
                                                        <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                        <a class="btn green" data-toggle="modal" href="#confirmModal{{$data->id}}"><i class="fa fa-check"></i>Confirm</a>
                                                    @elseif(request()->status=="Confirm")
                                                        <a class="btn green" data-toggle="modal" href="#approveModal{{$data->id}}"><i class="fa fa-check"></i>Approve</a>
                                                        <a class="btn btn-danger" data-toggle="modal" href="#rejectModal{{$data->id}}"><i class="fa fa-times-circle-o fa-2"></i> Reject</a>
                                                        <a class="btn purple" data-toggle="modal" href="#returnModal{{$data->id}}"><i class="fa fa-undo"></i> Return</a>
                                                    @elseif(request()->status=="Approved")
                                                        <a class="btn green" data-toggle="modal" href="#dispatchModal{{$data->id}}"><i class="fa fa-arrow-circle-right"></i>Send to Production</a>
                                                        <a class="btn purple" data-toggle="modal" href="{{route('requisition.print',$data->id)}}"><i class="fa fa-print"></i> Show & Print</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @include('backend.production.supply.requisition.modals.deleteModal')
                                            
                                            {{-- <div id="edit_partyModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Update Party</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('party.update', $data->id)}}">
                                                                {{csrf_field()}}
                                                                {{method_field('put')}}

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Code</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_code}}" required name="party_code">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Name</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_name}}" required name="party_name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Phone</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->phone}}" required name="phone">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Type</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_type}}" required name="party_type">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Short Name</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_short_name}}" required name="party_short_name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label"> Address</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->address}}" required name="address">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            @include('backend.production.supply.requisition.modals.confirmModal')
                                            

                                            {{-- request list modal start --}}
                                            @include('backend.production.supply.requisition.modals.approveModal')
                                            @include('backend.production.supply.requisition.modals.rejectModal')

                                            @include('backend.production.supply.requisition.modals.returnModal')

                                            

                                            {{-- Send to production Modal --}}
                                            @include('backend.production.supply.requisition.modals.dispatchModal')
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                                {{ $production_requisition->withQueryString()->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function() {
           
            var item_id,item_name,item_grade_id,item_grade_name,item_unit_price,total_price = null;
            // var product_array = [];
            // $('#product').change(function(){
            //     product_id = $(this).val();
            //     product_name = $(this).find(':selected').data("name");
            //     product_pack_id = $(this).find(':selected').data("pack_id");
            //     product_pack_name = $(this).find(':selected').data("pack_name");
            //     product_pack_weight = $(this).find(':selected').data("pack_weight");
            //     product_online_rate = $(this).find(':selected').data("online_selling_price");
            //     product_inhouse_rate = $(this).find(':selected').data("inhouse_selling_price");
            //     $('#pack_size').val(product_pack_name);
            //     $("#rate").empty();
            //     var customer_type = $('#customer_type').html();
            //     var selling_price = null;
            //     if(customer_type=="inhouse"){
            //         selling_price = product_inhouse_rate;
            //     }
            //     else if(customer_type == "online"){
            //         selling_price = product_online_rate;
            //     }
            //     $("#rate").val(selling_price);
            //     // console.log(product_online_rate,product_inhouse_rate,product_id,product_name,product_pack_id,product_pack_name,product_pack_weight);
            // })
            // $('#quantity').keyup(function(){
            //     packet_quantity = $(this).val();
            //     $("#amount").val(packet_quantity * item_unit_price);
            //     total_price = packet_quantity * item_unit_price;
            // })
            $('.item').change(function(){
                item_id = $(this).val();
                console.log($(this).val());
                // item_name = $(this).find(':selected').data("name");
                // item_grade_id = $(this).find(':selected').data("grade_id");
                // item_unit_price = $(this).find(':selected').data("unit_price");
                $.ajax({
                    type:"get",
                    url:"/admin/production-requisition-item/"+item_id,
                    success:function(data){
                        console.log(data);
                        $("#grade").val(data.name);
                    }
                });
                $("#unit_price").val(item_unit_price);
            })
            });
            // $("#addbtn").click(function() {
            //     product_array.push({"item_id":item_id,"item_name":item_name,"item_grade_id":item_grade_id,"item_grade_name":$('#grade').val(),"quantity":$('#quantity').val(),"rate":item_unit_price,'total_price':$('#amount').val(),"status":"stay"})
            //     $("#products").val('');
            //     $("#products").val(JSON.stringify(product_array));
            //     $.each( product_array, function( key, product ) {
            //         if (product.status == "stay") {
            //             if(product_array.length-1 == key){
            //                 $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+product.item_name+"</td><td>"+product.item_grade_name+"</td><td>"+product.quantity+"</td><td>"+product.rate+"</td><td>"+product.total_price+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
            //             }
            //         }
            //     });
            //     $("#intotal_amount").html("")
            //     $("#intotal_amount").html(total())
            //     $("#grand_total").val(total())
            //     $(".delete").click(function(){
            //         product_array[$(this).data("id")].status="delete";
            //         // console.log(product_array,$(this).data("id"));
            //         $("#products").val('');
            //         $("#products").val(JSON.stringify(product_array));
            //         $("#intotal_amount").html("")
            //         $("#intotal_amount").html(total())
            //         $("#grand_total").val(total())
            //         $("#"+$(this).data("id")).remove();
            //     });
            //     nullmaking();
            // });
            function total() {
                var inTotal = 0;
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        inTotal+= parseInt(product.total_price);
                    }
                    
                });
                return inTotal;
            }
            $("#supplier_id").change(function() {
                // console.log($(this).val());
                $.ajax({
                    type:"get",
                    url:"/admin/get-supplier/"+$(this).val(),
                    success:function(data){
                        $("#supplier_info").empty();
                        var $results = $('#supplier_info');
                        var $userDiv = $results.append('<div class="user-div"></div>')
                        $( '<div class="row">'+
                            '<div class="col-md-3 text-center"><span> <b>Supplier Name: </b>'+data.name+'</span></div>'
                            +'<div class="col-md-3 text-center"><span> <b>Supplier Address: </b>'+data.address+'</span></div>'
                            +'<div class="col-md-3 text-center"><span> <b>Supplier Phone: </b>'+data.phone+'</span></div>'
                            +'<div class="col-md-3 text-center"><span> <b>Supplier Email: </b><span id="customer_type">'+data.email+'</span></span></div>'
                        +'</div>').appendTo( ".user-div" );
                    }
                });
                $.ajax({
                    type:"get",
                    url:"/admin/get-supplier-items/"+$(this).val(),
                    success:function(data){
                        console.log(data);
                        $("#item").html("");
                        let option="<option value=''>Select</option>";
                        $.each( data, function( key, data ) {
                            option+='<option data-name="'+data.name+'" data-unit_price="'+data.pivot.rate+'" data-grade_id="'+data.grade_id+'" value="'+data.id+'">'+data.name+'</option>';
                        });
                        $('#item').append(option);
                    }
                });
            });
        });

        $('.select2Ajax').select2({
            placeholder: 'Select an item',
            ajax: {
                url: "{{route('production-supplier.all')}}",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name + " | "+item.email+" | "+item.phone,
                                title:item.phone,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endsection


