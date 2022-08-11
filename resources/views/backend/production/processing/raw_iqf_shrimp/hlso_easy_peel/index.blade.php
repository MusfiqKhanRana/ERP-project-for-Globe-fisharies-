<div class="tab-pane active" id="easypeel">
    <div class="portlet-title">
        <div class="caption">
            <b>HLSO Easy Peel List</b>
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
     <!--------hlso_easy_peel Modals----------->
     @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.processData_f')
     @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.grade_f')
     @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.soaking_f')
     @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.glazing_f')
     @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.WastageReturn_f')
</div>