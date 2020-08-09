<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Privileges: <span class="badge badge-success">{{$group->g_name}}</span> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="/userAccess/edit">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="group_id"  value="{{ $group->g_id }}" />
            <div class="modal-body">

            @foreach($pr_list as $ls)
                <div class="form-group row">

                        <h4  class="col-3 text text-capitalize">{{$ls["name"]}}</h4>
                        <div class="row col-12 ml-3 float-right">
                            @foreach($ls["group"] as $k=>$v)
                                <div class="row  col-3 text text-capitalize"><input type="checkbox" name="{{$k}}" {{$v["check"]}}> {{$v["name"]}}</div>
                            @endforeach
                        </div>
                </div>
                    <hr/>
            @endforeach


                    <br>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save"/>
            </div>
            </form>
        </div>
    </div>
</div>