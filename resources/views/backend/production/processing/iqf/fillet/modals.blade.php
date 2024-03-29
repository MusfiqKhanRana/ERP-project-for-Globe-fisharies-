<div id="filletProcessingDataModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Processing Data</h2>
                </div>
                <br>
                <div class="modal-body">
                        @csrf
                    <p><b>Invoice no:</b> 1111111</p>
                    <p><b>Item Name:</b> Pangas</p>
                    <p><b>Quantity:</b> 50kg</p>
                    <div class="row"><div class="col-md-3"><b>Raw Filleting:</b></div><div class="col-md-3"><input type="text" class="form-control"></div><div class="col-md-3"><b>percentage:</b> 12%</div></div>
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
<div id="filletGradingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                    <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>percentage:</b> 12%</div><div class="col-md-1"><button type="button" class="btn btn-success">add</button></div>
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Grade
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            300-500gm
                                        </td>
                                        <td>
                                            5kg
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
<div id="filletSoakingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Soaking</h2>
                </div>
                <br>
                <div class="modal-body">
                        @csrf
                    <p><b>Invoice no:</b> 1111111</p>
                    <p><b>Item Name:</b> Pangas</p>
                    <p><b>Quantity:</b> 50kg</p>
                    {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>percentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Grade
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Soaking
                                        </th>
                                        <th>
                                            Damage Weight
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            300-500gm
                                        </td>
                                        <td>
                                            5kg
                                        </td>
                                        <td>
                                            <input type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control">
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
<div id="filletGlazingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Glazing</h2>
                </div>
                <br>
                <div class="modal-body">
                        @csrf
                    <p><b>Invoice no:</b> 1111111</p>
                    <p><b>Item Name:</b> Pangas</p>
                    <p><b>Quantity:</b> 50kg</p>
                    {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>percentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Grade
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Glazing
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            300-500gm
                                        </td>
                                        <td>
                                            5kg
                                        </td>
                                        <td>
                                            <input type="text" class="form-control">
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
<div id="filletReturnModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Return</h2>
                </div>
                <br>
                <div class="modal-body">
                        @csrf
                    <p><b>Invoice no:</b> 1111111</p>
                    <p><b>Item Name:</b> Pangas</p>
                    <p><b>Quantity:</b> 50kg</p>
                    <div class="row"><div class="col-md-3"><b>Return : </b></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div></div><br>
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