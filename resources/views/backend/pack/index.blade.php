<div class="portlet box blue-chambray">
    <div class="portlet-title">
    <div class="caption">
    <i class="fa fa-briefcase"></i>Pack List
    </div>
        <div class="caption pull-right">
            <a class="btn green-meadow pull-right" data-toggle="modal" href="#addpackModal">
                Add New Pack
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
                    @foreach($packs as $key=> $data)
                        <tr id="row1">
                            <td>{{$key+1}}</td>
                            <td class="text-align: center;"> {{$data->name}}</td>
                            <td style="text-align: center">
                                <a class="btn btn-info"  data-toggle="modal" href="#editpackModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn red" data-toggle="modal" href="#deletepackModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>

                        <div id="deletepackModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                            <form action="{{route('pack.destroy',[$data->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                            </form>
                                        </div>
                                        <!-- <a type="submit" href="{{route('pack.destroy',$data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> -->
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div id="editpackModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Update Pack</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" method="post" action="{{route('pack.update', $data->id)}}">
                                            {{csrf_field()}}
                                            {{method_field('put')}}

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" value="{{$data->name}}" required name="name">
                                                </div>
                                            </div>
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
    <div id="addpackModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Pack</h4>
                </div>
                <form class="form-horizontal" role="form" method="post" action="{{route('pack.store')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" placeholder="Pack Name">
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