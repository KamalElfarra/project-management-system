@extends('panel.control')

@section('conection')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="/project" style="font-size: 20px">project</a></li>
            <li class="breadcrumb-item "><a href="/discussion" style="font-size: 20px">discussion ></a></li>
        </ol>
    </nav>

    <br>



    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Action</th>
            <th scope="col">status</th>
            <th scope="col">Name</th>
            <th scope="col">description</th>
            <th scope="col">Date Added</th>
            <th scope="col">created by</th>

        </tr>
        </thead>


        <tbody>

        <?php $i=1?>
        @foreach($discussions as $dis)

            <tr>
            <th scope="row" ><?php echo $i++?></th>
            <td>
                <a class="delete_user {{$user_privileges->discussion->delete}}" data-toggle="modal" data-target="#delete_discussion_modal" style="margin-right: 5px" href="/discussion/delete/{{$dis->diss_id}}"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                <a style="margin-left: 5px" class="{{$user_privileges->discussion->edit}}" href="/discussion/edit/{{$dis->diss_id}}"><i style='font-size:15px' class='fas'>&#xf044;</i></a>
                <a style="margin-left: 7px" class="{{$user_privileges->discussion->view}}" href="/discussion/info/{{$dis->diss_id}}"><i style='font-size:15px' class='fas'>&#xf05a;</i></a>


            </td>


            <td>{{$dis->status->cd_name}}</td>
            <td>{{$dis->diss_name}}</td>
            <td>{{$dis->diss_description}}</td>
            <td>{{$dis->diss_creation_date}}</td>
            <td>{{$dis->created_by->u_firstname}}</td>


            </tr>

            @endforeach

        </tbody>
    </table>

        </div>

    </div>

@endsection