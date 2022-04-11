<div id="WastageReturn_hlso" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.randw')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (HOSO)</h2>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 3%" >
                        @csrf
                        <input type="hidden" class="ppu_id" name="randw_ppu_id">
                        <p><b>Invoice no:</b> <span class="invoice"></span></p>
                        <p><b>Item Name:</b> <span class="item"></span></p>
                        <p><b>Quantity:</b> <span class="qty"></span></p>
                        {{-- <p><b>Whole Weight:</b> 50kg</p> --}}
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover hoso_randw_table">
                            <thead>
                                <tr>
                                    <th>
                                        Grading 
                                    </th>
                                    <th>
                                        Quantity (Kg)
                                    </th>
                                    <th>
                                        Soaking Weight (Kg)
                                    </th>
                                    <th>
                                        Return Weight (Kg)
                                    </th>
                                    <th>
                                        Glazing Weight (Kg)
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
                                        15
                                    </td>
                                    <td>
                                        4
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