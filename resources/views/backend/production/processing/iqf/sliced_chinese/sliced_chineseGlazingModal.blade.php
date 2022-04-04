<div id="sliced_chineseGlazingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.glazing')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Glazing</h2>
                </div>
                <br>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="glazing_ppu_id" class="glazing_ppu_id">
                    <p><b>Invoice no:</b> <span class="sliced_chinese_invoice"></span></p>
                    <p><b>Item Name:</b> <span class="sliced_chinese_item"></span></p>
                    <p><b>Quantity:</b> <span class="sliced_chinese_qty"></span></p>
               
                {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>Parcentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover sliced_chinese_glazing_table">
                                <thead>
                                    <tr>
                                        <th>
                                            Grade
                                        </th>
                                        <th>
                                            Quantity (Kg)
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
                                            <input type="text" class="form-control" placeholder="Type Glazing Weight">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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