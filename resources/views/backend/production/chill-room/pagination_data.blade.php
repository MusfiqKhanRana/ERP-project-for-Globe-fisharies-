<div class="tab-pane fade" id="stockdetails" role="tabpanel" aria-labelledby="profile-tab">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>
                    Invoice No.
                </th>
                <th>
                    Added In Chill Room
                </th>
                <th>
                    Items
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requisitions as $requisition)
            <tr>
                <td>
                    {{$requisition->invoice_code}}
                </td>
                <td>
                    {{$requisition->receive_date}}
                </td>
                <td>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>
                                    Item Name
                                </th>
                                <th>
                                    Grade
                                </th>
                                <th>
                                    Current Stock Alive(kg)
                                </th>
                                <th>
                                    Current Stock Dead(kg)
                                </th>
                                <th>
                                    Remark
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requisition->production_requisition_items as $item)
                            <tr>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->grade->name}}
                                </td>
                                <td>
                                    {{$item->pivot->alive_quantity}}
                                </td>
                                <td>
                                    {{$item->pivot->dead_quantity}}
                                </td>
                                <td>
                                    {{$item->pivot->received_remark}}
                                </td>
                                <td>
                                    <button class="btn btn-success" data-toggle="modal" href="#processModal{{$item->pivot->id}}">Process</button>
                                </td>
                            </tr>
                                <div class="modal fade" id="processModal{{$item->pivot->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="text-align: center">
                                        <h3 class="modal-title" id="exampleModalLabel"><b>Transfer Stock To Processing Unit</b></h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><b>Item Name:</b>{{$item->name}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                @php
                                                $totalweight=0;
                                                    $totalweight = ($item->pivot->alive_quantity)+($item->pivot->dead_quantity);
                                                    // dd($totalweight);
                                                @endphp
                                                <p><b>Current Stock:</b> {{$totalweight}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><b>Size:</b> {{$item->grade->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><b>Processing Type :</b></p>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" name="" id="">
                                                    <option value="">--Select--</option>
                                                    <option value="iqf">IQF</option>
                                                    <option value="block_frozen">Block Frozen</option>
                                                    <option value="raw_bf_shrimp">Raw BF(Shrimp)</option>
                                                    <option value="raw_iqf_shrimp">Raw IQF(Shrimp)</option>
                                                    <option value="semi_iqf">Semi IQF</option>
                                                    <option value="cooked_iqf_shrimp">Cooked IQF(Shrimp)</option>
                                                    <option value="blanched_iqf_shrimp">Balanched IQF(Shrimp)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p><b>Processing Variant :</b></p>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control" name="" id="">
                                                    <option value="">--Select--</option>
                                                    <option value="fillet">Fillet</option>
                                                    <option value="whole">Whole</option>
                                                    <option value="whole_gutted">Whole Gutted</option>
                                                    <option value="cleaned">Cleaned</option>
                                                    <option value="sliced_fmly_cut">Sliced(Family Cut)</option>
                                                    <option value="sliced_chinese_cut">Sliced(Chinese Cut)</option>
                                                    <option value="butter_fly">Butter Fly</option>
                                                    <option value="hgto">HGTO</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="mark" name="mark">
                                                      <option value="">--</option>
                                                      <option value="bmw">BMW</option>
                                                      <option value="audi">Audi</option>
                                                    </select>
                                                    <select class="series" name="series">
                                                      <option value="">--</option>
                                                      <option value="series-3" class="bmw">3 series</option>
                                                      <option value="series-5" class="bmw">5 series</option>
                                                      <option value="series-6" class="bmw">6 series</option>
                                                      <option value="a3" class="audi">A3</option>
                                                      <option value="a4" class="audi">A4</option>                                                   
                                                      <option value="a5" class="audi">A5</option>
                                                    </select>
                                                    
                                            </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
        {{ $requisitions->links('vendor.pagination.custom') }}
        {{-- {{ $requisitions->links() }} --}}
        {{-- {!! $requisitions->render() !!} --}}
    </div>
</div>