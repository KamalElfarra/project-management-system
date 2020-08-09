@extends('panel.control')
@section('conection')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="/project" style="font-size: 20px">project</a></li>
            <li class="breadcrumb-item "><a href="/task" style="font-size: 20px">task > {{$task->ta_name}}</a></li>
        </ol>
    </nav>



    <div class="tab-content mt-5" id="myTabContent6">

        <div class="row mt-2 ">
            <div class="col-md-6 pl-3 " style="margin-right: 5px;">
                @include("comments.comments_module")
            </div>
            <div class=" col-4 push-2">
                <div class="card">
                <div class="card-body">
                    <div class="panel panel-info item-details">
                        <div class="panel-body item-details">

                            <div class="heading">
                                <h4 class="media-heading">Info</h4>
                            </div>
                            <div class="table-scrollable">
                                <table class="table table-bordered table-hover table-item-details">

                                    <tbody><tr class="form-group-2">
                                        <th>ID</th>
                                        <td>{{$task->ta_id}}</td>
                                    </tr>

                                    <tr class="form-group-3">
                                        <th>priority	</th>
                                        <td>{{$task->priority->cd_name}}	</td>
                                    </tr>

                                    <tr class="form-group-4">
                                        <th>type	</th>
                                        <td>{{$task->type->cd_name}}</td>

                                    </tr>


                                    <tr class="form-group-201">
                                        <th>Name</th>
                                        <td>{{$task->ta_name}}</td>
                                    </tr>

                                    <tr class="form-group-201">
                                        <th>status</th>
                                        <td>{{$task->status->cd_name}}</td>
                                    </tr>

                                    <tr class="form-group-201">
                                        <th>Assigned to</th>
                                        <td>{{$task->ta_Assigned_to}}</td>
                                    </tr>

                                    <tr class="form-group-201">
                                        <th>Est.time</th>
                                        <td>{{$task->ta_creation_date}}</td>
                                    </tr>

                                    <tr class="form-group-201">
                                        <th>End date</th>
                                        <td>{{$task->ta_creation_date}}</td>
                                    </tr>

                                    <tr class="form-group-201">
                                        <th>date added</th>
                                        <td>{{$task->ta_creation_date}}</td>
                                    </tr>

                                    <tr class="form-group-201">
                                        <th>created by</th>
                                        <td>{{$task->created_by->u_firstname}}</td>
                                    </tr>


                                    </tbody>
                                </table>




                            </div>



                        </div>
                    </div>
                </div>
                </div>

            @include("Attachments.attachments_module")

            </div>
        </div>


    </div>
@endsection