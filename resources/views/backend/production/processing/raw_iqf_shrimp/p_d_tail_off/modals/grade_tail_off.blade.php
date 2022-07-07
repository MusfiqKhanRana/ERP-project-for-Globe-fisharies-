<div id="grade_tail_off" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.grading')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (HLSO)</h2>
                </div>
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="inputs" class="inputs">
                        <input type="hidden" class="ppu_id" name="grade_ppu_id">
                        <p><b>Invoice no:</b> <span class="invoice"></span></p>
                        <p><b>Item Name:</b> <span class="item"></span></p>
                        <p><b>Quantity:</b> <span class="qty"></span></p>
                        <div class="row" style="text-shadow: -1px 0 #013B45, 0 1px #013B45, 1px 0 #013B45, 0 -1px #013B45;background-color:#013B45;color:white;margin-bottom:2%;">
                            <div class="col-md-6">
                                <p><b>Initial Weight:</b> <span class="initial_weight"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><b>Initial Date & Time:</b> <span class="initial_weight_datetime"></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Select Grade</label>
                                <select type="text" class="form-control grade_select" >
                                    <option>--Select--</option>
                                    @foreach ($grades as $item)
                                    <option value="{{$item->id}}" data-grade_name="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5" >
                                <label>Quantity (Kg) </label>
                                <input type="text" class="form-control grade_weight"  placeholder="weight">
                            </div>
                            <div class="col-md-2" style="margin-top: 3%">
                                <button type="button" class="btn btn-success add_btn">add</button>
                            </div>
                        </div>
                        <div class="row">
                            <br><br>
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover pd_tail_off_grading_table">
                                    <thead>
                                        <tr>
                                            <th>
                                                Grade
                                            </th>
                                            <th>
                                                Quantity (Kg)
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
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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