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