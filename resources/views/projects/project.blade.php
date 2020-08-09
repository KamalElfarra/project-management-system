@extends('panel.control')
@section('conection')


<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color:whitesmoke ">
        <li class="breadcrumb-item col-4"><a href="/project" style="font-size: 20px">Projects ></a></li>
    </ol>
</nav>

<br>


<div class="card">
    <div class="card-header">
        @include('projects/project_m')
    </div>

    <div class="card-body">
        @include("projects.project_table")

    </div>

</div>


@endsection