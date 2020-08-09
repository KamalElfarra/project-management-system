@extends('panel.control')
@section('conection')

<nav aria-label="breadcrumb" >
    <ol class="breadcrumb" style="background-color:whitesmoke ">
        <li class="breadcrumb-item" style="font-size: 20px"><a href="/user">user</a></li>
        <li class="breadcrumb-item"><a href="/info" style="font-size: 20px">info</a></li>
    </ol>
</nav>

<hr/>
<div class="row">
    <div class="col-7 m-auto">

    </div>
    <div class="card col-4 ">
        <div class="card-body">
            <div class="panel panel-info item-details">
                <div class="panel-body item-details">

                    <div class="heading"><h4 class="media-heading">Info</h4></div>
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover table-item-details">

                            <tbody><tr class="form-group-2">
                                    <th>ID</th>
                                    <td>{{$user->u_id}}</td>
                                </tr>

                                <tr class="form-group-3">
                                    <th>first name	</th>
                                    <td>{{$user->u_firstname}}</td>
                                </tr>

                                <tr class="form-group-4">
                                    <th>last name</th>
                                    <td>{{$user->u_lastname}}</td>

                                </tr>


                                <tr class="form-group-201">
                                    <th>Access group
                                    </th>
                                    <td>{{$user->group->g_name}}	</td>
                                </tr>

                                <tr class="form-group-6">
                                    <th>user email
                                    </th>
                                    <td>{{$user->u_email}}	</td>
                                </tr>

                                <tr class="form-group-6">
                                    <th>user status

                                    </th>
                                    <td><span class="label {{$user->status->cd_css_class}}">{{$user->status->cd_name}}</span></td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection