
<ul class="row">

<div class="form-group row col-2">
    <label for="priority" >Name:</label>
    <select name="priority"  id="priority">

        @foreach($name as $k=>$Na)

        <option value="{{$k}}">{{$Na}}</option>

            @endforeach

    </select>
</div>

<div class="form-group row col-3">
    <label for="priority" >Date:</label>
    <select name="priority" class="ml-1 mr-1"  id="priority">
        @foreach($date as $k=>$da)

            <option value="{{$k}}">{{$da}}</option>

        @endforeach

    </select>

        <select name="priority" class="mr-1" id="priority">

            @foreach($month as $k=>$mo)


            <option value="{{$k}}">{{$mo}}</option>

                @endforeach

        </select>
    </div>



</ul>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="post">

                <div class="modal-body">











                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">save</button>
                </div>


            </form>
        </div>
    </div>
</div>

</div>