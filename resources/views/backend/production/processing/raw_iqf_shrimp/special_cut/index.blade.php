<div class="tab-pane active" id="specialcut">
    <div class="portlet-title">
        <div class="caption">
            <b>Special Cut List</b>
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
     <!--------special_cut Modals----------->
     @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.processData_e')
     @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.grade_e')
     @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.soaking_e')
     @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.glazing_e')
     @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.WastageReturn_e')
</div>