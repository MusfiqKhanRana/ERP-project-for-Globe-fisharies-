
@extends('backend.master')
@section('site-title')
    Add Supplier
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
            <h3 class="page-title bold">Supply Management
            </h3>
            <!-- END PAGE TITLE-->
            
            <!--category table start-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-globe"></i>Production Supply List Show</div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <label class="col-md-1 control-label"><b>Date :</b></label>

                                <div class="col-md-9"  name="expected_date">
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
                                        <th>Category</th>
                                        <th>Grade Name</th>
                                        <th>Quantity(kg)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lists->production_supply_list_items as $key2=> $item)
                                    @if($item->status == 'NotDone')

                                        <tr>
                                            <th style="text-align: center">
                                                <input type="checkbox" class="supply_item" data-item_id={{$item->item_id}} data-id={{$item->id}} data-name={{$item->production_supply_items->name}} data-category={{$item->category}} data-grade_name={{$item->grade_name}} data-qty={{$item->quantity}} name="supply_item_ids[]" multiple="multiple">
                                            </th>
                                            <th>{{$item->production_supply_items->name}}</th>
                                            <th>{{$item->category}}</th>
                                            <th>{{$item->grade_name}}</th>
                                            <th>{{$item->quantity}}</th>  
                                        </tr>
                                    @endif
                                    
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <label class="col-md-1 control-label"><b>Remark:</b></label>

                                    <div class="col-md-9" name="remark">
                                        {{$lists->remark}}
                                    </div>
                                </div>
                            <div id="addModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Supplier</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" role="form" method="post" action="{{route('supply-list-item.store')}}">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label" name="expected_date">Date  :</label>
                                                    <div class="col-md-9" >
                                                        <input type="hidden" name="expected_date" value="{{$lists->expected_date}}">{{$lists->expected_date}}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"> Supplier</label>
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
                                                                <th>Category</th>
                                                                <th>Grade Name</th>
                                                                <th>Quantity(kg)</th>
                                                                <th>Rate (Per KG)</th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label"><b>Remark :</b></label>
                                                    <div class="col-md-9" style="margin-top: 1%" name="remark" >
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
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        var supply_item_ids = [];
        var id , name, grade_name, qty = null;
        $('#sb1').hide();
        $('.supply_item').click(function()
        {
            if ($(this).is(':checked')) {
                $('#sb1').show();
                id = $(this).attr("data-id");
                name = $(this).attr("data-name");
                item_id = $(this).attr("data-item_id");
                category = $(this).attr("data-category");
                grade_name = $(this).attr("data-grade_name");
                qty = $(this).attr("data-qty");
                rate = $(this).attr("data-rate")
                supply_item_ids.push({"id":id,"item_id":item_id,"name":name,"category":category,"grade_name":grade_name,"qty":qty,"rate":rate});
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
                $("table#supplyTable td").remove();
                $.each( supply_item_ids, function( key, product ) {
                    console.log(product);
                    $("table#supplyTable tr").last().after("<tr><td> <input type='hidden' value='"+product.id+"' name='id[]'> <input type='hidden' value='"+product.item_id+"' name='item_id[]'>"+product.name+"</td><td>"+product.category+"</td><td>"+product.grade_name+"</td><td ><input name='qty[]'type='hidden' value='"+product.qty+"'> <span>"+product.qty+"</span></td><td><input name='rate[]'></td></tr>");
                });
        });
        //$('::option').css({"width": "100%"});
    });
</script>
@endsection




