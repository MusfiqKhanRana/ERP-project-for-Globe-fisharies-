<div class="tab-pane active" id="tailoff">
    <div class="portlet-title">
        <div class="caption">
            <b>P & D Tail Off List</b>
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
                    <button style="margin-bottom:3px" data-toggle="modal" href="#processData_tail_off" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#grade_tail_off" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_tail_off" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_tail_off" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_tail_off" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
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
    <!--------p_d_tail_off Modals----------->
    @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.processData_d')
    @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.grade_d')
    @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.soaking_d')
    @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.glazing_d')
    @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.WastageReturn_d')
</div>