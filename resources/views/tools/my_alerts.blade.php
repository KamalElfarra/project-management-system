@extends('panel.control')
@section('conection')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="/Tools" style="font-size: 20px">Tools ></a></li>
        </ol>
    </nav>

    <hr>

    <div class="card">

        <div class="card-header">

        <div class="card-body">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Action</th>
            <th scope="col">type</th>
            <th scope="col">title</th>
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
                <a class="open_dialog" style="margin-left: 5px" href="/user_alert/info/{{$tool->too_id}}">View</a>

            </td>
            <td><span class="label {{$tool->type->cd_css_class}}">{{$tool->type->cd_name}}</span></td>
            <td>{{$tool->too_title}}</td>
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