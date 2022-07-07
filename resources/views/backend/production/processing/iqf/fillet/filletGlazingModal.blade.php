<div id="filletGlazingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.fillet_glazing')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Glazing</h2>
                </div>
                <br>
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="glazing_ppu_id" class="glazing_ppu_id">
                        <p><b>Invoice no:</b> <span class="fillet_invoice"></span></p>
                        <p><b>Item Name:</b> <span class="fillet_item"></span></p>
                        <p><b>Quantity(kg):</b> <span class="fillet_qty"></span></p>
                    {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>Parcentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
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
                {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>Parcentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
                <div class="row">
                    <div class="col-md-2">
                        <b>Glazing Weight*:</b>
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control fillet_glazing_weight" step="0.01" name="fillet_glazing_weight" required placeholder="Type Glazing Weight">
                    </div>
                    <div class="col-md-4">
                        <p><b>Increasing Parcentage:</b> <span class="glazing_parcentage"></span></p>
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