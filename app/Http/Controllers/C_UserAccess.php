<?php

namespace App\Http\Controllers;

use App\Models\m_discussion;
use App\Models\m_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_UserAccess extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function manage(){
        $data["login"]=Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();

        $data["groups"] = m_group::all();
        return view('access_group.userAccess',$data );


    }

    public function delete(){



    }

    public function edit_view($group_id){
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();

        $group = m_group::where("g_id", $group_id)->first();
        $pr = $group->privileges();

        $results =[];
        foreach($pr as $km=>$vm){
            $results[$km]["name"] = $km;
            foreach($vm as $k=>$v){
                $results[$km]["group"][$km . "_" . $k]["check"] = $v == "d-none" ? "" :"checked";
                $results[$km]["group"][$km . "_" . $k]["name"] = $k;

            }
        }

        $data["group"] = $group;
        $data["pr_list"]=$results;

        return view("access_group.useraccess_m", $data);
     /*
        $d["users_nav"] = $pr["users"]["nav"] == "d-none" ? "checked" :"";

        $d["reports"]["nav"]== "d-none" ? "checked" :"";
        $d["configuration"]["nav"]== "d-none" ? "checked" :"";
        $d["user_alerts"]["nav"]== "d-none" ? "checked" :"";

        $d["project"]["nav"]== "d-none" ? "checked" :"";
        $d["project"]["add"]== "d-none" ? "checked" :"";
        $d["project"]["edit"]== "d-none" ? "checked" :"";
        $d["project"]["delete"]== "d-none" ? "checked" :"";
        $d["project"]["view"]== "d-none" ? "checked" :"";

        $d["tasks"]["nav"]== "d-none" ? "checked" :"";
        $d["tasks"]["add"]== "d-none" ? "checked" :"";
        $d["tasks"]["edit"]== "d-none" ? "checked" :"";
        $d["tasks"]["delete"]== "d-none" ? "checked" :"";
        $d["tasks"]["view"]== "d-none" ? "checked" :"";


        $d["tickets"]["nav"]== "d-none" ? "checked" :"";
        $d["tickets"]["add"]== "d-none" ? "checked" :"";
        $d["tickets"]["edit"]== "d-none" ? "checked" :"";
        $d["tickets"]["delete"]== "d-none" ? "checked" :"";
        $d["tickets"]["view"]== "d-none" ? "checked" :"";


        $d["discussion"]["nav"]== "d-none" ? "checked" :"";
        $d["discussion"]["add"]== "d-none" ? "checked" :"";
        $d["discussion"]["edit"]== "d-none" ? "checked" :"";
        $d["discussion"]["delete"]== "d-none" ? "checked" :"";
        $d["discussion"]["view"]== "d-none" ? "checked" :"";
*/

    }

    public function edit(Request $request){

        $group = m_group::where("g_id", $request->input("group_id"))->first();
        $pr = $group->privileges_arr();
       // dd($request->input());
        foreach($pr as $km=>$vm){
            foreach($vm as $k=>$v){
                $pr[$km][$k] = $request->input($km . "_" . $k) == "on" ? "" :"d-none";

            }
        }
        $group->g_privileges = json_encode($pr);
        $group->save();

        return back()->with("msg" , "Success");
/*
        $d["users"]["nav"]="d-none";
        $d["reports"]["nav"]="d-none";
        $d["configuration"]["nav"]="d-none";
        $d["user_alerts"]["nav"]="d-none";

        $d["project"]["nav"]="";
        $d["project"]["add"]="d-none";
        $d["project"]["edit"]="d-none";
        $d["project"]["delete"]="d-none";
        $d["project"]["view"]="";

        $d["tasks"]["nav"]="d-none";
        $d["tasks"]["add"]="d-none";
        $d["tasks"]["edit"]="d-none";
        $d["tasks"]["delete"]="d-none";
        $d["tasks"]["view"]="d-none";


        $d["tickets"]["nav"]="";
        $d["tickets"]["add"]="d-none";
        $d["tickets"]["edit"]="";
        $d["tickets"]["delete"]="d-none";
        $d["tickets"]["view"]="";


        $d["discussion"]["nav"]="d-none";
        $d["discussion"]["add"]="d-none";
        $d["discussion"]["edit"]="d-none";
        $d["discussion"]["delete"]="d-none";
        $d["discussion"]["view"]="d-none";
*/

    }



}
