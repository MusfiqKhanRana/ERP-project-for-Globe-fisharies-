<div class="tab-pane active" id="pto">
    <div class="portlet-title">
        <div class="caption">
           <b>PTO List</b>
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
                    <button style="margin-bottom:3px" data-toggle="modal" href="#ptoProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#ptoGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#ptoBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#ptoSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#ptoExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#ptoReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return</button>
                </td>
            </tr>
        </tbody>
    </table>
    @include('backend.production.processing.raw_bf_shrimp.pto.ptoProcessingDataModal')
    @include('backend.production.processing.raw_bf_shrimp.pto.ptoBlockCounterModal')
    @include('backend.production.processing.raw_bf_shrimp.pto.ptoGradingModal')
    @include('backend.production.processing.raw_bf_shrimp.pto.ptoSoakingModal')
    @include('backend.production.processing.raw_bf_shrimp.pto.ptoExcessVolumeModal')
    @include('backend.production.processing.raw_bf_shrimp.pto.ptoReturnModal')
    {{-- @include('backend.production.processing.iqf.fillet.index');
    @include('backend.production.processing.iqf.fillet.modals'); --}}
</div>