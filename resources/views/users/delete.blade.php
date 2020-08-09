
    <div class="modal fade" id="delete_user_modal" tabindex="-1" role="dialog" aria-labelledby="delete_user_modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/user/delete" >
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->u_id }}" />
                <div class="modal-body">
                    <p>Are you sure you want to delete this?</p>
                    <table class="table-striped">
                        <tr>
                            <th><strong>First Name :</strong></th>
                            <td>{{$user->u_firstname}}</td>
                        </tr>
                        <tr>
                            <th><strong>last Name :</strong></th>
                            <td>{{$user->u_lastname}}</td>
                        </tr>
                        <tr>
                            <th><strong>Employee Number :</strong></th>
                            <td>{{$user->u_employeenum}}</td>
                        </tr>

                    </table>




                </div>
                <div class="modal-footer">
                    <a href="/user" class="btn btn-primary" >close</a>
                    <input type="submit" class="btn btn-primary" value="Delete"/>
                </div>
                </form>
            </div>
        </div>
    </div>

