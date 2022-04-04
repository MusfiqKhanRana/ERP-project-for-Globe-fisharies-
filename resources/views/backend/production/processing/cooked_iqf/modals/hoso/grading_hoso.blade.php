<div id="grading_hoso" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (HOSO)</h2>
                </div>
                <div class="modal-body">
                        @csrf
                    <p><b>Invoice no:</b> 1111111</p>
                    <p><b>Item Name:</b> Pangas</p>
                    <p><b>Quantity:</b> 50kg</p>
                    <p><b>Whole Weight:</b> 50kg</p>
                    <div class="row">
                        <div class="col-md-5">
                            <label>Select Grade</label>
                            <select type="text" class="form-control" >
                                <option>10-20</option>
                                <option>12-23</option>
                                <option>15-32</option>
                                <option>20-23</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label>Weight (Kg)</label>
                            <input type="text" class="form-control" placeholder="Type Weight">
                        </div>
                        <div class="col-md-1" style="margin-top: 4%">
                            <button class="btn btn-success">+ Add</button>
                        </div>
                    </div><br>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center">
                                        Grade
                                    </th>
                                    <th style="text-align: center">
                                        Weight (Kg)
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