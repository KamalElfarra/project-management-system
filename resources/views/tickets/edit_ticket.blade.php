@extends('panel.control')
@section("conection")

    <div class="card">

        <div class="card-body">

            <form method="post"  enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="modal-body">


                    <div class="form-group row">
                        <label  for="message-text" class="col-3">status:</label>
                        <select name="status" class="col-8" id="message-text">

                            @foreach($status as $st)

                                <option value="{{$st->cd_id}}">{{$st->cd_name}}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="message-text" class="col-3">type:</label>
                        <select name="type" class="col-8" id="status">

                            @foreach($type as $ty)

                                <option value="{{$ty->cd_id}}">{{$ty->cd_name}}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="recipient-name" class="col-3">subject:</label>
                        <input value="{{$ticket->tic_subject}}" name="subject" type="text" class="col-8" id="recipient-name" style="height: 35px">
                    </div>

                    <div class="form-group row">

                        <label class="col-3" for="attachments">Attachments  : </label>
                        <input  type="file" class="col-8 form-control-file" id="attachments" />
                    </div>


                    <div class="form-group row">
                        <label  for="comment" class="col-3">Description:</label>
                        <textarea name="description" class="col-8" id="comment"></textarea>
                    </div>




                    <div class="modal-footer">
                        <a href="/ticket" class="btn btn-secondary">Close</a>
                        <input type="submit" class="btn btn-primary" value="save" />
                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection