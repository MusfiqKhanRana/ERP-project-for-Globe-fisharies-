<div id="whole_n_clean_glazingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.other_processing.vegetable.glazing_to_return')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Glazing</h2>
                </div>
                <br>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="ppu_id" class="ppu_id">
                    <p><b>Invoice no:</b> <span class="invoice"></span></p>
                    <p><b>Item Name:</b> <span class="item"></span></p>
                    <p><b>Quantity(kg):</b> <span class="qty"></span></p>
                    <div class="row" style="margin-bottom:2%;text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;">
                        <div class="col-md-6">
                            <p><b>Washing & Cutting Weight:</b> <span class="washing_n_cutting_weight"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Washing & Cutting Date & Time:</b> <span class="washing_n_cutting_date_time"></span></p>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-2">
                            <b>Glazing Weight*:</b>
                        </div>
                        <div class="col-md-6">
                            <input type="number" step="0.01" class="form-control glazing_weight" name="glazing_weight" required placeholder="Type Glazing Weight">
                        </div>
                        <div class="col-md-4">
                            <p><b>Increasing Parcentage:</b> <span class="parcentage"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>