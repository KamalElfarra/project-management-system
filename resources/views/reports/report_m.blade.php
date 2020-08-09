
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Search</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project Search </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="post" action="/report" >

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="modal-body">
                    <div class="simple-card">
                      <h4 class="text text-danger">If You Leave any field empty iy will not included in search</h4>
                        <div class="form-group row">
                            <label for="priority" class="col-3">priority:</label>
                            <select name="priority" class="col-8" id="priority">
                                <option value="0">Select....</option>
                                @foreach($project_priority as $pr)
                                    <option value="{{$pr->cd_id}}">{{$pr->cd_name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="message-text" class="col-3">status:</label>
                            <select name="status" class="col-8" id="status">
                                <option value="0">Select....</option>
                                @foreach($project_status as $st)
                                    <option value="{{$st->cd_id}}">{{$st->cd_name}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="recipient-name" class="col-3">Name:</label>
                            <input name="name" type="text" class="col-8" id="recipient-name" placeholder="Enter your name">
                        </div>



                        <div class="form-group row">
                            <label for="date_picker" class="col-3">Date time:</label>
                            <input name="date" type="text" class="form-control datetimepicker-input col-8" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5">
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-3">Description:</label>
                            <textarea name="description" class="col-8" id="comment"></textarea>
                        </div>


                        <div class="form-group row">
                            <label for="project_team" class="col-3">Project Team:</label>

                            <select name="project_team" class="col-8" id="project_team">
                                <option value="0">Select....</option>
                                @foreach($user_groups as $group)
                                    <optgroup label='{{$group["name"]}}'>
                                        @foreach($group["users"] as $u)
                                            <option value="{{$u->u_id}}">{{$u->u_firstname}}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>


                    </div>


                </div>
                <div class="modal-footer">
                    <a href="/project" class="btn btn-secondary">Close</a>
                    <input type="submit" class="btn btn-primary" value="Search" />
                </div>

            </form>

        </div>
    </div>
</div>