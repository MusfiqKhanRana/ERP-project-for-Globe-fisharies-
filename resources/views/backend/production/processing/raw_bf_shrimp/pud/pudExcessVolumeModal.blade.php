<div id="pudExcessVolumeModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.blocking.ex_volume_to_return')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Excess Volume </h2>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="ppu_id" name="ppu_id">
                    <p><b>Invoice no:</b> <span class="invoice"></span></p>
                    <p><b>Item Name:</b> <span class="item"></span></p>
                    <p><b>Quantity:</b> <span class="qty"></span></p>
                {{-- <p><b>Initial Weight (Kg):</b> 50kg</p> --}}
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover pud_excess_volume_table">
                        <thead>
                            <tr>
                                <th>
                                    Block Size
                                </th>
                                <th>
                                    Size
                                </th>
                                <th>
                                    Block Quantity (Pc)
                                </th>
                                <th>
                                    Soaking Weight (Kg)
                                </th>
                                <th>
                                    Return Weight (Kg)
                                </th>
                                <th>
                                    Excess Volume (Kg)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    A
                                </td>
                                <td>
                                    B
                                </td>
                                <td>
                                    3
                                </td>
                                <td>
                                    10
                                </td>
                                <td>
                                    2
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Excess Volume">
                                </td>
                            </tr>
                        </tbody>
                    </table>
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