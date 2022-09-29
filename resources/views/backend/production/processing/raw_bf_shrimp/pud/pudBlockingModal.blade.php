<div id="pudBlockingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.raw_bf_blocking_to_blockcounter')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Blocking(PUD)</h2>
                </div>
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="inputs" class="inputs">
                        <input type="hidden" class="ppu_id" name="ppu_id">
                        <p><b>Invoice no:</b> <span class="invoice"></span></p>
                        <p><b>Item Name:</b> <span class="item"></span></p>
                        <p><b>Quantity:</b> <span class="qty"></span></p>
                    {{-- <p><b>Initial Weight (Kg):</b> 50kg</p> --}}
                    <div class="row" style="text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;">
                        <div class="col-md-6">
                            <p><b>PUD Weight:</b> <span class="initial_weight"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>PUD Date & Time:</b> <span class="initial_weight_datetime"></span></p>
                        </div>
                    </div>
                    <br><hr>
                    <div class="row grade_to_block">

                    </div>
                </div>
                <br><br><br><br><br>
                <div class="modal-footer">
                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>