<div id="sliced_chineseReturnModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return</h2>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 3%" >
                        @csrf
                        <p><b>Invoice no:</b> 1111111</p>
                        <p><b>Item Name:</b> Pangas</p>
                        <p><b>Quantity:</b> 50kg</p>
                        <p><b>Initial Weight:</b> 50kg</p>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Grading 
                                    </th>
                                    <th>
                                        Quantity (Kg)
                                    </th>
                                    <th>
                                        Cleaned Weight (Kg)
                                    </th>
                                    <th>
                                        Glazing Weight (Kg)
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
                                        1
                                    </td>
                                    <td>
                                        2
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Wastage (Kg)</label>
                                <input type="text" class="form-control" placeholder=" Type Wastage Volume">
                            </div>
                            <div class="col-md-6">
                                <label>Return (Kg)</label>
                                <input type="text" class="form-control" placeholder=" Type Return Volume">
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