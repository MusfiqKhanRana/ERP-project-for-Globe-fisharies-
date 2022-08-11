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