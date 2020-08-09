@extends('panel.control')
@section('conection')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="/report" style="font-size: 20px">report ></a></li>
        </ol>
    </nav>

    <br>



<div class="card">
    <div class="card-header">

        @include('reports.report_m')

    </div>
    <div class="card-body">
    <table id="report_table" class="table table-striped table-hover display">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">priority</th>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">status</th>
            <th scope="col">start date</th>
            <th scope="col">created by</th>

            <th scope="col">Discussions #</th>
            <th scope="col">Tasks #</th>
            <th scope="col">Tickets #</th>
            <th scope="col">Team #</th>


        </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        @foreach($projects as $pro)

            <tr>
                <th scope="row" ><?php echo $i++ ?></th>
                <td> <i class="badge {{$pro->priority->cd_css_class}}">{{$pro->priority->cd_name}}</i></td>
                <td>{{$pro->p_name}}</td>
                <td>{{$pro->p_description}}</td>
                <td><i class="badge {{$pro->status->cd_css_class}}">{{$pro->status->cd_name}}</i></td>
                <td>{{$pro->p_start_date}}</td>
                <td>{{$pro->created_by->u_firstname}}</td>

                <td class="text text-center">{{$pro->discussions_count}}</td>
                <td class="text text-center">{{$pro->tasks_count}}</td>
                <td class="text text-center">{{$pro->tickets_count}}</td>
                <td class="text text-center">{{$pro->team_member_count}}</td>

            </tr>
        @endforeach

        </tbody>
    </table>
    </div>
</div>


@endsection