<div class="tab-pane" id="sliced_chinese">
    <div class="portlet-title">
        <div class="caption">
            <b>Sliced(Chinese Cut) List</b>
        </div>
        <div class="tools"> </div>
    </div>
    <hr>
    <table class="table table-striped table-bordered table-hover" id="sliced_chinese_table">
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
                    <button style="margin-bottom:3px" data-toggle="modal" href="#sliced_chineseProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#sliced_chineseCleaningModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Cleaning</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#sliced_chineseGradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                    {{-- <button style="margin-bottom:3px" data-toggle="modal" href="#sliced_chineseSoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button> --}}
                    <button style="margin-bottom:3px" data-toggle="modal" href="#sliced_chineseGlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                    <button style="margin-bottom:3px" data-toggle="modal" href="#sliced_chineseReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return & Wastage</button>
                </td>
            </tr>
        </tbody>
    </table>
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseProcessingDataModal')
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseGradingModal')
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseCleaningModal')
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseGlazingModal')
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseReturnModal')
</div>