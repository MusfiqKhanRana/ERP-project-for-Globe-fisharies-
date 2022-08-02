<div class="tab-pane active" id="cut_n_clean">
    <div class="portlet-title">
        <div class="caption">
            <b>Cut & Clean</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="cut_n_clean_table">
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
        <tbody class="cut_n_clean_tbody">
            <tr>
                <td>
                    11111
                </td>
                <td>
                    Rui
                </td>
                <td>
                    300-500gm
                </td>
                <td>
                    60kg
                </td>
                <td>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#cut_n_clean_washing_n_cuttingModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i>Washing & Cutting</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#cut_n_clean_glazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#cut_n_clean_return_n_wastageModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return & Wastage</button>
                </td>
            </tr>
        </tbody>
    </table>
    @include('backend.production.vegetable_processing.iqf.cut_n_clean.washing_n_cuttingModal')
    @include('backend.production.vegetable_processing.iqf.cut_n_clean.glazingModal')
    @include('backend.production.vegetable_processing.iqf.cut_n_clean.return_n_wastageModal')

</div>