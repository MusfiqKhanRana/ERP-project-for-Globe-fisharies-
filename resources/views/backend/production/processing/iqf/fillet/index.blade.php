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
                <td>
                    11111
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
                    <button style="margin-bottom:3px" data-toggle="modal" href="#filletProcessingDataModal" class="btn btn-success fillet_processing"><i class="fa fa-refresh" aria-hidden="true"></i> Raw Filleting</button>
                    {{-- <button style="margin-bottom:3px" data-toggle="modal" href="#filletGradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button> --}}
                    <button style="margin-bottom:3px" data-toggle="modal" href="#filletSoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#filletGlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#filletReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return & Wastage</button>
                </td>
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