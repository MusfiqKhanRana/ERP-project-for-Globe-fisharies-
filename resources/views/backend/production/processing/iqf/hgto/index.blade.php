<div class="tab-pane" id="hgto">
    <div class="portlet-title">
        <div class="caption">
            <b>HGTO List</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="hgto_table">
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
    @include('backend.production.processing.iqf.hgto.hgtoProcessingDataModal')
    @include('backend.production.processing.iqf.hgto.hgtoGradingModal')
    @include('backend.production.processing.iqf.hgto.hgtoCleaningModal')
    @include('backend.production.processing.iqf.hgto.hgtoGlazingModal')
    @include('backend.production.processing.iqf.hgto.hgtoReturnModal')
</div>