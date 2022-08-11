<div class="tab-pane active" id="pud">
    <div class="portlet-title">
        <div class="caption">
           <b>PUD List</b>
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
    @include('backend.production.processing.raw_bf_shrimp.pud.pudProcessingDataModal')
    @include('backend.production.processing.raw_bf_shrimp.pud.pudBlockCounterModal')
    @include('backend.production.processing.raw_bf_shrimp.pud.pudGradingModal')
    @include('backend.production.processing.raw_bf_shrimp.pud.pudSoakingModal')
    @include('backend.production.processing.raw_bf_shrimp.pud.pudExcessVolumeModal')
    @include('backend.production.processing.raw_bf_shrimp.pud.pudReturnModal')
    {{-- @include('backend.production.processing.iqf.fillet.index');
    @include('backend.production.processing.iqf.fillet.modals'); --}}
</div>