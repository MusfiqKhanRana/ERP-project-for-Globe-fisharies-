<div id="pud_pull_vein_soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.soaking_to_glazing')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking</h2>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" class="ppu_id" name="soaking_ppu_id">
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
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <b>Soaking Weight:</b>
                    </div>
                    <div class="col-md-6">
                        <input type="number" step="0.01" class="form-control soaking_weight" name="soaking_weight" required placeholder="Type Soaking Weight">
                    </div>
                    <div class="col-md-4">
                        <p><b>Increasing percentage:</b> <span class="Soaking_percentage"></span></p>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover pud_pull_vein_soaking_table">
                            <thead>
                                <tr>
                                    <th>
                                        Grade
                                    </th>
                                    <th>
                                        Quantity (Kg)
                                    </th>
                                    <th>
                                        Soaking Weight (Kg)
                                    </th>
                                    <th>
                                        Return Weight (Kg)
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
                                        <input type="text" class="form-control" placeholder="Soaking Weight">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Damage Weight">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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