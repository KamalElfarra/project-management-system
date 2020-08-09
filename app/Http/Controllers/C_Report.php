<?php

namespace App\Http\Controllers;

use App\Models\m_codes;
use App\Models\m_project;
use App\Models\m_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Report extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function manage(){
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();


        $data["project_priority"] = m_codes::getCodes(3);
        $data["project_status"] = m_codes::getCodes(4);



        //  $admins = m_user::where("u_group" , 1)->get();
        $managers = m_user::where("u_group", 2)->get();
        $developers = m_user::where("u_group", 3)->get();
        $client = m_user::where("u_group", 4)->get();
        $technical_support = m_user::where("u_group", 5)->get();

        // $groups[]=["name" => "Admin" , "users"=>$admins];
        $groups[] = ["name" => "Managers", "users" => $managers];
        $groups[] = ["name" => "Developers", "users" => $developers];
        $groups[] = ["name" => "Clients", "users" => $client];
        $groups[] = ["name" => "Technical Supports", "users" => $technical_support];

        $data["user_groups"] = $groups;

        $data["projects"] =[];

        return view('reports.report',$data );


    }

    public function search(Request $request){
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();


        $data["project_priority"] = m_codes::getCodes(3);
        $data["project_status"] = m_codes::getCodes(4);



        //  $admins = m_user::where("u_group" , 1)->get();
        $managers = m_user::where("u_group", 2)->get();
        $developers = m_user::where("u_group", 3)->get();
        $client = m_user::where("u_group", 4)->get();
        $technical_support = m_user::where("u_group", 5)->get();

        // $groups[]=["name" => "Admin" , "users"=>$admins];
        $groups[] = ["name" => "Managers", "users" => $managers];
        $groups[] = ["name" => "Developers", "users" => $developers];
        $groups[] = ["name" => "Clients", "users" => $client];
        $groups[] = ["name" => "Technical Supports", "users" => $technical_support];

        $data["user_groups"] = $groups;


        ///search area
        $input = $request->input();

        $project= m_project::where("p_id" , ">" ,"0");
        if( $input["priority"]>0)
            $project->where("p_priority", $input["priority"]);

        if($input["status"] > 0)
            $project->where("p_status", $input["status"]);

        if($input["project_team"] > 0) {
            $project->join('project_team_tb', 'p_id', '=', 'project_team_tb.t_p_id')
                ->where("project_team_tb.t_u_id" , $input["project_team"]);
        }

        if(strlen($input["name"])>0)
            $project->where("p_name" , "LIKE", "%" .$input["name"]."%");

        if(strlen($input["description"])>0)
            $project->where("p_description" , "LIKE", "%" .$input["description"]."%");

        if(strlen($input["name"])>0)
            $project->where("p_name" , "LIKE", "%" .$input["name"]."%");

        if(!empty($input["date"])){
            $project->where("p_start_date" , $input["date"]);
        }

        $project->withCount(['discussions', 'tasks', 'tickets' , 'team_member']);
        $ret_data = $project->get();

        $data["projects"] = $ret_data;
        return view('reports.report',$data );
    }


}
