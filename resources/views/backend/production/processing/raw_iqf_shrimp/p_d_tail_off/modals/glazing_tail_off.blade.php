<div id="glazing_tail_off" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.glazing_to_randw')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing</h2>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="glazing_ppu_id" class="ppu_id">   
                    <p><b>Invoice no:</b> <span class="invoice"></span></p>
                    <p><b>Item Name:</b> <span class="item"></span></p>
                    <p><b>Quantity:</b> <span class="qty"></span></p>
                {{-- <p><b>HLSO:</b> 50kg</p> --}}
                <div class="row" style="text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;">
                    <div class="col-md-6">
                        <p><b>Initial Weight:</b> <span class="initial_weight"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><b>Initial Date & Time:</b> <span class="initial_weight_datetime"></span></p>
                    </div>
                </div>
                <div class="row" style="margin-bottom:2%;text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#05575B;color:white;margin-bottom:2%;">
                    <div class="col-md-6">
                        <p><b>Soaking Weight:</b> <span class="soaking_weight"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><b>Soaking Date & Time:</b> <span class="soaking_date_time"></span></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-2">
                        <b>Glazing Weight*:</b>
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control glazing_weight" step="0.01" name="glazing_weight" required placeholder="Type Glazing Weight">
                    </div>
                    <div class="col-md-4">
                        <p><b>Increasing percentage:</b> <span class="glazing_percentage"></span></p>
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover pd_tail_off_glazing_table">
                        <thead>
                            <tr>
                                <th>
                                    Grade
                                </th>
                                <th>
                                    Weight (Kg)
                                </th>
                                <th>
                                   Soaking Weight (Kg)
                                </th>
                                <th>
                                    Return Weight (Kg)
                                </th>
                                <th>
                                    Glazing Weight (Kg)
                                </th>
                                <th>
                                    Increasing/Decreasing(%)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    300-500gm
                                </td>
                                <td>
                                    5
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Type  Glazing Volume">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
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