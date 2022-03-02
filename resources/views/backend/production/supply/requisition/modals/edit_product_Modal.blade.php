<div id="edit_product_Modal{{$item->pivot->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Update Requisition Item </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" action="{{route('production-requisition.update', $item->pivot->id)}}">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="form-body">
                        <div class="form-section">
                            
                            <label class="col-md-2 control-label pull-left bold">Supplier Name: </label>
                            <div class="col-md-9">
                                <span class="form-control" selected><b>{{$data->production_supplier->name}}</b></span>
                            </div>
                        </div><br><br>
                    </div>
                    <div class="row" style="margin-top:2%">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4><b>Product Info</b></h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="">Item</label>
                                            <select class="form-control" >
                                                <option value=" ">{{$item->name}}</option>
                                                @foreach ($data->production_supplier->supplier_items as $item)
                                                    <option value="{{$item->id}}" data-grade_name="{{$item->grade->name}}" data-grade_id="{{$item->grade->id}}" data-item_name="{{$item->name}}" selected>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="product">Grade</label>
                                            <input type="text" class="form-control grade" value="{{$item->grade->name}}"  name="grade" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="product">Unit Price</label>
                                            <input type="text" class="form-control rate" value="{{$item->pivot->rate}}"  name="rate" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" class="form-control quantity" value="{{$item->pivot->quantity}}"  name="quantity">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="product">Amount</label>
                                            <input type="text" class="form-control amount"  name="amount" value="{{$item->pivot->rate*$item->pivot->quantity}}" readonly>     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>