@extends('panel.control')
@section('conection')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item col-4"><a href="/user" style="font-size: 20px">user ></a></li>
        </ol>
    </nav>

    <br>


    <div class="card">
        <div class="card-header">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add user</button>

    @include("users.add_user")
    @include("users.upload")



        </div>
   <div class="card-body">

    <table class="table table-striped table-hover data_table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col">first name</th>
            <th scope="col">last name</th>
            <th scope="col">Access group</th>
            <th scope="col">user email</th>
            <th scope="col">user status</th>
            <th scope="col">user photo</th>

        </tr>
        </thead>
        <tbody>

        <?php $i =1;?>
        @foreach($users as $user)
        <tr>
            <th scope="row"><?php echo $i++;?></th>
            <td>
                <a class="open_dialog " data-toggle="modal" href="/user/delete/{{$user->u_id}}"  data-target="#delete_project_modal"><i class="fas fa-trash-alt"></i></a>
                <a style="margin-left: 5px"  title="Edit user" href="/user/edit/{{$user->u_id}}"><i class="fas fa-edit"></i></a>
                <a style="margin-left: 5px"  title="info user" href="/user/info/{{$user->u_id}}"><i class="fas fa-info-circle"></i></a>


            </td>
            <td>{{$user->u_firstname}}</td>
            <td>{{$user->u_lastname}}</td>
            <td>{{$user->group->g_name}}</td>
            <td>{{$user->u_email}}</td>
            <td><span class="label {{$user->status->cd_css_class}}">{{$user->status->cd_name}}</span></td>
            <td><img class="img rounded-circle img-responsive" width="40" height="40" src="{{$user->image->f_path}}/{{$user->image->f_name}}" /></td>


        </tr>
        @endforeach
        </tbody>
    </table>
   </div>

    </div>
@endsection