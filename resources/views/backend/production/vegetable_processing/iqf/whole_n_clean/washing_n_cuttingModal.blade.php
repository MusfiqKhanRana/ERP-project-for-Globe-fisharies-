<div id="whole_n_clean_washing_n_cuttingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.other_processing.vegetable.washing_to_glazing')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Washing & Cutting</h2>
                </div>
                <br>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="ppu_id" class="ppu_id">
                    <p><b>Invoice no:</b> <span class="invoice"></span></p>
                    <p><b>Item Name:</b> <span class="item"></span></p>
                    <p><b>Quantity:</b> <span class="qty"></span></p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <b>Cleaned Weight:</b>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" step="0.01" class="form-control washing_n_cutting_weight" name="washing_n_cutting_weight" placeholder="Type Cleaned Weight">
                                </div>
                                <div class="col-md-3">
                                    <b>percentage:</b> <span class="percentage"></span>
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