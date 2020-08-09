@extends('panel.control')
@section('conection')

<style>
    .simple-outline-card .nav.nav-tabs .nav-item .nav-link{
        padding: 7px 20px;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color:whitesmoke ">
        <li class="breadcrumb-item"><a href="/project" style="font-size: 20px">Projects</a></li>
        <li class="breadcrumb-item"style="font-size: 20px">{{$project->p_name}}</li>
    </ol>
</nav>


<div class="simple-outline-card" style="background-color: white; margin-top: 5px;">
    <ul class="nav nav-tabs" id="myTab6" role="tablist" >
        <li class="nav-item"  >
            <a class="nav-link border-left-0 active show" id="project-tab-info" data-toggle="tab" href="#project_info" role="tab" aria-controls="home" aria-selected="true">Project Info</a>
        </li>
        <li class="nav-item {{$user_privileges->tasks->nav}}" >
            <a class="nav-link " id="Task_info_tab" data-toggle="tab" href="#Task_info" role="tab" aria-controls="profile" aria-selected="false">Tasks</a>
        </li>
        <li class="nav-item {{$user_privileges->tickets->nav}}">
            <a class="nav-link" id="ticket_tab_info" data-toggle="tab" href="#ticket_info" role="tab" aria-controls="contact" aria-selected="false">Tickets</a>
        </li>
        <li class="nav-item {{$user_privileges->discussion->nav}}">
            <a class="nav-link" id="discussion_tab_info" data-toggle="tab" href="#discussion_info" role="tab" aria-controls="contact" aria-selected="true" >Discussions</a>
        </li>
    </ul>
</div>


<div class="tab-content mt-3" id="myTabContent6">

    <div class="tab-pane fade active show" id="project_info" role="tabpanel" aria-labelledby="project-tab-info">

        <div class="row mt-4 ">
            <div class="col-md-6 pl-3 " style="margin-right: 5px;">

                @include("comments.comments_module")

            </div>
            <div class=" col-md-4  push-2">


                <ul class="nav nav-pills nav-justified" role="tablist" style="background-color: white;">
                    <li class="nav-item">
                        <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#references" role="tab" data-toggle="tab">Attachments</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active" id="profile">
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="panel panel-info item-details ">
                                    <div class="panel-body item-details">

                                        <div class="heading">
                                            <h4 class="media-heading">Info</h4></div>
                                        <div class="table-scrollable">
                                            <table class="table table-bordered table-hover table-item-details">

                                                <tbody><tr class="form-group-2">
                                                        <th>ID</th>
                                                        <td>{{$project->p_id}}</td>
                                                    </tr>

                                                    <tr class="form-group-3">
                                                        <th>priority</th>
                                                        <td>{{$project->priority->cd_name}}	</td>
                                                    </tr>

                                                    <tr class="form-group-4">
                                                        <th> name	</th>
                                                        <td>{{$project->p_name}}
                                                        </td>
                                                    </tr>


                                                    <tr class="form-group-201">
                                                        <th>status</th>
                                                        <td>{{$project->status->cd_name}}</td>
                                                    </tr>

                                                    <tr class="form-group-6">
                                                        <th>start date</th>
                                                        <td>{{$project->p_creation_data}}</td>
                                                    </tr>

                                                    <tr class="form-group-6">
                                                        <th>date added</th>
                                                        <td>{{$project->p_creation_data}}</td>
                                                    </tr>
                                                    <tr class="form-group-6">
                                                        <th> created by  </th>
                                                        <td>{{$project->created_by->u_firstname}}</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="buzz">
                       
                        <div class="card">
                            <div class="card-body">
                                <div class="panel panel-info item-details">
                                    <div class="panel-body item-details">

                                        <div class="heading">
                                            <h4 class="media-heading">Team</h4></div>
                                        <div class="table-scrollable">
                                            <table class="table table-bordered table-hover table-item-details">

                                                <tbody>
                                                    <tr class="form-group-2">
                                                        <th>Name</th>
                                                        <td>Group</td>
                                                    </tr>
                                                    @foreach($team as $u)
                                                    <tr class="form-group-3">
                                                        <th>{{$u->user->username()}}</th>
                                                        <td>{{$u->user->group->g_name}}	</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div role="tabpanel" class="tab-pane fade " id="references">
                        
                        @include("Attachments.attachments_module")
                        
                    </div>
                </div>


            </div>
        </div>

    </div>

    <div class="tab-pane fade " id="Task_info" role="tabpanel" aria-labelledby="Task_info_tab">
        <div class="card">

            <div class="card-header {{$closed_comment}} {{$user_privileges->tasks->add}}">
                @include("tasks.task_m")
            </div>

            <div class="card-body">

                <div class="card-body">
                    @include('tasks.tasks_table')
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane fade " id="ticket_info" role="tabpanel" aria-labelledby="ticket_tab_info">
        @include("tickets.ticket")
    </div>

    <div class="tab-pane fade" id="discussion_info" role="tabpanel" aria-labelledby="discussion_tab_info">

        <div class="card">

            <div class="card-header {{$closed_comment}}">

               @include("discussions.discussion_m")



            </div>

            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date Added</th>
                            <th scope="col">Created by</th>

                        </tr>
                    </thead>
                    <tbody>


                        <?php $i = 1 ?>
                        @foreach($discussions as $dis)

                        <tr>
                            <th scope="row" ><?php echo $i++ ?></th>
                            <td>
                                <a class="delete_user {{$closed_comment}} {{$dis->closed}} {{$user_privileges->discussion->delete}}" data-toggle="modal" data-target="#delete_discussion_modal" style="margin-right: 5px" href="/discussion/delete/{{$dis->diss_id}}"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                                <a class="{{$closed_comment}} {{$dis->closed}} {{$user_privileges->discussion->edit}}" style="margin-left: 5px" href="/discussion/edit/{{$dis->diss_id}}"><i style='font-size:15px' class='fas'>&#xf044;</i></a>
                                <a style="margin-left: 7px" href="/discussion/info/{{$dis->diss_id}}"><i style='font-size:15px' class='fas'>&#xf05a;</i></a>


                            </td>


                            <td><span class="badge {{$dis->status->cd_css_class}}">{{$dis->status->cd_name}}</span></td>
                            <td>{{$dis->diss_name}}</td>
                            <td>{{$dis->diss_description}}</td>
                            <td>{{$dis->diss_creation_date}}</td>
                            <td>{{$dis->created_by->u_firstname}}</td>


                        </tr>

                        @endforeach


                    </tbody>
                </table>

            </div>

        </div>

    </div>
</div>

</div>
@endsection
