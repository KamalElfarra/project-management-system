
<div class="modal fade" id="delete_user_modal" tabindex="-1" role="dialog" aria-labelledby="delete_user_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/user_alert/delete" >

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="user_alert" id="user_alert" value="{{ $user_alert->too_id }}" />

                <div class="modal-body">

                    <p>Are you sure you want to delete this?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Delete"/>
                </div>
            </form>
        </div>
    </div>
</div>

