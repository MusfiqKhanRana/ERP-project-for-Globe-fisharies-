<div class="portlet box blue-chambray">
    <div class="portlet-title">
    <div class="caption">
    <i class="fa fa-briefcase"></i>Production Purchase Type List
    </div>
        <div class="caption pull-right">
            <a class="btn green-meadow pull-right" data-toggle="modal" href="#add_procution_purchase_types">
                Add New
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
                    <th>Name</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($procution_purchase_types as $key=> $data)
                        <tr id="row1">
                            <td>{{ $procution_purchase_types->firstItem() + $key }}</td>
                            <td class="text-align: center;"> {{$data->name}}</td>
                            <td style="text-align: center">
                                <a class="btn btn-info"  data-toggle="modal" href="#edit_procution_purchase_types{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn red" data-toggle="modal" href="#delete_procution_purchase_types{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>

                        <div id="delete_procution_purchase_types{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                            <form action="{{route('procution-purchase-types.destroy',[$data->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="edit_procution_purchase_types{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Update Procution Purchase Types</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" method="post" action="{{route('procution-purchase-types.update', $data->id)}}">
                                            {{csrf_field()}}
                                            {{method_field('put')}}
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-md-2 control-label">Procution Purchase Types Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" value="{{$data->name}}" required name="name">
                                                </div>
                                                <br><br>
                                            </div>
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
                {{ $procution_purchase_types->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
    <div id="add_procution_purchase_types" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Procution Purchase Types</h4>
                </div>
                <br>
                <form class="form-horizontal" role="form" method="post" action="{{route('procution-purchase-types.store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" placeholder="procution_purchase_types Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                        <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>