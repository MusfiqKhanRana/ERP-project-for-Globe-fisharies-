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