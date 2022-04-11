<div id="ptoReturnModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.block_randw')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return</h2>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin:3%">
                        @csrf
                        <input type="hidden" class="ppu_id" name="ppu_id">
                        <p><b>Invoice no:</b> <span class="invoice"></span></p>
                        <p><b>Item Name:</b> <span class="item"></span></p>
                        <p><b>Quantity:</b> <span class="qty"></span></p>
                        {{-- <p><b>Initial Weight (Kg):</b> 50kg</p> --}}
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover pto_block_randw_table">
                            <thead>
                                <tr>
                                    <th style="text-align: center">
                                        Block Size				
                                    </th>
                                    <th style="text-align: center">
                                        Size
                                    </th>
                                    <th>
                                        Block Quantity (Pc)
                                    </th>
                                    <th>
                                        Soaking Weight (Kg)
                                    </th>
                                    <th>
                                        Return Weight (Kg)
                                    </th>
                                    <th>
                                        Excess Volume (Kg)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center">
                                        300-500gm
                                    </td>
                                    <td style="text-align: center">
                                        5
                                    </td>
                                    <td>
                                        24
                                    </td>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        5
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Wastage (Kg)</label>
                                <input type="text" class="form-control" name="wastage_quantity" placeholder=" Type Wastage Volume">
                            </div>
                            <div class="col-md-6">
                                <label>Return (Kg)</label>
                                <input type="text" class="form-control" name="return_quantity" placeholder=" Type Return Volume">
                            </div>
                        </div><br>
                    </div>
                </div><br><br>
                <div class="modal-footer">
                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>