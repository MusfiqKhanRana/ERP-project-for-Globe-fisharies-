<div id="wholeGlazingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.glazing_to_randw')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Glazing</h2>
                </div>
                <br>
                <div class="modal-body">
                        <input type="hidden" name="ppu_id" class="glazing_ppu_id">
                        <p><b>Invoice no:</b> <span class="whole_invoice"></span></p>
                        <p><b>Item Name:</b> <span class="whole_item"></span></p>
                        <p><b>Quantity(kg):</b> <span class="whole_qty"></span></p>
                    {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>percentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
                    <div class="row" style="text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;">
                        <div class="col-md-6">
                            <p><b>Initial Weight:</b> <span class="initial_weight"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>Filleting Date & Time:</b> <span class="initial_weight_datetime"></span></p>
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
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover whole_glazing_table">
                                <thead>
                                    <tr>
                                        <th>
                                            Grade
                                        </th>
                                        <th>
                                            Quantity (Kg)
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
                                            <input type="number" step="0.01" class="form-control" required placeholder="Type Glazing Weight ">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>