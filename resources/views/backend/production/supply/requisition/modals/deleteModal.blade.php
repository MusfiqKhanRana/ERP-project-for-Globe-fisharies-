<div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                    <form action="{{route('production-requisition.destroy',[$data->id])}}" method="POST">
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