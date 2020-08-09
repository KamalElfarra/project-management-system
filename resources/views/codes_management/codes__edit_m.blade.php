
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <form method="post" action="/codes/add" >

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="modal-body">


                    <div class="simple-card">

                        <div class="tab-content" id="myTabContent5">
                            <div class="tab-pane active fade show" id="project-info" role="tabpanel" aria-labelledby="home-tab-simple">

                                <div class="form-group row">
                                    <label for="priority" class="col-3">master:</label>
                                    <select name="master" class="col-8" id="priority">

                                        @foreach($master as$ms)

                                        <option value="{{$ms->cd_id}}">{{$ms->cd_name}}</option>

                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-3">Name:</label>
                                    <input name="name" class="col-8" id="name">


                                </div>


                                <div class="form-group row">
                                    <label for="comment" class="col-3">Description:</label>
                                    <textarea name="description" class="col-8" id="comment"></textarea>
                                </div>

                                <br>

                                <div class="col-5" style="font-size: 15px">

                                    is active?:<input type="checkbox" name="active" value="1" class="col-6" ><br>

                                </div>

                                <br>

                                <div class="form-group row">
                                    <label for="name" class="col-3">css classes:</label>
                                    <input name="css_classes" class="col-8" id="name">


                                </div>

                            </div>


                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="save" />
                </div>

            </form>

        </div>
    </div>
</div>