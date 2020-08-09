
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Action</th>
            <th scope="col">priority</th>
            <th scope="col">type</th>
            <th scope="col">Name</th>
            <th scope="col">status</th>
            <th scope="col">description</th>
            <th scope="col">Assigned to</th>
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
                <a class="open_dialog {{$task->closed}} {{$user_privileges->tasks->delete}}" data-toggle="modal"  data-target="#delete_project_modal"></a>
                <a style="margin-left: 5px" class="{{$task->closed}} {{$user_privileges->tasks->edit}}" title="Edit task" href="/task/edit/{{$task->ta_id}}"><i style='font-size:15px' class='fas'>&#xf044;</i></a>
                <a style="margin-left: 2px" class="{{$user_privileges->tasks->view}}" href="/task/info/{{$task->ta_id}}"><i style='font-size:15px' class='fas'>&#xf05a;</i></a>


            </td>
            <td><span class="label label-danger">{{$task->priority->cd_name}}</span></td>
            <td>{{$task->type->cd_name}}</td>
            <td>{{$task->ta_name}}</td>
            <td ><span class="badge {{$task->status->cd_css_class}}"> {{$task->status->cd_name}}</span></td>
            <td>{{$task->ta_description}}</td>
            <td>{{$task->assign_to->u_firstname}}</td>
            <td>{{$task->ta_start_date}}</td>
            <td>{{$task->ta_end_date}}</td>
            <td>{{$task->ta_creation_date}}</td>
            <td>{{$task->created_by->u_firstname}}</td>
        </tr>
        @endforeach


    </tbody>
</table>