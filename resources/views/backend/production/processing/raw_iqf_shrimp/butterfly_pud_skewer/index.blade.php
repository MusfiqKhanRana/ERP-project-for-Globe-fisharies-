<div class="tab-pane active" id="butterfly">
    <div class="portlet-title">
        <div class="caption">
            <b>Butterfly PUD Skewer List</b>
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
      <!--------butterfly_pud_skewer Modals----------->
      @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.processData_g')
      @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.grade_g')
      @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.soaking_g')
      @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.glazing_g')
      @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.WastageReturn_g')

</div>