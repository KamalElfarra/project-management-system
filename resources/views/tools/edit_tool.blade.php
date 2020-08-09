@extends("panel.control")
@section("conection")

    <div class="card">

        <div class="card-body">

               <form method="post"  enctype="multipart/form-data">

                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="type" class="col-3">type:</label>
                            <select name="type" class="col-8" id="type">

                                @foreach($type as $ty)

                                    <option value="{{$ty->cd_id}}">{{$ty->cd_name}}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="priority" class="col-3">Users Groups:</label>
                            <select name="user_group" class="col-8" id="priority">

                                @foreach($Groups as $Gr)

                                    <option value="{{$Gr->g_id}}">{{$Gr->g_name}}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="Assigned_to" class="col-3">Assigned To:</label>
                            <select name="Assigned_to" class="col-8" id="Assigned_to">

                                @foreach($Assign as $as)

                                    <option value="{{$as->u_id}}">{{$as->u_firstname}}</option>


                                @endforeach

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="recipient-name" class="col-3">title:</label>
                            <input value="{{$user_alert->too_title}}" name="title" type="text" class="col-8" id="recipient-name" style="height: 35px">
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-3">Description:</label>
                            <textarea name="description" class="col-8" id="comment"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <a href="button" class="btn btn-secondary">Close</a>
                        <input type="submit" class="btn btn-primary" value="save"/>
                    </div>
                </form>

        </div>
    </div>

@endsection