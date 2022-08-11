<div class="tab-pane active" id="p_n_d">
    <div class="portlet-title">
        <div class="caption">
           <b>P & D List</b>
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
    @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dProcessingDataModal')
    @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dBlockCounterModal')
    @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dGradingModal')
    @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dSoakingModal')
    @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dExcessVolumeModal')
    @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dReturnModal')
    {{-- @include('backend.production.processing.iqf.fillet.index');
    @include('backend.production.processing.iqf.fillet.modals'); --}}
</div>