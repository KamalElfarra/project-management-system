@extends('panel.control')

@section('conection')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item "><a href="/task" style="font-size: 20px">Tasks ></a></li>
        </ol>
    </nav>

    <br>

    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
             @include("tasks.all_table")
        </div>
    </div>

@endsection
