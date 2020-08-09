
<div class="card">

    <div class="card-header">

    @include("tickets.ticket_m")


    </div>

    <div class="card-body">

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Action</th>
                <th scope="col">Type</th>
                <th scope="col">Name</th>
                <th scope="col">status</th>
                <th scope="col">Description</th>
                <th scope="col">date added</th>
                <th scope="col">created by</th>

            </tr>
            </thead>
            <tbody>


            <?php $i = 1 ?>
            @foreach($tickets as $tic)


                <tr>
                    <th scope="row" ><?php echo $i++ ?></th>
                    <td>
                        <a class="delete_user {{$tic->delete}} {{$closed_comment}} {{$tic->closed}}" data-toggle="modal" data-target="#delete_ticket_modal" style="margin-right: 5px" href="/ticket/delete/{{$tic->tic_id}}"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                        <a class="{{$tic->edit}} {{$closed_comment}} {{$tic->closed}}" style="margin-left: 5px" href="/ticket/edit/{{$tic->tic_id}}"><i style='font-size:15px' class='fas'>&#xf044;</i></a>
                        <a  style="margin-left: 7px" href="/ticket/info/{{$tic->tic_id}}"><i style='font-size:15px' class='fas'>&#xf05a;</i></a>
                    </td>
                    <td>{{$tic->type->cd_name}}</td>
                    <td>{{$tic->tic_subject}}</td>
                    <td> <span class="badge {{$tic->status->cd_css_class}}">{{$tic->status->cd_name}}</span></td>
                    <td>{{$tic->tic_description}}</td>

                    <td>{{$tic->tic_creation_date}}</td>
                    <td>{{$tic->created_by->u_firstname}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</div>

