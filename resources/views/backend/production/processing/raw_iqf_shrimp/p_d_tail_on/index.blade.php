<div class="tab-pane active" id="tailon">
    <div class="portlet-title">
        <div class="caption">
            <b>P & D Tail On List</b>
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
      <!--------p_d_tail_on Modals----------->
      @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.processData_c')
      @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.grade_c')
      @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.soaking_c')
      @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.glazing_c')
      @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.WastageReturn_c')
</div>