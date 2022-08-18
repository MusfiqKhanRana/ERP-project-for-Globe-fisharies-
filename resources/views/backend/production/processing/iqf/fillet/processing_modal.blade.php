<div id="filletProcessingDataModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Raw Filleting Data</h2>
                </div>
                <br>
                <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.fillet_processing')}}">
                    {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" class="ppu_id" name="ppu_id">
                    <p><b>Invoice no:</b> <span class="fillet_invoice"></span></p>
                    <p><b>Item Name:</b> <span class="fillet_item"></span></p>
                    <p><b>Quantity(kg):</b> <span class="fillet_qty"></span></p>
                    <div class="row">
                        <div class="col-md-3">
                            <b>Filleting Weight*:</b>
                        </div>
                        <div class="col-md-6">
                            <input type="number" step="0.01" class="form-control initial_weight" name="initial_weight" required placeholder="Type Initial Weight">
                        </div>
                        <div class="col-md-3">
                            <p><b>percentage:</b> <span class="percentage"></span></p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>