<!doctype html>
<html lang="en">
    <?php  $conf = \App\Models\m_configoration::first();?>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
        <link href="/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/libs/css/style.css">
        <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="/assets/vendor/charts/chartist-bundle/chartist.css">
        <link rel="stylesheet" href="/assets/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/assets/vendor/charts/c3charts/c3.css">
        <link rel="stylesheet" href="/assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
        <link rel="stylesheet" href="/assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
        <link rel="stylesheet" href="/assets/vendor/multi-select/css/multi-select.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"/>

        <link rel="shortcut icon" type="image/x-icon" href="{{$conf->app_logo}}" />
        <title>{{$conf->app_name}}</title>
    </head>

    <body>
        <!-- ============================================================== -->
        <!-- main wrapper -->
        <!-- ============================================================== -->
        <div class="dashboard-main-wrapper">
            <!-- ============================================================== -->
            <!-- navbar -->
            <!-- ============================================================== -->
            <div class="dashboard-header">
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <a class="navbar-brand" href="">
                        <img src="{{$conf->app_logo}}" height="45"/>
                        {{$conf->app_short_name}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-right-top">




                            <li class="nav-item dropdown notification">
                                <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                                <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                    <li>
                                        <div class="notification-title"> Notification</div>
                                        <div class="notification-list">
                                            <div class="list-group">
                                                <?php $notifications = \App\Models\m_userAlert::getMyAlerts()->take(5)?>
                                                @foreach($notifications as $n)
                                                <a  href="user_alert/info/{{$n->too_id}}" class="list-group-item list-group-item-action active open_dialog">
                                                    <div class="notification-info">
                                                        <div class="notification-list-user-img">
                                                            <img src="{{$n->created_by->image->full_path()}}" alt="" class="user-avatar-md rounded-circle">
                                                        </div>
                                                        <div class="notification-list-user-block">
                                                            <span class="notification-list-user-name">{{$n->created_by->username()}}</span>{{$n->too_title}}
                                                            <div class="notification-date">{{$n->too_creation_date}}</div>
                                                        </div>
                                                    </div>
                                                </a>
                                                @endforeach


                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="list-footer"> <a href="user_alert/all">View all notifications</a></div>
                                    </li>
                                </ul>
                            </li>





                            <li class="nav-item dropdown nav-user">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{\Illuminate\Support\Facades\Auth::user()->image->f_path}}/{{\Illuminate\Support\Facades\Auth::user()->image->f_name}}" alt="" class="user-avatar-md rounded-circle"></a>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="nav-user-info">
                                        <h5 class="mb-0 text-white nav-user-name">
                                            {{\Illuminate\Support\Facades\Auth::user()->username()}}</h5>
                                        <span class="status"></span><span class="ml-2">
                                            {{\Illuminate\Support\Facades\Auth::user()->group->g_name}}
                                        </span>
                                    </div>
                                    <a class="dropdown-item" href="/user/change_password"><i style='font-size:12px' class='fas'>&#xf3c1;</i> change password</a>
                                    <a class="dropdown-item" href="/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- left sidebar -->
            <!-- ============================================================== -->








            <div class="nav-left-sidebar sidebar-dark">
                <div class="nav-item">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="d-xl-none d-lg-none" href="/dashboards">Dashboard</a>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav flex-column">

                                <li class="nav-item ">
                                    <a class="nav-link active" href="/dashboards" data-toggle="" aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>

                                </li>
                                <li class="nav-item {{$user_privileges->users->nav}}">
                                    <a class="nav-link" href="/user"><i class="fa fa-address-book"></i>users</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7"
                                       aria-controls="submenu-4"><i class="fas fa-cogs" style="font-size: 15px;"></i>Projects</a>
                                    <div id="submenu-7" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item {{$user_privileges->project->nav}}">
                                                <a class="nav-link" href="/project"><i class="fas fa-cogs" style="font-size: 15px;"></i> Projects</a>
                                            </li>
                                            <li class="{{$user_privileges->tasks->nav}}">
                                                <a class="nav-link" href="/task"><i style="font-size:15px" class="fa">&#xf1b2;</i> Tasks</a>
                                            </li>
                                            <li class="{{$user_privileges->tickets->nav}}">
                                                <a class="nav-link" href="/ticket"><i style="font-size:15px" class="fa">&#xf1b3;</i>Tickets</a>
                                            </li>
                                            <li class="{{$user_privileges->discussion->nav}}" >
                                                <a class="nav-link " href="/discussion"><i style="font-size:15px" class="fa">&#xf1e1;</i>Discussions</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>


                                <li class="nav-item {{$user_privileges->reports->nav}}">
                                    <a class="nav-link" href="/report"><i style="font-size:16px" class="fa">&#xf080;</i>Reports</a>
                                </li>

                                <li class="nav-item {{$user_privileges->users->nav}}">
                                    <a class="nav-link" href="/userAccess"><i style="font-size:16px" class="fa">&#xf0e8;</i>Users Access Group</a>
                                </li>

                                <li class="nav-item {{$user_privileges->configuration->nav}}">
                                    <a class="nav-link" href="/configuration">
                                        <i style="font-size:16px" class="fa">&#xf013;</i>Application Configuration
                                    </a>
                                </li>


                                <li class="nav-item {{$user_privileges->user_alerts->nav}}">
                                    <a class="nav-link" href="/user_alert" data-toggle="" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i style="font-size:16px" class="fa">&#xf080;</i></i>Tools</a>
                                    <div id="submenu-4" class="collapse submenu" style="">

                                    </div>
                                </li>
<!--
                                <li class="nav-item">
                                    <a class="nav-link" href="/attendance" data-toggle="" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i style="font-size:16px" class="fa">&#xf2bb;</i>
                                        </i>   Attendance and departures</a>
                                    <div id="submenu-10" class="collapse submenu" style="">

                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="/codes" data-toggle="" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i style='font-size:16px' class='fas'>&#xf121;</i>

                                        </i>codes management</a>
                                    <div id="submenu-10" class="collapse submenu" style="">

                                    </div>
                                </li>
-->

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- wrapper  -->
            <!-- ============================================================== -->
            <div class="dashboard-wrapper">
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">

                        @if(!empty($errors->first()))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error</strong> {{ $errors->first() }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        @endif
                        @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> {{ session()->get('message') }}
                            <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </a>
                        </div>
                        @endif
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        @yield('conection')
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                {{$conf->app_copyrights_text}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper  -->
        <!-- ============================================================== -->
        <!-- Optional JavaScript -->
        <!-- jquery 3.3.1 -->
        <script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
        <!-- bootstap bundle js -->
        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- slimscroll js -->
        <script src="/assets/vendor/slimscroll/jquery.slimscroll.js"></script>
        <!-- main js -->
        <script src="/assets/libs/js/main-js.js"></script>
        <!-- chart chartist js >
        <script src="/assets/vendor/charts/chartist-bundle/chartist.min.js"></script-->
        <!-- sparkline js >
        <script src="/assets/vendor/charts/sparkline/jquery.sparkline.js"></script-->
        <!-- morris js >
        <script src="/assets/vendor/charts/morris-bundle/raphael.min.js"></script>
        <script src="/assets/vendor/charts/morris-bundle/morris.js"></script-->
        <!-- chart c3 js >
        <script src="/assets/vendor/charts/c3charts/c3.min.js"></script>
        <script src="/assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
        <script src="/assets/vendor/charts/c3charts/C3chartjs.js"></script-->

        <!--script src="/assets/libs/js/dashboard-ecommerce.js"></script-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script-->

        <script src="/assets/vendor/datepicker/moment.js"></script>
        <script src="/assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
        <script src="/assets/vendor/datepicker/datepicker.js"></script>
        <script src="/assets/vendor/multi-select/js/jquery.multi-select.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>



        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


        <script>

            $('.delete_user').on('click', function (e) {
                e.preventDefault();

                var dataURL = $(this).attr('href');
                // $(this).blur();
                $.get(dataURL, function (returned_html_data) {
                    //$(data).appendTo('body').modal();
                    $(returned_html_data).modal();
                });
            });

            $('.open_dialog').on('click', function (e) {
                e.preventDefault();

                var dataURL = $(this).attr('href');
                // $(this).blur();
                $.get(dataURL, function (returned_html_data) {
                    //$(data).appendTo('body').modal();
                    $(returned_html_data).modal();
                });
            });
            $('#optgroup').multiSelect({selectableOptgroup: true});

            $(document).ready(function () {
                $('#report_table').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
                $('table').dataTable();

            });
        </script>

    </body>

</html>