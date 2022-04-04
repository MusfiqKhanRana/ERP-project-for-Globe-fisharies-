<div id="whole_guttedCleanModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.cleaning_to_grading')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Gutted Clean</h2>
                </div>
                <br>
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="ppu_id" class="whole_gutted_ppu_id">
                        <p><b>Invoice no:</b> <span class="whole_gutted_invoice"></span></p>
                        <p><b>Item Name:</b> <span class="whole_gutted_item"></span></p>
                        <p><b>Quantity:</b> <span class="whole_gutted_qty"></span></p>
                    <hr>
                    {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>Parcentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Grade
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Soaking
                                        </th>
                                        <th>
                                            Damage Weight
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            300-500gm
                                        </td>
                                        <td>
                                            5kg
                                        </td>
                                        <td>
                                            <input type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control">
                                        </td>
                                    </tr>
                                </tbody>
                            </table> --}}
                            <div class="row">
                                <div class="col-md-9">
                                    <label>Gutted Weight</label>
                                    <input type="text" class="form-control initial_weight" name="cleaning_weight" placeholder="Type Gutted Weight">
                                </div>
                                <div class="col-md-3" style="margin-top: 6%">
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