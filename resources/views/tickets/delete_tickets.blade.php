
<div class="modal fade" id="delete_user_modal" tabindex="-1" role="dialog" aria-labelledby="delete_user_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="/ticket/delete" >
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="ticket_id" id="ticket_id" value="{{ $ticket->tic_id }}" />

                <div class="modal-body">
                    <p>Are you sure you want to delete this?</p>
                    <table class="table-striped">

                        <tr>

                            <th>Name:</th>
                            <td>{{$ticket->tic_subject}}</td>


                        </tr>

                        <tr>

                            <th>status:</th>
                            <td>{{$ticket->status->cd_name}}</td>


                        </tr>



                    </table>

                </div>
                <div class="modal-footer">
                    <a href="/ticket" class="btn btn-secondary">Close</a>
                    <input type="submit" class="btn btn-primary" value="Delete"/>
                </div>
            </form>
        </div>
    </div>
</div>

