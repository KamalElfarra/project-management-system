

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ticket_modal" data-whatever="@getbootstrap">Add ticket</button>

<div class="modal fade" id="ticket_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ticket info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="/ticket/add" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="project_id" value="{{ $project->p_id }}" />

                <div class="modal-body">

                    <div class="form-group row">
                        <label  for="message-text" class="col-md-3">status:</label>
                        <select name="status" class="col-md-8" id="message-text">
                            @foreach($ticket_status as $st)
                                <option value="{{$st->cd_id}}">{{$st->cd_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="message-text" class="col-3">type:</label>
                        <select name="type" class="col-8" id="status">
                            @foreach($ticket_type as $ty)
                                <option value="{{$ty->cd_id}}">{{$ty->cd_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="recipient-name" class="col-3">subject:</label>
                        <input name="subject" type="text" class="col-8" id="recipient-name" style="height: 35px">
                    </div>

                    <div class="form-group row">
                        <label for="comment" class="col-3">Description:</label>
                        <textarea name="description" class="col-8" id="comment"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="save" />
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>

