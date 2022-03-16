<div id="pdtoGradingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Grading Data  (P & D Tail On)</h2>
                </div>
                <br>
                <div class="modal-body">
                        @csrf
                    <p><b>Invoice no:</b> 1111111</p>
                    <p><b>Item Name:</b> Pangas</p>
                    <p><b>Quantity:</b> 50kg</p>
                    <p><b>Initial Weight:</b> 50kg</p>
                    <div class="row" style="margin-bottom: 2%">
                        <div class="col-md-5">
                            <label for="">Block Size</label>
                            <select name="" class="form-control" id="">
                                <option value="">A</option>
                                <option value="">B</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label for="">Size</label>
                            <select name="" class="form-control" id="">
                                <option value="">A</option>
                                <option value="">B</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for=""></label><br>
                            <button class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    <div class="row">
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
                                    </tr>
                                </tbody>
                            </table>
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