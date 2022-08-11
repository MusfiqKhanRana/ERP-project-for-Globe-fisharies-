<div class="tab-pane active" id="hlso">
    <div class="portlet-title">
        <div class="caption">
           <b>HLSO List</b>
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
    @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoProcessingDataModal')
    @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoBlockCounterModal')
    @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoGradingModal')
    @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoSoakingModal')
    @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoExcessVolumeModal')
    @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoReturnModal')
    {{-- @include('backend.production.processing.iqf.fillet.index');
    @include('backend.production.processing.iqf.fillet.modals'); --}}
</div>