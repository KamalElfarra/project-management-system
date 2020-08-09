
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Action</th>
                <th scope="col">status</th>
                <th scope="col">Name</th>
                <th scope="col">description</th>
                <th scope="col">Project</th>
                <th scope="col">Date Added</th>
                <th scope="col">created by</th>

            </tr>
            </thead>
            <tbody>


            <?php $i = 1 ?>
            @foreach($discussions as $dis)

            <tr>
                <th scope="row" ><?php echo $i++ ?></th>
                <td>
                    <a class="delete_user {{$dis->closed}} {{$user_privileges->discussion->delete}}" data-toggle="modal" data-target="#delete_discussion_modal" style="margin-right: 5px" href="/discussion/delete/{{$dis->diss_id}}"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                    <a class="{{$dis->closed}} {{$user_privileges->discussion->edit}}" style="margin-left: 5px" href="/discussion/edit/{{$dis->diss_id}}"><i style='font-size:15px' class='fas'>&#xf044;</i></a>
                    <a style="margin-left: 7px" href="/discussion/info/{{$dis->diss_id}}"><i style='font-size:15px' class='fas'>&#xf05a;</i></a>
                </td>

                <td><span class="badge {{$dis->status->cd_css_class}}">{{$dis->status->cd_name}}</span></td>
                <td>{{$dis->diss_name}}</td>
                <td>{{$dis->diss_description}}</td>
                <td><a href="/project/info/{{$dis->diss_project_id}}">{{$dis->project->p_name}}</a></td>
                <td>{{$dis->diss_creation_date}}</td>
                <td>{{$dis->created_by->u_firstname}}</td>


            </tr>

            @endforeach


            </tbody>
        </table>
