<?php

namespace App\Http\Controllers;

use App\Models\m_discussion;
use App\Models\m_project;
use App\Models\m_tasks;
use App\Models\m_tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Dashboard extends Controller
{

    private $project_closed = 28;
    private $task_canceled = 46;
    private $task_done = 47;
    private $discution_closed = 56;
    private $ticket_closed = 51;

    public function __construct(){
        $this->middleware("auth");
    }


    public function index(){
        $data["login"] = Auth::user();
        $privileges = Auth::user()->group->privileges();
        $data["user_privileges"] = $privileges;

        if(Auth::user()->u_group == 1){
            $projects = m_project::where("p_status" , "!=" , $this->project_closed )->get();
        }else{
            $projects = m_project::join('project_team_tb', 'p_id', '=', 'project_team_tb.t_p_id')
                ->where("project_team_tb.t_u_id" , Auth::id())
                ->where("p_status" , "!=" , $this->project_closed )
                ->get();
        }
        $data["project"] = $projects;

        if(empty($privileges->discussion->nav)){
            if(Auth::user()->u_group == 1){
                $discutions = m_discussion::where("diss_status" , "!=" , $this->discution_closed )->get();
            }else{
                $discutions = m_discussion::select("discussion_tb.*")->join('project_team_tb', 'diss_project_id', '=', 'project_team_tb.t_p_id')
                    ->where("project_team_tb.t_u_id" , Auth::id())
                    ->where("diss_status" , "!=" , $this->discution_closed )
                    ->distinct()
                    ->get();
            }
            $data["discussions"] =$discutions;
        }else{
            $data["discussions"]=[];
        }


        if(empty($privileges->tasks->nav)){
            if(Auth::user()->u_group == 1){
                $tasks = m_tasks::where("ta_status" , "!=" , $this->task_done )
                    ->where("ta_status" , "!=" , $this->task_canceled )->get();
            }else{
                $tasks = m_tasks::select("tasks_tb.*")->join('project_team_tb', 'ta_project_id', '=', 'project_team_tb.t_p_id')
                    ->where("project_team_tb.t_u_id" , Auth::id())
                    ->where("ta_status" , "!=" , $this->task_done )
                    ->where("ta_status" , "!=" , $this->task_canceled )
                    ->distinct()
                    ->get();
            }
            $data["tasks"] =$tasks;
        }else{
            $data["tasks"]=[];
        }


        if(Auth::user()->u_group == 1){
            $tickets = m_tickets::where("tic_status" , "!=" , $this->ticket_closed )->get();
        }else{
            $tickets = m_tickets::where("tic_created_by" , Auth::id())
                ->where("tic_status" , "!=" , $this->ticket_closed )
                ->distinct()
                ->get();
        }
        $data["tickets"] =$tickets;


        //dd($tickets);

        $user = Auth::user();
        switch ($user->u_group){
            case 1 :
        }

        return view('dashboards.dashboard' ,$data);
    }
}
