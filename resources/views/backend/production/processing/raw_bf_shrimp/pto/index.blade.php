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