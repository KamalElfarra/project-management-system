<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Action</th>
        <th scope="col">priority</th>
        <th scope="col">name</th>
        <th scope="col">description</th>
        <th scope="col">status</th>
        <th scope="col">start date</th>
        <th scope="col">created by</th>

    </tr>
    </thead>
    <tbody>
    <?php $i = 1 ?>
    @foreach($project as $pro)

        <tr>
            <th scope="row" ><?php echo $i++ ?></th>
            <td>
                <a class="open_dialog {{$pro->closed}} {{$user_privileges->project->delete}}" data-toggle="modal"  data-target="#delete_project_modal"  style ="margin-right: 5px" title="Delete Project" href="/project/delete/{{$pro->p_id}}">
                    <i style='font-size:15px' class='fas'>&#xf2ed;</i>
                   </a>

                <a style="margin-left: 5px" class="{{$pro->closed}} {{$user_privileges->project->edit}}" title="Edit Project" href="/project/edit/{{$pro->p_id}}"><i style='font-size:15px' class='fas'>&#xf044;</i></a>

                <a style="margin-left: 5px" title="Project Info" href="/project/info/{{$pro->p_id}}"><i style='font-size:15px' class='fas'>&#xf05a;</i></a>


            </td>
            <td> <i class="badge {{$pro->priority->cd_css_class}}">{{$pro->priority->cd_name}}</i></td>
            <td>{{$pro->p_name}}</td>
            <td>{{$pro->p_description}}</td>
            <td><i class="badge {{$pro->status->cd_css_class}}">{{$pro->status->cd_name}}</i></td>
            <td>{{$pro->p_start_date}}</td>
            <td>{{$pro->created_by->u_firstname}}</td>

        </tr>
    @endforeach

    </tbody>
</table>