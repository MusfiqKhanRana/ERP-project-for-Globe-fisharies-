<div class="tab-pane" id="whole_n_clean">
    <div class="portlet-title">
        <div class="caption">
            <b>Whole & Clean</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="whole_n_clean_table">
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
        <tbody class="whole_n_clean_tbody">
            <tr>
              
            </tr>
        </tbody>
    </table>
    @include('backend.production.vegetable_processing.iqf.whole_n_clean.washing_n_cuttingModal')
    @include('backend.production.vegetable_processing.iqf.whole_n_clean.glazingModal')
    @include('backend.production.vegetable_processing.iqf.whole_n_clean.return_n_wastageModal')

</div>