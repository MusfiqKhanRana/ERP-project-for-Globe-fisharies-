<div class="tab-pane" id="whole_gutted">
    <div class="portlet-title">
        <div class="caption">
            <b>Whole Gutted List</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover">
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
        <tbody>
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
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedGradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedSoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedGlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                </td>
            </tr>
            <tr>
                <td>
                    22222
                </td>
                <td>
                    Pangash
                </td>
                <td>
                    200-300gm
                </td>
                <td>
                    50kg
                </td>
                <td>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedGradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedSoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedGlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#whole_guttedReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                </td>
            </tr>
        </tbody>
    </table>
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedProcessingDataModal')
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedGradingModal')
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedSoakingModal')
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedGlazingModal')
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedReturnModal')
</div>