
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#attachmentModal" data-whatever="@getbootstrap">Add Attachment</button>

<div class="modal fade" id="attachmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="/attachment/add" enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="entity_type" value="{{$entity_type}}"/>
                <input type="hidden" name="entity_id" value="{{$entity_id}}"/>

                <div class="modal-body">
                    <div class="simple-card">
                        <p>info of attachment</p>

                        <div class="form-group row">
                            <label for="recipient-name" class="col-3">Name:</label>
                            <input name="Name" type="text" class="col-8" id="recipient-name" placeholder="Enter the name">
                        </div>

                        <div class="form-group row">

                            <label class="col-3" for="attachments">Attachments  : </label>
                            <input name="attachment" type="file" class="col-8 form-control-file" id="attachments" />
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
</div>