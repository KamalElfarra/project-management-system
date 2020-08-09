

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Action</th>
                <th scope="col">priority</th>
                <th scope="col">type</th>
                <th scope="col">Name</th>
                <th scope="col">status</th>
                <th scope="col">Project</th>
                <th scope="col">Start date</th>
                <th scope="col">End date</th>
                <th scope="col">date added</th>
                <th scope="col">created by</th>

            </tr>
            </thead>
            <tbody>

            <?php $i = 1 ?>
            @foreach($tasks as $task)

                <tr>
                    <th scope="row" ><?php echo $i++ ?></th>
                    <td>
                        <a class="delete_user {{$task->closed}} {{$user_privileges->tasks->delete}}" data-toggle="modal" data-target="#delete_task_modal" style="margin-right: 2px" href="/task/delete/{{$task->ta_id}}"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                        <a style="margin-left: 2px" class="{{$task->closed}} {{$user_privileges->tasks->edit}}" href="/task/edit/{{$task->ta_id}}"><i style='font-size:15px' class='fas'>&#xf044;</i></a>
                        <a style="margin-left: 2px" class="{{$user_privileges->tasks->view}}" href="/task/info/{{$task->ta_id}}"><i style='font-size:15px' class='fas'>&#xf05a;</i></a>


                    </td>
                    <td><span class="label label-danger">{{$task->priority->cd_name}}</span></td>
                    <td>{{$task->type->cd_name}}</td>
                    <td>{{$task->ta_name}}</td>
                    <td ><span class="badge {{$task->status->cd_css_class}}"> {{$task->status->cd_name}}</span></td>
                    <td><a href="/project/info/{{$task->ta_project_id}}">{{$task->project->p_name}}</a></td>
                    <td>{{$task->ta_start_date}}</td>
                    <td>{{$task->ta_end_date}}</td>
                    <td>{{$task->ta_creation_date}}</td>
                    <td>{{$task->created_by->u_firstname}}</td>
                </tr>
            @endforeach


            </tbody>
        </table>
