
<div class="modal fade" id="delete_project_modal" tabindex="-1" role="dialog" aria-labelledby="delete_user_modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" action="/project/delete" >

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                <input type="hidden" name="project_id" id="project_id" value="{{ $project->p_id }}" />

            <div class="modal-body">
                <p>Are you sure you want to delete this?</p>
                <table class="table-striped">

                    <tr>

                        <th>Name:</th>
                        <td>{{$project->p_name}}</td>


                    </tr>

                    <tr>

                        <th>priority:</th>
                        <td>{{$project->priority->cd_name}}</td>

                    </tr>



                </table>

            </div>
            <div class="modal-footer">
                <a href="/project" class="btn btn-secondary">Close</a>
                <input type="submit" class="btn btn-primary" value="delete"/>
            </div>

            </form>
        </div>
    </div>
</div>

