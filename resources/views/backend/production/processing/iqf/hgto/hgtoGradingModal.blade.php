<div id="hgtoGradingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading</h2>
                </div>
                <br>
                <div class="modal-body">
                    @csrf
                    <p><b>Invoice no:</b> 1111111</p>
                    <p><b>Item Name:</b> Pangas</p>
                    <p><b>Quantity:</b> 50kg</p>
                    <p><b>Initial Weight:</b> 50kg</p>
                    <p><b>Cleaned Weight:</b> 5 kg</p>
                    <div class="row">
                        <div class="col-md-5">
                            <label>Select Grade</label>
                            <select class="form-control">
                                <option>100-200</option>
                                <option>100-200</option>
                                <option>100-200</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label>Quantity (Kg)</label>
                            <input type="text" class="form-control" placeholder="Type weight">
                        </div>
                        <div class="col-md-1" style="margin-top: 4%">
                            <button type="button" class="btn btn-success">add</button>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Grade
                                        </th>
                                        <th>
                                            Quantity (Kg)
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
                                    </tr>
                                </tbody>
                            </table>
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