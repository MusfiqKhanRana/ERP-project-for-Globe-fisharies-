<div class="tab-pane" id="whole">
    <div class="portlet-title">
        <div class="caption">
            <b>Whole</b>
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
    @include('backend.production.vegetable_processing.iqf.whole.washing_n_cuttingModal')
    @include('backend.production.vegetable_processing.iqf.whole.glazingModal')
    @include('backend.production.vegetable_processing.iqf.whole.return_n_wastageModal')

</div>