<div class="tab-pane" id="whole_gutted">
    <div class="portlet-title">
        <div class="caption">
            <b>Whole Gutted List</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="whole_gutted_table">
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
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedProcessingDataModal')
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedGradingModal')
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedCleanModal')
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedGlazingModal')
    @include('backend.production.processing.iqf.whole_gutted.whole_guttedReturnModal')
</div>