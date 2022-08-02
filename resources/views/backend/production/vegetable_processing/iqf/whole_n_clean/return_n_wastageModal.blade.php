<div id="whole_n_clean_return_n_wastageModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.other_processing.vegetable.return_to_store')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return</h2>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 3%" >
                        @csrf
                        <input type="hidden" class="ppu_id" name="ppu_id">
                        <p><b>Invoice no:</b> <span class="invoice"></span></p>
                        <p><b>Item Name:</b> <span class="item"></span></p>
                        <p><b>Quantity(kg):</b> <span class="qty"></span></p>
                    </div>
                    <div class="row" style="margin-bottom:2%;text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;">
                        <div class="col-md-6">
                            <p><b>Washing & Cutting Weight:</b> <span class="washing_n_cutting_weight"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Washing & Cutting Date & Time:</b> <span class="washing_n_cutting_date_time"></span></p>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:2%;text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#05575B;color:white;">
                        <div class="col-md-6">
                            <p><b>Glazing Weight:</b> <span class="glazing_weight"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Glazing Date & Time:</b> <span class="glazing_date_time"></span></p>
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