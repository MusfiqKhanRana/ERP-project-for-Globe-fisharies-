<div class="tab-pane" id="butter_fly">
    <div class="portlet-title">
        <div class="caption">
            <b>Butter Fly List</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="butter_fly_table">
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
    @include('backend.production.processing.iqf.butter_fly.butter_flyProcessingDataModal')
    @include('backend.production.processing.iqf.butter_fly.butter_flyGradingModal')
    @include('backend.production.processing.iqf.butter_fly.butter_flyCleaningModal')
    @include('backend.production.processing.iqf.butter_fly.butter_flyGlazingModal')
    @include('backend.production.processing.iqf.butter_fly.butter_flyReturnModal')
</div>