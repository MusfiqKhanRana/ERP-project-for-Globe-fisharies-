<div class="tab-pane" id="whole">
    <div class="portlet-title">
        <div class="caption">
            <b>Whole</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="whole_table">
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
        <tbody class="whole_tbody">
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
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_washing_n_cuttingModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i>Washing & Cutting</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_blockingModal" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Blocking</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_block_counterModal" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_return_n_wastageModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return & Wastage</button>
                </td>
            </tr>
        </tbody>
    </table>
    @include('backend.production.vegetable_processing.block.whole.washing_n_cuttingModal')
    @include('backend.production.vegetable_processing.block.whole.blockingModal')
    @include('backend.production.vegetable_processing.block.whole.block_counterModal')
    @include('backend.production.vegetable_processing.block.whole.return_n_wastageModal')

</div>