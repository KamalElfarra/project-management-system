<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Attendance extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }


    public function manage(){
        $data["user_privileges"] = Auth::user()->group->privileges();
        $nam=[];
        $nam["ka"]="kamal";
        $data["name"]=$nam;

        $dat=[];
        $dat["2019"]="2019";
        $data["date"]=$dat;

        $mon=[];
        $mon["ja"]="january";
        $data["month"]=$mon;



        return view('Attendances.attendance',$data);
    }

    public function search(){


    }

    public function Add(){


    }

    public function delete(){


    }

    public function edit(){


    }

    public function edita(){


    }

    public function attend_in(){


    }

    public function attend_out(){


    }




}
