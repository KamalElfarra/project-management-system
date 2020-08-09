@extends("panel.control")
@section("conection")

    <div class="card">

        <div class="card-body">

            <form method="post"  enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="modal-body">

                    <div class="form-group row">
                        <label for="status" class="col-3">status:</label>
                        <select name="status" class="col-8" id="status">

                            @foreach($status as $st)

                                <option value="{{$st->cd_id}}">{{$st->cd_name}}</option>

                            @endforeach

                        </select>
                    </div>


                    <div class="form-group row">
                        <label for="recipient-name" class="col-3">Name:</label>
                        <input value="{{$discussion->diss_name}}" name="Name" type="text" class="col-8" id="recipient-name" placeholder="Enter the name">
                    </div>


                    <div class="form-group row">
                        <label for="comment" class="col-3">Description:</label>
                        <textarea  name="description" class="col-8" id="comment" ></textarea>
                    </div>

                    <div class="form-group row">

                        <label class="col-3" for="attachments">Attachments  : </label>
                        <input  type="file" class="col-8 form-control-file" id="attachments" />
                    </div>


                </div>
                <div class="modal-footer">
                    <a href="/discussion" class="btn btn-secondary">Close</a>
                    <input type="submit" class="btn btn-primary" value="save"/>
                </div>
            </form>

        </div>

    </div>

@endsection