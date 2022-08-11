<div class="tab-pane active" id="fillet">
    <div class="portlet-title">
        <div class="caption">
           <b>Fillet List</b>
        </div>
        <div class="tools">
        </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="fillet_table">
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
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="fillet_tbody">
            <tr>
                
            </tr>
        </tbody>
    </table>
    @include('backend.production.processing.iqf.fillet.processing_modal')
    @include('backend.production.processing.iqf.fillet.filletGradingModal')
    @include('backend.production.processing.iqf.fillet.filletSoakingModal')
    @include('backend.production.processing.iqf.fillet.filletGlazingModal')
    @include('backend.production.processing.iqf.fillet.filletReturnModal')
    {{-- @include('backend.production.processing.iqf.fillet.index');
    @include('backend.production.processing.iqf.fillet.modals'); --}}
</div>
<script>
    $(document).ready(function()
    {
        
    });
</script>