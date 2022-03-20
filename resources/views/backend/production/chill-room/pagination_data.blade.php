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
                                    <button class="btn btn-success">Process</button>
                                </td>
                            </tr>
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
    </div>
</div>