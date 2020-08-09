
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">tool info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="post" action="/user_alert/add" enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />



                <div class="modal-body">
                    <div class="form-group row">
                        <label for="type" class="col-3">type:</label>
                        <select name="type" class="col-8" id="type">

                            @foreach($type as $ty)

                            <option value="{{$ty->cd_id}}">{{$ty->cd_name}}</option>

                                @endforeach

                        </select>
                    </div>



                    <div class="form-group row">
                        <label for="priority" class="col-3">Users Groups:</label>
                        <select name="user_group" class="col-8" id="priority">

                            @foreach($Groups as $Gr)

                                <option value="{{$Gr->g_id}}">{{$Gr->g_name}}</option>

                            @endforeach

                        </select>
                    </div>


                    <div class="form-group row">
                        <label for="Assigned_to" class="col-3">Assigned To:</label>
                        <select name="Assigned_to" class="col-8" id="Assigned_to">

                            @foreach($Assign as $as)

                                <option value="{{$as->u_id}}">{{$as->u_firstname}}</option>


                            @endforeach

                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="recipient-name" class="col-3">title:</label>
                        <input name="title" type="text" class="col-8" id="recipient-name" style="height: 35px">
                    </div>

                    <div class="form-group row">
                        <label for="comment" class="col-3">Description:</label>
                        <textarea name="description" class="col-8" id="comment"></textarea>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="save"/>
                </div>
            </form>

        </div>

    </div>
</div>





