@extends('panel.control')

@section('conection')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item "><a href="/discussion" style="font-size: 20px">Discussions ></a></li>
        </ol>
    </nav>

    <br>

    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            @include("discussions.all_table")
       </div>
    </div>
@endsection