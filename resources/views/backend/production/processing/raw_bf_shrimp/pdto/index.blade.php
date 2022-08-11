<div class="tab-pane active" id="pdto">
    <div class="portlet-title">
        <div class="caption">
           <b>PDTO List</b>
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
    @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoProcessingDataModal')
    @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoBlockCounterModal')
    @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoGradingModal')
    @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoSoakingModal')
    @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoExcessVolumeModal')
    @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoReturnModal')
    {{-- @include('backend.production.processing.iqf.fillet.index');
    @include('backend.production.processing.iqf.fillet.modals'); --}}
</div>