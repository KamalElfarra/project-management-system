<?php

namespace App\Http\Controllers;

use App\Models\m_Attachments;
use App\Models\m_codes;
use App\Models\m_comments;
use App\Models\m_discussion;
use App\Models\m_file;
use App\Models\m_project;
use App\Models\m_project_team;
use App\Models\m_tasks;
use App\Models\m_tickets;
use App\Models\m_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Project extends Controller {

    private $project_closed = 28;
    private $task_canceled = 46;
    private $task_done = 47;
    private $discution_closed = 56;
    private $ticket_closed = 51;

    public function __construct() {
        $this->middleware("auth");
    }

    public function manage() {


        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();


        $data["project_priority"] = m_codes::getCodes(3);
        $data["project_status"] = m_codes::getCodes(4);





        if(Auth::user()->u_group == 1){
            $projects = m_project::all();
        }else{
            $projects = m_project::join('project_team_tb', 'p_id', '=', 'project_team_tb.t_p_id')
                ->where("project_team_tb.t_u_id" , Auth::id())
                ->get();
        }

        foreach($projects as $p){
            $p->closed = ($p->p_status == $this->project_closed) ? "d-none" : "";
        }
        $data["project"] = $projects;



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

        return view('projects.project', $data);
    }

    public function delete($project_id) {
        $project = m_project::where("p_id", $project_id)->first();
        $data["project"] = $project;
        return view("projects.delete-pro", $data);
    }

    public function deletepro(Request $request) {
        $input = $request->input();
        $project_id = $input["project_id"];
        m_comments::where("c_entity_type" ,1)->where("c_entity_id" , $project_id)->forceDelete();
        m_tasks::where("ta_project_id" , $project_id)->forceDelete();
        m_tickets::where("tic_project_id" , $project_id)->forceDelete();
        m_Attachments::where("attach_entity_type" , 1)->where("attach_entity_id" , $project_id)->forceDelete();
        m_project_team::where("t_p_id" , $project_id)->forceDelete();
        m_project::where("p_id", $project_id)->forceDelete();

        return back()->with("message", "project with id ::" . $project_id . "::deleted success");
    }

    public function edit($id) {
        $project = m_project::where('p_id', $id)->first();
        if ($project == null) {
            return redirect("project")->withErrors("projects is not available");
        }
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $data["project"] = $project;
        $data["priority"] = m_codes::getCodes(3);
        $data["status"] = m_codes::getCodes(4);

        $priority = m_codes::getCodes(3);
        foreach ($priority as $pr) {
            $pr->selected = "";
            if ($pr->cd_id == $project->p_priority) {
                $pr->selected = "selected";
            }
            $data["priority"] = $priority;
        }

        $status = m_codes::getCodes(4);
        foreach ($status as $st) {
            $st->selected = "";
            if ($st->cd_id == $project->p_status) {
                $st->selected = "selected";
            }
            $data["status"] = $status;
        }

        $p_team = m_project_team::where("t_p_id", $id)->get();
        $p_t_ids = [];
        foreach ($p_team as $u) {
            $p_t_ids[] = $u->t_u_id;
        }

        $managers = m_user::where("u_group", 2)->get();
        $developers = m_user::where("u_group", 3)->get();
        $client = m_user::where("u_group", 4)->get();
        $technical_support = m_user::where("u_group", 5)->get();



        foreach ($managers as &$dev) {
            $dev->selected = in_array($dev->u_id, $p_t_ids) ? "selected" : "";
        }

        foreach ($developers as &$dev) {
            $dev->selected = in_array($dev->u_id, $p_t_ids) ? "selected" : "";
        }

        foreach ($client as &$dev) {
            $dev->selected = in_array($dev->u_id, $p_t_ids) ? "selected" : "";
        }

        foreach ($technical_support as &$dev) {
            $dev->selected = in_array($dev->u_id, $p_t_ids) ? "selected" : "";
        }

        $groups[] = ["name" => "Managers", "users" => $managers];
        $groups[] = ["name" => "Developers", "users" => $developers];
        $groups[] = ["name" => "Clients", "users" => $client];
        $groups[] = ["name" => "Technical Supports", "users" => $technical_support];

        $data["user_groups"] = $groups;

        return view("projects.edit_project", $data);
    }

    public function editpro($id, request $request) {
        $this->validate($request, [
            'priority' => 'required:project_tb,p_priority' . $id . 'p_id',
            'status' => 'required:project_tb,p_status' . $id . 'p_id',
            'name' => 'required:project_tb,p_name' . $id . 'p_id',
            'description' => 'required:project_tb,p_description',
        ]);

        $project = m_project::where('p_id', $id)->first();
        if ($project == null) {
            return redirect('project')->withErrors("project not Available");
        }

        $input = $request->input();
        $file = $request->file();

        $project = m_project::where("p_id", $id)->first();

        $project->p_priority = $input["priority"];
        $project->p_status = $input["status"];
        $project->p_name = $input["name"];
        $project->p_description = $input["description"];
        $project->p_start_date = $input["date"];

        //TODO: if tab not active date returned null
        $project->save();
        
        
         foreach ($input["project_team"] as $user_id) {
            $pt = new m_project_team();
            $pt->t_p_id = $id;
            $pt->t_u_id = $user_id;
            $pt->save();
        }
        return redirect("project");
    }

    public function Add(request $request) {
        $this->validate($request, [
            'priority' => 'required:project_tb,p_priority',
            'status' => 'required:project_tb,p_status',
            'name' => 'required:project_tb,p_name',
            'description' => 'required:project_tb,p_description',
        ]);

        $input = $request->input();
        $file = $request->file();

        $project = new m_project();

        $project->p_priority = $input["priority"];
        $project->p_status = $input["status"];
        $project->p_name = $input["name"];
        $project->p_description = $input["description"];
        $project->p_start_date = $input["date"];
        $project->p_created_by = Auth::id();

        $project->save();
        $project_id = $project->p_id;

        foreach ($input["project_team"] as $user_id) {
            $pt = new m_project_team();
            $pt->t_p_id = $project_id;
            $pt->t_u_id = $user_id;
            $pt->save();
        }

        if (isset($file["attachment"])) {

            $project_photo = $file["attachment"];
            $image_photo = $project_id . "." . $project_photo->getClientOriginalExtension();
            $project_photo->move(public_path("/uploads/projects/images"), $image_photo);
            $file = new m_file();
            $file->f_name = $image_photo;
            $file->f_path = "/uploads/projects/images";
            $file->f_extension = $project_photo->getClientOriginalExtension();
            $file->f_upload_user = 1;
            $file->save();
        }
        return back();
    }

    public function info($project_id) {

        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();


        $data["project"] = m_project::where("p_id", $project_id)->first();
        $data["closed_comment"] = $data["project"]->p_status == $this->project_closed ? "d-none":"";

        $tasks = [];
        $user = Auth::user();
        if($user->u_group ==1 || $user->u_group ==2 ) {
            $tasks = m_tasks::where("ta_project_id", $project_id)->get();
        }elseif ($user->u_group ==3){
            $tasks = m_tasks::where("ta_project_id", $project_id)
                ->where("ta_assigned_to" , Auth::id())->get();
        }

        if(Auth::user()->u_group == 1 ||  $user->u_group ==2){
            $tickets = m_tickets::where("tic_project_id", $project_id)->get();
        }else{
            $tickets = m_tickets::join('project_team_tb', 'tic_project_id', '=', 'project_team_tb.t_p_id')
                ->where("tic_project_id", $project_id)
                ->where("project_team_tb.t_u_id" , Auth::id())
                ->get();
        }


        if(Auth::user()->u_group == 1 ||  $user->u_group ==2){
            $discussions = m_discussion::where("diss_project_id", $project_id)->get();
        }else{
            $discussions = m_discussion::join('project_team_tb', 'diss_project_id', '=', 'project_team_tb.t_p_id')
                ->where("diss_project_id", $project_id)
                ->where("project_team_tb.t_u_id" , Auth::id())
                ->get();
        }

        //$tickets = m_tickets::where("tic_project_id", $project_id)->get();
       // $discussions = m_discussion::where("diss_project_id", $project_id)->get();

        foreach($tasks as $t){
            $t->closed = ($t->ta_status == $this->task_done) ? "d-none" : "";
        }
        $data["tasks"]= $tasks;



        foreach($tickets as $t){
            $t->closed = ($t->tic_status == $this->ticket_closed) ? "d-none" : "";
            $t->delete = ($t->tic_created_by == Auth::id())?"" : "d-none";
            $t->edit = ($t->tic_created_by == Auth::id())?"" : "d-none";
        }
        $data["tickets"]= $tickets;

        foreach($discussions as $d){
            $d->closed = ($d->diss_status == $this->discution_closed) ? "d-none" : "";
        }
        $data["discussions"]= $discussions;

        $data["task_type"] = m_codes::getCodes(5);
        $data["task_priority"] = m_codes::getCodes(6);
        $data["task_status"] = m_codes::getCodes(7);

        $data["ticket_status"] = m_codes::getCodes(8);
        $data["ticket_type"] = m_codes::getCodes(9);

        $data["discussion_status"] = m_codes::getCodes(10);
        $data["comment_status"] = m_codes::getCodes(12);
        $data["team"] = m_project_team::where("t_p_id", $project_id)->get();
        
        $project_team = [];
        foreach ($data["team"] as $u) {
            if ($u->user->u_group == 2 || $u->user->u_group == 3)
                $project_team[] = $u;
        }
        $data["task_users"] = $project_team;

        $data["comments"] = m_comments::where("c_entity_id", $project_id)
                        ->where("c_entity_type", 1)->get();

        $data["attachments"] = m_Attachments::where("attach_entity_id", $project_id)
                        ->where("attach_entity_type", 1)->get();

        $data["entity_type"] = 1;
        $data["entity_id"] = $project_id;

        return view("projects.info", $data);
    }


}
