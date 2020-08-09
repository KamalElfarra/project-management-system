@extends('panel.control')
@section('conection')

    <div class="card">
        <div class="card-header">


        </div>
        <div class="card-body">

            <form method="post"  enctype="multipart/form-data">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="first_name" class="col-3">firstname:</label>
                        <input value="{{$user->u_firstname}}" name="first_name" required type="text" class="col-8" id="first_name" placeholder="Enter firstname">
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-3">lastname:</label>
                        <input value="{{$user->u_lastname}}" name="last_name" required type="text" class="col-8" id="last_name" placeholder="Enter lastname">
                    </div>


                    <div class="form-group row">
                        <label for="employee_num" class="col-3">Emp. Number: </label>
                        <input value="{{$user->u_employeenum}}" name="employee_num"   type="text" class="col-8" id="employee_num" aria-describedby="text" >
                    </div>


                    <div class="form-group row">
                        <label for="password " class="col-3">Password:
                            <small class="text-danger">Not Changed. leave it empty</small>
                        </label>
                        <input name="password"  type="password" class="col-8" id="password" placeholder="Password">
                    </div>
                    <div class="form-group row">
                        <label for="re_password" class="col-3">re-Password:</label>
                        <input name="re_password"  type="password" class="col-8" id="re_password" placeholder="Re-Password">
                    </div>

                    <div class="form-group row">
                        <label for="language" class="col-3">Language:</label>
                        <select name="language_sel" class="col-8" id="language">
                            @foreach($language as $v)
                            <option value="{{$v->cd_id}}" {{$v->selected}}>{{$v->cd_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="status_select" class="col-3">status:</label>
                        <select name="status_sel" class="col-8" id="status_select">
                            @foreach($status as $st)
                            <option value="{{$st->cd_id}}" {{$st->selected}}>{{$st->cd_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="access_group_sel" class="col-3">Access group:</label>
                        <select name="access_group_sel" class="col-8" id="access_group_sel">
                            @foreach($groups as $ac)
                                <option {{$ac->selected}} value="{{$ac->g_id}}" >{{$ac->g_name}}</option>

                            @endforeach

                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-3">your Email: </label>
                        <input value="{{$user->u_email}}" name="email" required  type="email" class="col-8" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-3">phone: </label>
                        <input value="{{$user->u_phone}}" name="phone"   type="text" class="col-8" id="phone" aria-describedby="text" >
                    </div>
                    <div class="form-group row">
                        <label for="user_photo" class="col-3">photo</label>
                        <input name="user_photo" type="file" class="col-8" id="user_photo" accept="image/*" />
                    </div>




                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-secondary" value="Save" />
                    <a href="/user" class="btn btn-primary" >close</a>
                </div>
            </form>
        </div>
    </div>

    @endsection
