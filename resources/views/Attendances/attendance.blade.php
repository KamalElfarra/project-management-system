@extends('panel.control')
@section('conection')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="/attendance" style="font-size: 20px">attendance ></a></li>
        </ol>
    </nav>

    <br>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#" style="font-size: 18px">Attendance</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">




            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <hr>
    <br>





    <div class="card">

        <div class="card-header">

            @include('Attendances.delete_atten')
            @include('Attendances.attendance_m')


        <div class="card-body">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Action</th>
                    <th scope="col">day</th>
                    <th scope="col">Name</th>
                    <th scope="col">date</th>
                    <th scope="col">attend in</th>
                    <th scope="col">attend out</th>
                    <th scope="col">Email</th>
                    <th scope="col">Request</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" >1</th>
                    <td>
                        <a data-toggle="modal" data-target="#delete_attendance_modal" style="margin-right: 5px" href="#delete_user_modal"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                        <a style="margin-left: 5px" href="/"><i style='font-size:15px' class='fas'>&#xf044;</i></a>


                    </td>
                    <td>saturday</td>
                    <td>kamal</td>
                    <td>2/2/2019</td>
                    <td>8:30</td>
                    <td>2:30</td>
                    <td>kamalelfarra@gmail.com</td>
                    <td></td>

                </tr>

                <tr>
                    <th scope="row" >2</th>
                    <td>
                        <a data-toggle="modal" data-target="#delete_attendance_modal" style="margin-right: 5px" href="#delete_user_modal"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                        <a style="margin-left: 5px" href="/"><i style='font-size:15px' class='fas'>&#xf044;</i></a>


                    </td>
                    <td>sunday</td>
                    <td>wael</td>
                    <td>3/2/2019</td>
                    <td>

                        <a style="margin-left: 5px" href=""><i style='font-size:18px' class='fas'>&#xf2b9;</i>
                        </a>


                    </td>

                    <td>

                        <a style="margin-left: 5px" href=""><i style='font-size:18px' class='far'>&#xf2b9;</i>

                        </a>

                    </td>
                    <td>wael1999@gmail.com</td>
                    <td></td>

                </tr>

                <tr>
                    <th scope="row" >3</th>
                    <td>
                        <a data-toggle="modal" data-target="#delete_attendance_modal" style="margin-right: 5px" href="#delete_user_modal"><i style='font-size:15px' class='fas'>&#xf2ed;</i></a>
                        <a style="margin-left: 5px" href="/"><i style='font-size:15px' class='fas'>&#xf044;</i></a>


                    </td>
                    <td>monday</td>
                    <td>ahmad</td>
                    <td>4/2/2019</td>
                    <td>-:-</td>
                    <td>-:-</td>
                    <td>ahmad99@gmail.com</td>
                    <td></td>

                </tr>


                </tbody>



            </table>



        </div>




    </div>











@endsection