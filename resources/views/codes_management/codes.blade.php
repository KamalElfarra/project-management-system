@extends('panel.control')
@section('conection')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item col-4"><a href="/codes" style="font-size: 20px">codes_management ></a></li>
        </ol>
    </nav>

    <br>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#" style="font-size: 22px">codes_management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">




            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <hr>
    <br>


    <div class="card">

        <div class="card-header">

            @include('codes_management.codes_m')
            @include('projects.delete-pro')

        </div>

        <div class="card-body">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Action</th>
                    <th scope="col">master</th>
                    <th scope="col">Name</th>
                    <th scope="col">description</th>
                    <th scope="col">class</th>
                    <th scope="col">active</th>

                </tr>
                </thead>
                <tbody>
                <?php $i =1;?>
                @foreach($codes as $code)

                    <tr>


                    <th scope="row" ><?= $i++?></th>
                    <td>
                        <a data-toggle="modal" data-target="#delete_codes_mana_modal" style="margin-right: 5px" href="#delete_user_modal"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                        <a data-toggle="modal" href="/codes/edit" style="margin-left: 5px" href="/"><i style='font-size:15px' class='fas'>&#xf044;</i></a>

                    </td>
                    <td>{{isset($code->master_data->cd_name)?$code->master_data->cd_name:"Master"}}</td>
                    <td>{{$code->cd_name}}</td>
                    <td>{{$code->cd_description}}</td>
                    <td>{{$code->cd_class}}</td>
                    <td><span class="label label-{{ ($code->cd_active==1)?"success" : "danger"}}">{{$code->cd_active}}</span></td>

                </tr>


                @endforeach

                </tbody>
            </table>

        </div>

    </div>


@endsection