<div id="dispatchModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Send to Production</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="post" action="{{route('production_requisition.status')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="hidden" value="{{$data->id}}" name="id">
                        <input type="hidden" value="InProduction" name="status">
                        <label for="inputEmail1" class="col-md-4 control-label">Total Selling Price</label>
                        <div class="col-md-8">
                            {{$total}} <b>TK.</b> <small>All Item</small>
                        </div><br><br>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-4 control-label">Supplier Name</label>
                        <div class="col-md-8">
                            {{$data->production_supplier->name}}
                        </div><br><br>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-4 control-label">Note</label>
                        <div class="col-md-8">
                             <b>{{"If you do this action You won't be able to do any print out and send it into the production"}}</b> <small>(Important)</small>
                        </div><br><br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>