<div id="cut_n_clean_block_counterModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.other_processing.vegetable.blockcounter_to_return')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Block Counter </h2>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" class="ppu_id" name="ppu_id">
                    <p><b>Invoice no:</b> <span class="invoice"></span></p>
                    <p><b>Item Name:</b> <span class="item"></span></p>
                    <p><b>Quantity:</b> <span class="qty"></span></p>
                {{-- <p><b>Initial Weight:</b> 50kg</p> --}}
                <div class="row" style="margin-bottom:2%;text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;">
                    <div class="col-md-6">
                        <p><b>Washing & Cutting Weight:</b> <span class="washing_n_cutting_weight"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><b>Washing & Cutting Date & Time:</b> <span class="washing_n_cutting_date_time"></span></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover block_counter_table">
                        <thead>
                            <tr>
                                <th>
                                    Block Size
                                </th>
                                <th>
                                    Size
                                </th>
                                <th>
                                   Quantity (Pc)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    300-500gm
                                </td>
                                <td>
                                    5
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Type Quantity">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
                <br><br><br><br><br>
                <div class="modal-footer">
                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>