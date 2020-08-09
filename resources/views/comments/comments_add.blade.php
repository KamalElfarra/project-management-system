

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">comment info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="post" action="/comments/add" enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="entity_type" value="{{$entity_type}}"/>
                <input type="hidden" name="entity_id" value="{{$entity_id}}"/>

                <div class="modal-body">

                    <div class="form-group row">
                        <label for="comment" class="col-3">comment:</label>
                        <textarea name="comment" class="col-8" id="comment"></textarea>
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

