<div class="portlet box blue-chambray">
    <div class="portlet-title">
    <div class="caption">
    <i class="fa fa-briefcase"></i>Block List
    </div>
        <div class="caption pull-right">
            <a class="btn green-meadow pull-right" data-toggle="modal" href="#addBlockModal">
                Add New Block
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
                    <th>Block Size</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($p_block as $key=> $data)
                        <tr id="row1">
                            <td>{{++ $key }}</td>
                            <td class="text-align: center;"> {{$data->block_size}} kg</td>
                            <td style="text-align: center">
                                <a class="btn btn-info"  data-toggle="modal" href="#editBlockModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn red" data-toggle="modal" href="#deleteBlockModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <div id="deleteBlockModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                            <form action="{{route('processing-block.destroy',[$data->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="editBlockModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Update Block</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" method="post" action="{{route('processing-block.update', $data->id)}}">
                                            {{csrf_field()}}
                                            {{method_field('put')}}
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-md-2 control-label">Block Size</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" value="{{$data->block_size}}" required name="block_size">
                                                </div><br><br>
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
        </div>
    </div>
    <div id="addBlockModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Block</h4>
                </div><br>
                <form class="form-horizontal" role="form" method="post" action="{{route('processing-block.store')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Block Size(kg)</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="block_size" placeholder="Block Size">
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