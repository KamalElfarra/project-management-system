@extends('panel.control')
@section('conection')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:whitesmoke ">
            <li class="breadcrumb-item"><a href="" style="font-size: 20px">Application Configuration ></a></li>
        </ol>
    </nav>

    <br>



    <div class="card">

        <div class="card-body">

            <form method="post" action="/configuration"  enctype="multipart/form-data">
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                <div class="form-group">
                    <label class="col-md-3 control-label" >Name of application</label>
                    <div class="col-md-9">
                        <input name="app_name" required value="{{$conf->app_name}}" type="text" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" >Short name of application</label>
                    <div class="col-md-9">
                        <input name="app_abbrev" value="{{$conf->app_short_name}}" type="text" class="form-control input-small required" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" >Logo</label>
                    <div class="col-md-9">
                        <input name="app_logo"  value="" type="file" accept="image/*"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Copyright Text</label>
                    <div class="col-md-9">
                        <input name="copyrights" value="{{$conf->app_copyrights_text}}" type="text" class="form-control" required/>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-md-9">
                        <input value="Save" type="submit" class="btn btn-primary"></div>
                </div>

            </form>

        </div>
    </div>


@endsection