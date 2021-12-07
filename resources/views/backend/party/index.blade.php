<div class="portlet box blue-chambray">
    <div class="portlet-title">
    <div class="caption">
    <i class="fa fa-briefcase"></i>Party List
    </div>
        <div class="caption pull-right">
            <a class="btn green-meadow pull-right" data-toggle="modal" href="{{route('party.create')}}">
                Add New party
            <i class="fa fa-plus"></i> </a>
        </div>
        <div class="tools">
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Party Code</th>
                    <th>prty Name</th>
                    <th>Party Type</th>
                    <th>Party Short Name</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($parties as $key=> $data)
                        <tr id="row1">
                            <td>{{ $parties->firstItem() + $key }}</td>
                            <td class="text-align: center;"> {{$data->party_code}}</td>
                            <td class="text-align: center;"> {{$data->party_name}}</td>
                            <td class="text-align: center;"> {{$data->party_type}}</td>
                            <td class="text-align: center;"> {{$data->party_short_name}}</td>
                            <td style="text-align: center">
                                <a class="btn blue"  data-toggle="modal" href="#edit_partyModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn red" data-toggle="modal" href="#deletepartyModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>

                        <div id="deletepartyModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            {{csrf_field()}}
                            <input type="hidden" value="" id="delete_id">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                    </div>
                                    <div class="modal-footer " >
                                        <div class="d-flex justify-content-between">
                                            <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                        </div>
                                        <div class="caption pull-right">
                                            <form action="{{route('party.destroy',[$data->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                            </form>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div id="edit_partyModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Update Party</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" method="post" action="{{route('party.update', $data->id)}}">
                                            {{csrf_field()}}
                                            {{method_field('put')}}

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Party Code</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" value="{{$data->party_code}}" required name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Party Name</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" value="{{$data->party_name}}" required name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Party Type</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" value="{{$data->party_type}}" required name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-md-2 control-label">Party  Short Name</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control" value="{{$data->party_short_name}}" required name="name">
                                                    </div>
                                                </div>
                                            </div><br><br><br><br><br><br><br><br><br><br>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                {{ $parties->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>