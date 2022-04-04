<div id="excess_hoso" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Excess Volume </h2>
                </div>
                <div class="modal-body">
                    @csrf
                <p><b>Invoice no:</b> 1111111</p>
                <p><b>Item Name:</b> Pangas</p>
                <p><b>Quantity:</b> 50kg</p>
                <p><b>Whole Weight:</b> 50kg</p>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Block Size
                                </th>
                                <th>
                                    Size
                                </th>
                                <th style="text-align: center">
                                   Block Quantity(Pc)
                                </th>
                                <th style="text-align: center">
                                    Block Weight(Kg)
                                 </th>
                                 <th>
                                     Excess Volume (Kg)
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
                                    50
                                </td>
                                <td>
                                    60
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