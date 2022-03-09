<div class="tab-pane active" id="vein">
    <div class="portlet-title">
        <div class="caption">
            <b>PUD Pull Vein List</b>
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
                <th style="text-align: center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    1001
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
                    <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                </td>
            </tr>
            <tr>
                <td>
                    1002
                </td>
                <td>
                    Pangash
                </td>
                <td>
                    200-300gm
                </td>
                <td>
                    50kg
                </td>
                <td>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                </td>
            </tr>
        </tbody>
    </table>
     <!--------pdu_pull_vein Modals----------->
     @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.processData_h')
     @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.grade_h')
     @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.soaking_h')
     @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.glazing_h')
     @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.WastageReturn_h')

</div>