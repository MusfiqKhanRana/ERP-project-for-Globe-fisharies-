
@extends('backend.master')
@section('site-title')
Raw Product & Wastage Records
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Raw Product & Wastage Records
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
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-briefcase"></i>Raw Product & Wastage List
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <label for="inputEmail1" class="col-md-1 control-label"><b>Form Date</b></label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <label for="inputEmail1" class="col-md-1 control-label" ><b>To Date</b></label>
                        <div class="col-md-4">
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-info"  data-toggle="modal" href="#"><i class="fa fa-search"></i> Search</a>
                        </div>
                    </div>
                    <br><br>
                    <div class="container table-scrollable">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Date</th>
                                    <th>Quantity (Kg)</th>
                                    <th>Transferred Quantity (Kg)</th>
                                    <th>Remaining Quantity (Kg)</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wastages as $key=>$wastage)
                                    <tr id="row1">
                                        <td>{{$loop->iteration}} </td>
                                        <td class="text-align: center;">{{$key}}</td>
                                        <td class="text-align: center;">
                                            @php
                                                $total_quantity = 0;
                                            @endphp
                                            
                                            @foreach ($wastage as $item)
                                                @php
                                                $total_quantity+=$item->wastage_quantity;
                                                    //dd($item->wastage_quantity);
                                                @endphp
                                            @endforeach
                                            {{$total_quantity}}
                                        </td>
                                        <td class="text-align: center;">100</td>
                                        <td class="text-align: center;">50</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-info sale"  data-toggle="modal"  data-RandW_datetime="{{$key}}" href="#sale"><i class="fa fa-shopping-cart"></i> Sale</a>
                                            <a class="btn btn-success" data-toggle="modal" href="#transfer"><i class="fa fa-exchange"></i> Transfer to fish feed</a>
                                        </td>
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        <div id="transfer" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title"> Transfer to Fish Feed</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" method="post" action="{{--route('')--}}">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Quantity (Kg)</label>
                                                    <input type="number" class="form-control" required name="quantity">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                    <input type="text" class="form-control"  required name="remark" >
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="sale" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Sale Wastage</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" method="post" action="{{--route('bonus.update', $data->id)--}}">
                                            {{csrf_field()}}
                                            <input type="hidden" id="RandW_datetime" value="">
                                            <input type="hidden" value="" id="provided_item" name="provided_item">
                                            <div class="form-group" style="padding:2%">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Bayer Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" required name="bayer_name" id="bayer_name">
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Contact Number</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control"  required name="contact_number" id="contact_number" >
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Quantity (Kg)</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control" required name="quantity" id="quantity" >
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Unit Amount</label>
                                                        <div class="col-md-9">
                                                            <input type="number" class="form-control"  required name="unit_amount" id="unit_amount" >
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="inputEmail1" class="col-md-3 control-label">Sale Detail</label>
                                                        <div class="col-md-9">
                                                            <textarea type="text" class="form-control"  name="sale_detail" id="sale_detail"></textarea>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-md-12" style="text-align: right">
                                                        <button type="button" class="btn btn-success" id="add_items">+  Add</button>
                                                    </div> 
                                                </div>
                                            </div><hr>
                                            <div class="form-group">
                                                {{-- <label for="inputEmail1" class="col-md-2 control-label">Item</label> --}}
                                                <div class="col-md-12">
                                                    <table  class="table table-striped table-bordered table-hover" id="mytable">
                                                        <tr>
                                                            <th>Bayer Name</th>
                                                            <th>Contact Number</th>
                                                            <th>Quantity (Kg)</th>
                                                            <th>Unit Amount</th>
                                                            <th>Sale Detail</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function () {
        
        $(".sale").click(function(){
            $("#RandW_datetime").val($(this).data('randw_datetime'));
           // console.log($(this).data('randw_datetime'));
        });
    var items_array = [];
    function nullmaking(){
            $("#bayer_name").val(null);
            $("#contact_number").val(null);
            $("#quantity").val(null);
            $("#sale_detail").val(null);
            $("#unit_amount").val(null);
        }
    $("#add_items").click(function(){
        console.log($("#time").val());
            items_array.push({"bayer_name":$("#bayer_name").val(),"contact_number":$("#contact_number").val(),"quantity":$("#quantity").val(),"unit_amount":$("#unit_amount").val(),"sale_detail":$("#sale_detail").val(),"status":"stay"});
            $("#provided_item").val('');
            $("#provided_item").val(JSON.stringify(items_array));
            $.each( items_array, function( key, item ) {
                console.log(item);
                if (item.status == "stay") {
                    if(items_array.length-1 == key){
                        $("table#mytable tr").last().before("<tr id='"+key+"'><td>"+item.bayer_name+"</td><td>"+item.contact_number+"</td><td>"+item.quantity+"</td><td>"+item.unit_amount+"</td><td>"+item.sale_detail+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                    }
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
<script>
    $(document).ready(function() {
        $('#datepicker1').val(moment(moment().toDate()).format('MM/DD/YYYY'));
        });
</script>
@endsection
