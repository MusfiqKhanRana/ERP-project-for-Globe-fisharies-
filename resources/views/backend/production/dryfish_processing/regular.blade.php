<div class="tab-pane active" id="regular">
    <div class="portlet-title">
        <div class="caption">
            <b>Regular</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="regular_table">
        <thead>
            <tr>
                <th>
                    Invoice No.
                </th>
                <th>
                    Item Name
                </th>
                <th>
                    Grade
                </th>
                <th>
                    Quantity
                </th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="cut_n_clean_tbody">
            <tr>
                <td>
                    11111
                </td>
                <td>
                    Rui
                </td>
                <td>
                    300-500gm
                </td>
                <td>
                    60kg
                </td>
                <td>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#sorting_with_returnModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i>Sorting with return&wastage</button>
                </td>
            </tr>
        </tbody>
    </table>
    <div id="sorting_with_returnModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" role="form" method="post" action="{{route('production.other_processing.dryfish.regular_to_store')}}">
                    {{csrf_field()}}
                    <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Sorting <small>(with Return & Wastage)</small></h2>
                    </div>
                    <br>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="ppu_id" class="ppu_id">
                        <p><b>Invoice no:</b> <span class="invoice"></span></p>
                        <p><b>Item Name:</b> <span class="item"></span></p>
                        <p><b>Quantity:</b> <span class="qty"></span></p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>Sorting Weight:</b>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" step="0.01" class="form-control sorting_weight" name="sorting_weight" placeholder="Type Sorting Weight">
                                    </div>
                                    <div class="col-md-3">
                                        <b>Parcentage:</b> <span class="parcentage"></span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Wastage (Kg)</label>
                                        <input type="number" step="0.01" class="form-control" name="wastage_quantity" required placeholder=" Type Wastage Volume">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Return (Kg)</label>
                                        <input type="number" step="0.01" class="form-control" name="return_quantity" required placeholder=" Type Return Volume">
                                    </div>
                                </div><br>
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
</div>