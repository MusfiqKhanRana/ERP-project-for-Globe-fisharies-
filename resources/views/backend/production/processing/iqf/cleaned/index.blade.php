<div class="tab-pane" id="cleaned">
    <div class="portlet-title">
        <div class="caption">
            <b>Cleaned List</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="cleaned_table">
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
    @include('backend.production.processing.iqf.cleaned.cleanedProcessingDataModal')
    @include('backend.production.processing.iqf.cleaned.cleanedGradingModal')
    @include('backend.production.processing.iqf.cleaned.cleanedcleangModal')
    @include('backend.production.processing.iqf.cleaned.cleanedGlazingModal')
    @include('backend.production.processing.iqf.cleaned.cleanedReturnModal')
</div>