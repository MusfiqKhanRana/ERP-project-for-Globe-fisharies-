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
               
            </tr>
        </tbody>
    </table>
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseProcessingDataModal')
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseGradingModal')
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseCleaningModal')
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseGlazingModal')
    @include('backend.production.processing.iqf.sliced_chinese.sliced_chineseReturnModal')
</div>