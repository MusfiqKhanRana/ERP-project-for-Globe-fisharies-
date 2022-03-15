<div id="p_n_dReturnModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Return / Wastage (P & D)</h2>
                </div>
                <br>
                <div class="modal-body">
                    @csrf
                <p><b>Invoice no:</b> 1111111</p>
                <p><b>Item Name:</b> Pangas</p>
                <p><b>Quantity:</b> 50kg</p>
                <p><b>HLSO:</b> 50kg</p>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center">
                                    Block Size				
                                </th>
                                <th style="text-align: center">
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
                                <td style="text-align: center">
                                    300-500gm
                                </td>
                                <td style="text-align: center">
                                    5
                                </td>
                                <td>
                                    24
                                </td>
                                <td>
                                    4
                                </td>
                                <td>
                                    6
                                </td>
                                <td>
                                    5
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <b>Return Weight (Kg): </b>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder=" Return weight">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-3">
                        <b>Wastage Weight(Kg): </b>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Wastage weight">
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