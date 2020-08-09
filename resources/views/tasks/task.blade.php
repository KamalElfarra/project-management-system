@extends('panel.control')

@section('conection')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color:whitesmoke ">
        <li class="breadcrumb-item"><a href="/project" style="font-size: 20px">project</a></li>
        <li class="breadcrumb-item "><a href="/task" style="font-size: 20px">task ></a></li>
    </ol>
</nav>

<br>

<div class="card">

    <div class="card-header">
        @include('tasks.task_m')
    </div>

    <div class="card-body">
        @include('tasks.tasks_table')
    </div>

</div>

@endsection