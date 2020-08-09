@extends('panel.control')
@section('conection')

    <div class="card">
        <div class="card-header">


        </div>
        <div class="card-body">

            <form method="post"  enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="user_id"  value="{{ $user->u_id }}" />

                <div class="modal-body">

                    <div class="form-group row">
                        <label for="first_name" class="col-3">password:</label>
                        <input name="password" required type="password" class="col-8" id="password" placeholder="password">
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-3">new password:</label>
                        <input  name="new_password" required type="password" class="col-8" id="new_password" placeholder="new password">
                    </div>


                    <div class="form-group row">
                        <label for="employee_num" class="col-3">re_password: </label>
                        <input  name="re_password"   type="password" class="col-8" id="re_password" aria-describedby="text" >
                    </div>


                <div class="modal-footer">
                    <input type="submit" class="btn btn-secondary" value="Save" />
                    <a href="/user" class="btn btn-primary" >close</a>
                </div>
                </div>
            </form>
        </div>
    </div>


@endsection
