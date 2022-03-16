<div id="processData_p_d_tail_on" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    {{csrf_field()}}
    <input type="hidden" value="" id="delete_id">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Initial Weight (P & D Tail On)</h2>
                </div>
                <div class="modal-body">
                        @csrf
                    <p><b>Invoice no:</b> 1111111</p>
                    <p><b>Item Name:</b> Pangas</p>
                    <p><b>Quantity:</b> 50kg</p>
                    <p><b>Initial Weight:</b> 50kg</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-9">
                            <label>Initial Weight</label>
                            <input type="text" class="form-control" placeholder="Type Initial Weight">
                        </div>
                        <div class="col-md-3" style="margin-top: 5%"><b>Parcentage:</b> 12%</div>
                    </div><br>
                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>