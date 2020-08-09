@extends('panel.control')
@section('conection')


    <div class="card">
        <div class="card-header">
            <h3>Projects</h3>
        </div>
        <div class="card-body">
            @include("projects.project_table")

        </div>
    </div>


    <div class="card {{$user_privileges->tickets->nav}}">
        <div class="card-header">
            <h3>Tickets</h3>
        </div>
        <div class="card-body">
            @include("tickets.all_table")
        </div>
    </div>



    <div class="card {{$user_privileges->tasks->nav}}">
        <div class="card-header">
            <h3>Tasks</h3>
        </div>
        <div class="card-body">
            @include("tasks.all_table")
        </div>
    </div>




    <div class="card {{$user_privileges->discussion->nav}}">
        <div class="card-header">
            <h3>Discussions</h3>
        </div>
        <div class="card-body">
            @include("discussions.all_table")
        </div>
    </div>

@endsection