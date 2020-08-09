@extends('panel.control')
@section('conection')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="/project" style="font-size: 20px">project</a></li>
            <li class="breadcrumb-item "><a style="font-size: 20px">ticket > {{$ticket->tic_name}}</a></li>
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

                            <div class="heading"><h4 class="media-heading">Info</h4></div>
                            <div class="table-scrollable">
                                <table class="table table-bordered table-hover table-item-details">

                                    <tbody><tr class="form-group-2">
                                        <th>ID</th>
                                        <td>{{$ticket->tic_id}}</td>
                                    </tr>

                                    <tr class="form-group-3">
                                        <th>Type</th>
                                        <td>{{$ticket->type->cd_name}}	</td>
                                    </tr>


                                    <tr class="form-group-4">
                                        <th>Subject	</th>
                                        <td>{{$ticket->tic_subject}}</td>

                                    </tr>

                                    <tr class="form-group-201">
                                        <th>Description</th>
                                        <td>{{$ticket->tic_description}}</td>
                                    </tr>

                                    <tr class="form-group-201">
                                        <th>status</th>
                                        <td>{{$ticket->status->cd_name}}</td>
                                    </tr>

                                    <tr class="form-group-201">
                                        <th>Date Added</th>
                                        <td>{{$ticket->tic_creation_date}}</td>
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