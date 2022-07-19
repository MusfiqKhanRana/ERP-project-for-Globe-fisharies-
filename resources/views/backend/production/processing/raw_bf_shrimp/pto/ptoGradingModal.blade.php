<div id="ptoGradingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form" method="post" action="{{route('production.processing-unit.blocking_to_blockcounter')}}">
                {{csrf_field()}}
                <div class="modal-header"  style="background-color: #36C6D3;text-align:center;">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Blocking</h2>
                </div>
                <div class="modal-body">
                        @csrf
                        <input type="hidden" name="inputs" class="inputs">
                        <input type="hidden" class="ppu_id" name="ppu_id">
                        <p><b>Invoice no:</b> <span class="invoice"></span></p>
                        <p><b>Item Name:</b> <span class="item"></span></p>
                        <p><b>Quantity:</b> <span class="qty"></span></p>
                    {{-- <p><b>Initial Weight (Kg):</b> 50kg</p> --}}
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
                            <label>Block Size</label>
                            <select type="text" class="form-control block_select" >
                                <option>--Select--</option>
                                @foreach ($blocks as $item)
                                <option value="{{$item->id}}" data-block_size="{{$item->block_size}}">{{$item->block_size}} kg</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label>Size</label>
                            <select type="text" class="form-control size_select" >
                                <option>--Select--</option>
                                @foreach ($blocks_size as $itemx)
                                <option value="{{$itemx->id}}" data-size="{{$itemx->size}}">{{$itemx->size}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1" style="margin-top: 4%">
                            <button class="btn btn-success add_btn" type="button">+ Add</button>
                        </div>
                    </div><br>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover pto_block_table">
                            <thead>
                                <tr>
                                    <th style="text-align: center">
                                        Block Size
                                    </th>
                                    <th style="text-align: center">
                                        Size
                                    </th>
                                    <th>
                                        Action
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