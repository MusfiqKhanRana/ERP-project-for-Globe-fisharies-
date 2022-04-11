<div id="glazing_p_d_tail_on" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.glazing')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (HLSO)</h2>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="glazing_ppu_id" class="ppu_id">   
                    <p><b>Invoice no:</b> <span class="invoice"></span></p>
                    <p><b>Item Name:</b> <span class="item"></span></p>
                    <p><b>Quantity:</b> <span class="qty"></span></p>
                {{-- <p><b>HLSO:</b> 50kg</p> --}}
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover pd_tail_on_glazing_table">
                        <thead>
                            <tr>
                                <th>
                                    Grade
                                </th>
                                <th>
                                    Weight (Kg)
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
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Type  Glazing Volume">
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