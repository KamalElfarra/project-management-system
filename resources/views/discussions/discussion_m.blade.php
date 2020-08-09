<button type="button" class="btn btn-primary {{$user_privileges->discussion->add}}" data-toggle="modal" data-target="#discussion_modal" data-whatever="@getbootstrap">Add discussion</button>

<div class="modal fade" id="discussion_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px">discussion info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="/discussion/add" enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="project_id" value="{{ $entity_id }}" />


                <div class="modal-body">

                    <div class="form-group row">
                        <label for="status" class="col-3">status:</label>
                        <select name="status" class="col-8" id="status">

                            @foreach($discussion_status as $st)

                                <option value="{{$st->cd_id}}">{{$st->cd_name}}</option>

                            @endforeach

                        </select>
                    </div>


                <div class="form-group row">
                    <label for="recipient-name" class="col-3">Name:</label>
                    <input name="Name" type="text" class="col-8" id="recipient-name" placeholder="Enter the name">
                </div>


                    <div class="form-group row">
                        <label for="comment" class="col-3">Description:</label>
                        <textarea name="description" class="col-8" id="comment" ></textarea>
                    </div>



            </div>
            <div class="modal-footer">
                <a href="/discussion" class="btn btn-secondary">Close</a>
                <input type="submit" class="btn btn-primary" value="save"/>
            </div>
            </form>
        </div>
    </div>
</div>

