<div class="tab-pane" id="butter_fly">
    <div class="portlet-title">
        <div class="caption">
            <b>Butter Fly List</b>
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
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
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
                    <button style="margin-bottom:3px" data-toggle="modal" href="#butter_flyProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#butter_flyCleaningModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Cleaning</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#butter_flyGradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                    {{-- <button style="margin-bottom:3px" data-toggle="modal" href="#butter_flySoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button> --}}
                    <button style="margin-bottom:3px" data-toggle="modal" href="#butter_flyGlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#butter_flyReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return & Wastage</button>
                </td>
            </tr>
        </tbody>
    </table>
    @include('backend.production.processing.iqf.butter_fly.butter_flyProcessingDataModal')
    @include('backend.production.processing.iqf.butter_fly.butter_flyGradingModal')
    @include('backend.production.processing.iqf.butter_fly.butter_flySoakingModal')
    @include('backend.production.processing.iqf.butter_fly.butter_flyGlazingModal')
    @include('backend.production.processing.iqf.butter_fly.butter_flyReturnModal')
</div>