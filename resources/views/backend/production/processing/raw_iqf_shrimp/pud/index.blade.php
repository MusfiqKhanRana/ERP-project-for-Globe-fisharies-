<div class="tab-pane active" id="pud">
    <div class="portlet-title">
        <div class="caption">
            <b>PUD List</b>
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
    @include('backend.production.processing.raw_iqf_shrimp.pud.modals.processData_b')
    @include('backend.production.processing.raw_iqf_shrimp.pud.modals.grade_b')
    @include('backend.production.processing.raw_iqf_shrimp.pud.modals.soaking_b')
    @include('backend.production.processing.raw_iqf_shrimp.pud.modals.glazing_b')
    @include('backend.production.processing.raw_iqf_shrimp.pud.modals.WastageReturn_b')
</div>