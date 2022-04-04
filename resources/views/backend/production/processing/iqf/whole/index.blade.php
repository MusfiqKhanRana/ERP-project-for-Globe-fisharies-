<div class="tab-pane" id="whole">
    <div class="portlet-title">
        <div class="caption">
            <b>Whole List</b>
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
                    <button style="margin-bottom:3px" data-toggle="modal" href="#wholeProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#wholeGradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                    {{-- <button style="margin-bottom:3px" data-toggle="modal" href="#wholeSoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button> --}}
                    <button style="margin-bottom:3px" data-toggle="modal" href="#wholeGlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#wholeReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return & Wastage</button>
                </td>
            </tr>
        </tbody>
    </table>
    @include('backend.production.processing.iqf.whole.wholeProcessingDataModal')
    @include('backend.production.processing.iqf.whole.wholeGradingModal')
    @include('backend.production.processing.iqf.whole.wholeSoakingModal')
    @include('backend.production.processing.iqf.whole.wholeGlazingModal')
    @include('backend.production.processing.iqf.whole.wholeReturnModal')
    {{-- @include('backend.production.processing.iqf.whole.index');
    @include('backend.production.processing.iqf.whole.modals'); --}}
</div>