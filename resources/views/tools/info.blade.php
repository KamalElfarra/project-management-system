
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">tool info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



                <div class="modal-body">


                    <div class="form-group row">
                        <img width="30" height="30" src="{{$alert->created_by->image->full_path()}}" alt="" class="user-avatar-md rounded-circle col-3">
                        <span class="col-8">{{$alert->created_by->username()}}</span>
                    </div>


                    <div class="form-group row">
                        <label for="type" class="col-3">Type:</label>
                        <div class="col-8" >{{$alert->type->cd_name}}</div>
                    </div>




                    <div class="form-group row">
                        <label for="recipient-name" class="col-3">title:</label>
                        <div class="col-8" >{{$alert->too_title}}</div>
                    </div>

                    <div class="form-group row">
                        <label for="comment" class="col-3">Description:</label>
                        <div class="col-8" >{{$alert->too_description}}</div>
                    </div>

                    <div class="form-group row">
                        <label for="comment" class="col-3">Alert Date:</label>
                        <div class="col-8" >{{$alert->too_creation_date}}</div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

        </div>

    </div>
</div>





