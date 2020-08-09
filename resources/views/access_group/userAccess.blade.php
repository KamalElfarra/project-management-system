@extends('panel.control')
@section('conection')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="/userAccess" style="font-size: 20px">Access Group Management ></a></li>
        </ol>
    </nav>

    <br>
    <div class="card">

        <div class="card-header">
            User Access Groups
        </div>

        <div class="card-body">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col">Goup name </th>


        </tr>
        </thead>
        <tbody>
        @foreach($groups as $g)
            <tr>
                <th scope="row" >1</th>
                <td>
                    <a class="open_dialog" style="margin-left: 5px" href="/userAccess/edit/{{$g->g_id}}"><i style='font-size:15px' class='fas'>&#xf044;</i></a>
                </td>
                <td>{{$g->g_name}}</td>
            </tr>
        @endforeach


        </tbody>
    </table>

        </div>

    </div>

@endsection