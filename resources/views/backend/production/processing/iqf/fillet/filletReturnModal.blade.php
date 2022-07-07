<div id="filletReturnModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.randw')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return</h2>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 3%" >
                        @csrf
                        <input type="hidden" class="randw_ppu_id" name="randw_ppu_id">
                        <p><b>Invoice no:</b> <span class="fillet_invoice"></span></p>
                        <p><b>Item Name:</b> <span class="fillet_item"></span></p>
                        <p><b>Quantity(kg):</b> <span class="fillet_qty"></span></p>
                    </div>
                    <div class="row" style="margin-bottom:2%;text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;">
                        <div class="col-md-6">
                            <p><b>Filleting Weight:</b> <span class="filleting_weight"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Filleting Date & Time:</b> <span class="filleting_date_time"></span></p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:2%;text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#05575B;color:white;">
                        <div class="col-md-6">
                            <p><b>Fillet Soaking Weight:</b> <span class="fillet_soaking_weight"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Fillet Soaking Date & Time:</b> <span class="fillet_soaking_date_time"></span></p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:2%;text-shadow: -1px 0 #66A5AD, 0 1px #66A5AD, 1px 0 #66A5AD, 0 -1px #66A5AD;background-color:#66A5AD;color:white;">
                        <div class="col-md-6">
                            <p><b>Fillet Glazing Weight:</b> <span class="fillet_glazing_weight"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Fillet Glazing Date & Time:</b> <span class="fillet_glazing_weight_datetime"></span></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Wastage (Kg)</label>
                                <input type="number" step="0.01" class="form-control" name="wastage_quantity" required placeholder=" Type Wastage Volume">
                            </div>
                            <div class="col-md-6">
                                <label>Return (Kg)</label>
                                <input type="number" step="0.01" class="form-control" name="return_quantity" required placeholder=" Type Return Volume">
                            </div>
                        </div><br>
                    </div>
                </div><br><br>
                <div class="modal-footer">
                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>