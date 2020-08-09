<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.7 image upload example - HDTuto.com</title>

    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">

</head>



<body>

<div class="container">



    <div class="panel panel-primary">


        <div class="panel-body">

            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

                <img src="images/{{ Session::get('image') }}">

            @endif


            @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <strong>Whoops!</strong> There were some problems with your input.

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif



            <form action="/user/upload" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />


            </form>



        </div>

    </div>

</div>

</body>



</html>

