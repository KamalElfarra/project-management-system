@extends('panel.control')
@section('conection')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="/Tools" style="font-size: 20px">Tools ></a></li>
        </ol>
    </nav>


    @include('tools.tool_m')

    <hr>

    <div class="card">

        <div class="card-header">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add </button>



        <div class="card-body">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col">Type</th>
            <th scope="col">Title</th>
            <th scope="col">description</th>
            <th scope="col">Assigned To	</th>
            <th scope="col">Alert Date</th>
            <th scope="col">Created By</th>


        </tr>
        </thead>
        <tbody>

        <?php $i=1?>
        @foreach($tools as $tool)

        <tr>
            <th scope="row" ><?php echo $i++ ?></th>
            <td>
                <a class="delete_user"  data-toggle="modal" data-target="#delete_tool_modal" style="margin-right: 5px" href="/user_alert/delete/{{$tool->too_id}}"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                <a style="margin-left: 5px" href="/user_alert/edit/{{$tool->too_id}}"><i style='font-size:15px' class='fas'>&#xf044;</i></a>
            </td>
            <td><span class="label {{$tool->type->cd_css_class}}">{{$tool->type->cd_name}}</span></td>
            <td>{{$tool->too_title}}</td>
            <td>{{$tool->too_description}}</td>
            <td>{{$tool->Assign->username()}}</td>
            <td>{{$tool->too_creation_date}}</td>
            <td>{{$tool->created_by->u_firstname}}</td>

        </tr>

            @endforeach

        </tbody>

    </table>

        </div>
    </div>

    </div>
@endsection