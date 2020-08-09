 @extends("panel.control")
 @section("conection")


<div class="card">

      <div class="card-body">

            <form method="post">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="modal-body">


                    <div class="form-group row">
                        <label for="comment" class="col-3">comment:</label>
                        <textarea name="comment" class="col-8" id="comment" required>{{$comment->c_comment}}</textarea>
                    </div>


                    <div class="form-group row">

                        <label class="col-3" for="attachments">Attachments  : </label>
                        <input name="attachment" type="file" class="col-8 form-control-file" id="attachments" />
                    </div>


                </div>
                <div class="modal-footer">
                    <a href="/project" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <input type="submit" class="btn btn-primary" value="save"/>
                </div>

            </form>

      </div>
  </div>

     @endsection