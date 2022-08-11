<div class="tab-pane" id="sliced_fmly">
    <div class="portlet-title">
        <div class="caption">
            <b>Sliced(Family Cut) List</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="sliced_fmly_table">
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
    @include('backend.production.processing.iqf.sliced_fmly.sliced_fmlyProcessingDataModal')
    @include('backend.production.processing.iqf.sliced_fmly.sliced_fmlyGradingModal')
    @include('backend.production.processing.iqf.sliced_fmly.sliced_fmlyCLeaningModal')
    @include('backend.production.processing.iqf.sliced_fmly.sliced_fmlyGlazingModal')
    @include('backend.production.processing.iqf.sliced_fmly.sliced_fmlyReturnModal')
</div>