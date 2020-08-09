@extends('panel.control')
@section('conection')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="/project" style="font-size: 20px">project</a></li>
            <li class="breadcrumb-item "><a href="/discussion" style="font-size: 20px">discussion ></a></li>
        </ol>
    </nav>

    <br>



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
                                            <td>{{$discussion->diss_id}}</td>
                                        </tr>

                                        <tr class="form-group-3">
                                            <th>status	</th>
                                            <td>{{$discussion->status->cd_name}}	</td>
                                        </tr>

                                        <tr class="form-group-4">
                                            <th>Name	</th>
                                            <td>{{$discussion->diss_name}}</td>

                                        </tr>


                                        <tr class="form-group-201">
                                            <th>Date Added
                                            </th>
                                            <td>{{$discussion->diss_creation_date}}</td>
                                        </tr>

                                        <tr class="form-group-6">
                                            <th>created by</th>

                                            <td>{{$discussion->created_by->u_firstname}} </td>

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