<div class="tab-pane active" id="hlso">
    <div class="portlet-title">
        <div class="caption">
            <b>HLSO List</b>
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
     
    <!--------HLSO Modals----------->
    @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.processData')
    @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.grade')
    @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.soaking')
    @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.glazing')
    @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.WastageReturn')
</div>