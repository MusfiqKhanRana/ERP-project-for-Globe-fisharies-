<div id="whole_guttedProcessingDataModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.processing_to_clean')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Initial Data</h2>
                </div>
                <br>
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="ppu_id" class="whole_gutted_ppu_id">
                        <p><b>Invoice no:</b> <span class="whole_gutted_invoice"></span></p>
                        <p><b>Item Name:</b> <span class="whole_gutted_item"></span></p>
                        <p><b>Quantity:</b> <span class="whole_gutted_qty"></span></p>
                    <div class="row">
                        <div class="col-md-3">
                            <b>Initial Weight:</b></div>
                            <div class="col-md-6">
                                <input type="number" step='0.01' class="form-control initial_weight" name="initial_weight" placeholder="Type Initial Weight">
                            </div>
                            <div class="col-md-3">
                                <b>Parcentage:</b> <span class="parcentage"></span>
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