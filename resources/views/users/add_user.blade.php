
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/user/add" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <div class="modal-body">

                        <div class="form-group row">
                            <label for="first_name" class="col-3">firstname:</label>
                            <input  name="first_name" required type="text" class="col-8" id="first_name" placeholder="Enter firstname">
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-3">lastname:</label>
                            <input name="last_name" required type="text" class="col-8" id="last_name" placeholder="Enter lastname">
                        </div>


                        <div class="form-group row">
                            <label for="employee_num" class="col-3">Emp. Number: </label>
                            <input name="employee_num"   type="text" class="col-8" id="employee_num" aria-describedby="text" >
                        </div>


                        <div class="form-group row">
                            <label for="password " class="col-3">Password:</label>
                            <input name="password" required type="password" class="col-8" id="password" placeholder="Password">
                        </div>
                        <div class="form-group row">
                            <label for="re_password" class="col-3">re-Password:</label>
                            <input name="re_password" required type="password" class="col-8" id="re_password" placeholder="Re-Password">
                        </div>

                        <div class="form-group row">
                            <label for="language" class="col-3">Language:</label>
                            <select name="language_sel" class="col-8" id="language">
                                @foreach($language as $v)
                                    <option value="{{$v->cd_id}}">{{$v->cd_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="status_select" class="col-3">status:</label>
                            <select name="status_sel" class="col-8" id="status_select">
                                @foreach($status as $st)
                                    <option value="{{$st->cd_id}}">{{$st->cd_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="access_group_sel" class="col-3">Access group:</label>
                            <select name="access_group_sel" class="col-8" id="access_group_sel">
                                @foreach($groups as $ac)
                                <option value="{{$ac->g_id}}">{{$ac->g_name}}</option>

                                    @endforeach

                            </select>
                        </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail1" class="col-3">your Email: </label>
                        <input name="email" required  type="email" class="col-8" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-3">phone: </label>
                        <input name="phone"   type="text" class="col-8" id="phone" aria-describedby="text" >
                    </div>
                        <div class="form-group row">
                            <label for="user_photo" class="col-3">photo</label>
                            <input name="user_photo" required type="file" class="col-8" id="user_photo" accept="image/*" />
                        </div>




                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-secondary" value="Save" />
                    <a href="/user" class="btn btn-primary" >close</a>
                </div>
            </form>
        </div>
    </div>
</div>
