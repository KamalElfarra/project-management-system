
<div class="modal fade" id="delete_project_modal" tabindex="-1" role="dialog" aria-labelledby="delete_user_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="/comments/reply/delete" >

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="reply_id" id="reply_id" value="{{ $comment->cr_id }}" />

                <div class="modal-body">
                    <p>Are you sure you want to delete this?</p>

                    <table class="table-striped">

                        <tr>
                        <th>Reply:</th>
                        <td>{{$comment->cr_reply}}</td>

                        </tr>


                    </table>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="delete"/>
                </div>

            </form>
        </div>
    </div>
</div>

