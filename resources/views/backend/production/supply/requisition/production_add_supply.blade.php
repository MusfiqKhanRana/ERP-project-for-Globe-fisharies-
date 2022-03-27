
@extends('backend.master')
@section('site-title')
    Add Supplier
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @if(Session::has('msg'))
                    <script>
                        $(document).ready(function(){
                            swal("{{Session::get('msg')}}","", "success");
                        });
                    </script>
                @endif
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Production Management
                <small>Add Supplier</small>
            </h3>
            
            <hr>
            <br><br>
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
                        <div class="col-md-12 ">
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                        <label class="col-md-1 control-label"><b>Date :</b></label>

                                            <div class="col-md-9" style="margin-top: 1%" name="expected_date">
                                                {{$lists->expected_date}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="caption pull-right">
                                            <a class="btn green-meadow pull-right" id="sb1" data-toggle="modal" href="#addModal" style="margin-top: 8%">
                                                Add New Records
                                            <i class="fa fa-plus"></i> </a>
                                        </div><br>
                                        <label class="col-md-1 control-label"><h4><b>Items</b></h4></label>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">Check To Add Supply</th>
                                                    <th>Item Name</th>
                                                    <th>Grade Name</th>
                                                    <th>Quantity(kg)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lists->production_supply_list_items as $key2=> $item)
                                                    <tr>
                                                        <th style="text-align: center">
                                                            <input type="checkbox" class="supply_item" data-id={{$item->id}} data-name={{$item->name}} data-grade_name={{$item->grade->name}} data-qty={{$item->pivot->quantity}} name="supply_item_ids[]" multiple="multiple">
                                                        </th>
                                                        <th>{{$item->name}}</th>
                                                        <th>{{$item->grade->name}}</th>
                                                        <th>{{$item->pivot->quantity}}</th>  
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <label class="col-md-1 control-label"><b>Remark:</b></label>

                                                <div class="col-md-9" style="margin-top: 1%" name="remark">
                                                    {{$lists->remark}}
                                                </div>
                                            </div>
                                        <div id="addModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" role="form" method="post" action="{{route('supply-list-item.store')}}">
                                                            {{csrf_field()}}
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label" name="expected_date">Date  :</label>
                                                                <div class="col-md-9" style="margin-top: 1%">
                                                                    <input type="hidden" name="expected_date" value="{{$lists->expected_date}}">{{$lists->expected_date}}
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label"> Select Supplier</label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control" name="production_supplier_id">
                                                                        @foreach ($supplier as $item)
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover" id="supplyTable">
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Grade Name</th>
                                                                            <th>Quantity(kg)</th>
                                                                            <th>Rate</th>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label"><b>Remark :</b></label>
                                                                <div class="col-md-9" name="remark" style="margin: auto">
                                                                        <input type="hidden" name="remark" value="{{$lists->remark}}">{{$lists->remark}}
                                                                </div><br><br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-actions">
                                <div class="col-md-2 pull-right">
                                    <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                    <i class="fa fa-plus"></i>  Submit</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        var supply_item_ids = [];
        var id , name, grade_name, qty = 0;
        $('#sb1').hide();
        $('.supply_item').click(function()
        {
            if ($(this).is(':checked')) {
                $('#sb1').show();
                id = $(this).attr("data-id");
                name = $(this).attr("data-name");
                grade_name = $(this).attr("data-grade_name");
                qty = $(this).attr("data-qty");
                rate = $(this).attr("data-rate")
                supply_item_ids.push({"id":id,"name":name,"grade_name":grade_name,"qty":qty,"rate":rate});
                let uniqueObjArray = [
                    ...new Map(supply_item_ids.map((item) => [item["id"], item])).values(),
                ];
                supply_item_ids = uniqueObjArray;
                //console.log(supply_item_ids);
            }
            else{
                for (var i = supply_item_ids.length - 1; i >= 0; --i) {
                    if (supply_item_ids[i].id == $(this).attr("data-id")) {
                        supply_item_ids.splice(i,1);
                    }
                }
            }
        });
        $('#sb1').click(function() {
                //$("#supplyTable tr").empty();
                //$("#supplyTable").find("tr:gt(0)").remove();
                //$("#supplyTable tr"). detach();
                //$('#supplyTable tr'). remove();
                //$("#supplyTable tr"). empty();
                $("table#supplyTable td").remove();
                //$("#supplyTable tr").html("");
                //$('#supplyTable tr').empty();
                //console.log(supply_item_ids);
                //$('#supplyTable tr').empty();
                //console.log(supply_item_ids);
                $.each( supply_item_ids, function( key, product ) {
                    console.log(product);
                    $("table#supplyTable tr").last().after("<tr><td> <input type='hidden' value='"+product.id+"' name='item_id[]'>"+product.name+"</td><td>"+product.grade_name+"</td><td ><input name='qty[]'type='hidden' value='"+product.qty+"'> <span>"+product.qty+"</span></td><td><input name='rate[]'></td></tr>");
                });
                //$("#myTable tr").empty();
               // $("table#myTable tr").remove();
        });
        //$('::option').css({"width": "100%"});
    });
</script>
@endsection




