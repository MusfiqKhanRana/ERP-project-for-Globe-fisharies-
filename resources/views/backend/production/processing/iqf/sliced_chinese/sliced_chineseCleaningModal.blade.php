<div id="sliced_chineseCleaningModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.cleaning_to_grading')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Cleaned</h2>
                </div>
                <br>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="ppu_id" class="cleaned_ppu_id">
                    <p><b>Invoice no:</b> <span class="sliced_chinese_invoice"></span></p>
                    <p><b>Item Name:</b> <span class="sliced_chinese_item"></span></p>
                    <p><b>Quantity:</b> <span class="sliced_chinese_qty"></span></p>
                {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>Parcentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <b>Cleaned Weight:</b>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control initial_weight" name="cleaning_weight" placeholder="Type Cleaned Weight">
                            </div>
                            <div class="col-md-3">
                                <b>Parcentage:</b> <span class="parcentage"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>