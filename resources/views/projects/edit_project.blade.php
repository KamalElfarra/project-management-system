@extends('panel.control')
@section('conection')
    <div class="card">
        <div class="card-header">


        </div>
        <div class="card-body">
            <form method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="modal-body">
                    <div class="simple-card">
                        <ul class="nav nav-tabs" id="myTab5" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active border-left-0" id="project-tab-info" data-toggle="tab" href="#project-info" role="tab" aria-controls="home" aria-selected="false">Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  show" id="project-tab-team" data-toggle="tab" href="#project-team" role="tab" aria-controls="profile" aria-selected="true">Team</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane active fade show" id="project-info" role="tabpanel" aria-labelledby="home-tab-simple">
                                <div class="form-group row">
                                    <label for="priority" class="col-3">priority:</label>
                                    <select name="priority" class="col-8" id="priority">
                                        @foreach($priority as $pr)
                                            <option value="{{$pr->cd_id}}">{{$pr->cd_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="message-text" class="col-3">status:</label>
                                    <select name="status" class="col-8" id="status">
                                        @foreach($status as $st)
                                            <option value="{{$st->cd_id}}">{{$st->cd_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="recipient-name" class="col-3">Name:</label>
                                    <input value="{{$project->p_name}}" name="name" type="text" class="col-8" id="recipient-name" placeholder="Enter your name">
                                </div>
                                <div class="form-group row">
                                    <label for="date_picker" class="col-3">Date time:</label>
                                    <input value="{{$project->p_start_date}}" name="date" type="text" class="form-control datetimepicker-input col-8" id="datetimepicker5" data-toggle="datetimepicker" data-target="#datetimepicker5">
                                </div>
                                <div class="form-group row">
                                    <label  for="comment" class="col-3">Description:</label>
                                    <textarea name="description" class="col-8" id="comment">{{$project->p_description}}</textarea>
                                </div>
                            </div>
                            <div  class="tab-pane fade  show" id="project-team" role="tabpanel" aria-labelledby="profile-tab-simple">
                                <select required name="project_team[]" id="optgroup" multiple="multiple" style="position: absolute; left: -9999px;">
                                    @foreach($user_groups as $group)
                                        <optgroup label='{{$group["name"]}}'>
                                            @foreach($group["users"] as $u)
                                                <option {{$u->selected}} value="{{$u->u_id}}">{{$u->u_firstname}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/project" class="btn btn-secondary">Close</a>
                    <input type="submit" class="btn btn-primary" value="save" />
                </div>

            </form>

        </div>
    </div>




    @endsection