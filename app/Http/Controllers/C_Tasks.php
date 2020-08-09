<?php

namespace App\Http\Controllers;

use App\Models\m_Attachments;
use App\Models\m_codes;
use App\Models\m_comments;
use App\Models\m_file;
use App\Models\m_tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Tasks extends Controller
{


    private $task_new = 42;
    private $task_open = 43;
    private $task_canceled = 46;
    private $task_done = 47;

    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            //Group 1 :: admin
            if(!empty($user->group->privileges()->tasks->nav) ){
                return redirect("/")->withErrors("You do not has Permissions");
            }else{
                return $next($request);
            }
        });
    }

    public function manage(){
        $data["user_privileges"] = Auth::user()->group->privileges();

        $user = Auth::user();
        if($user->u_group ==1 || $user->u_group ==2 ) {
            $tasks = m_tasks::all();
        }elseif ($user->u_group ==3){
            $tasks = m_tasks::where("ta_assigned_to" , Auth::id())->get();
        }

        $data["tasks"]=$tasks;


        return view('tasks.tasks_all',$data);

    }

    public function delete($id){

        $task=m_tasks::where("ta_id",$id)->first();

        $data["task"]=$task;

        return view("tasks.delete_task",$data);


    }

    public function deletetask(request $request){

        $input=$request->input();

        $id=$input["task_id"];

        m_tasks::where("ta_id",$id)->delete();

        return back()->with("message","task with id::".$id."::deleted successful");


    }

    public function edit($id){

        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $task=m_tasks::where("ta_id",$id)->first();
        if($task==null){
            return redirect("task")->withErrors("task not available");
        }

        $data["task"]=$task;
        $data["type"]=m_codes::getCodes(5);
        $data["status"]=m_codes::getCodes(7);
        $data["priority"]=m_codes::getCodes(6);
        $data["task_users"]=m_codes::getCodes(11);

        $type=m_codes::getCodes(5);

        foreach ($type as $typ){
            $typ->selected="";
            if($typ->cd_id == $task->ta_type){
                $typ->selected="selected";
            }
            $data["type"]=$type;
        }

        $status=m_codes::getCodes(7);
        foreach ($status as $st){
            $st->selected="";
            if($st->cd_id==$task->ta_status){
                $st->selected="selected";
            }
            $data["status"]=$status;
        }
        $priority=m_codes::getCodes(6);
        foreach ($priority as $pri){
            $pri->selected="";
            if($pri->cd_id==$task->ta_priority){
                $pri->selected="selected";
            }

            $data["priority"]=$priority;
        }

        return view("tasks.edit_task",$data);

    }

    public function editTask($id,request $request){
        $this->validate($request, [
            'type' => 'required:task_tb,ta_type'.$id.'ta_id',
            'Name'   =>  'required:task_tb,ta_name'.$id.'ta_id',
            'status'=> 'required:task_tb,ta_status'.$id.'ta_id',
            'priority'=> 'required:task_tb,ta_priority'.$id.'ta_id',
            'description'=> 'required:task_tb,ta_description'.$id.'ta_id',
        ]);

        $task=m_tasks::where("ta_id",$id)->first();

        if ($task==null){

            return redirect("message")->withErrors("task is available");

        }

        $input=$request->input();
        $file=$request->file();

        $task=m_tasks::where("ta_id",$id)->first();

        $task->ta_type=$input["type"];
        $task->ta_name=$input["Name"];
        $task->ta_status=$input["status"];
        $task->ta_priority=$input["priority"];
        $task->ta_description=$input["description"];
        $task->ta_created_by=Auth::id();
        $task->ta_Assigned_to=1;
        $task->ta_project_id=1;
        $task->	ta_groub=1;
        $task->	updated_at=1;

        $task->save();
        return redirect("task");


    }

    public function Add(request $request){
        $this->validate($request, [
            'type' => 'required:task_tb,ta_type',
            'Name'=>  'required:task_tb,ta_name',
            'status'=> 'required:task_tb,ta_status',
            'priority'=> 'required:task_tb,ta_priority',
            'description'=> 'required:task_tb,ta_description',
        ]);

        $input=$request->input();
        $file=$request->file();

       // dd($input);
        $task=new m_tasks();

        $task->ta_type=$input["type"];
        $task->ta_name=$input["Name"];
        $task->ta_status=$input["status"];
        $task->ta_priority=$input["priority"];
        $task->ta_description=$input["description"];
        $task->ta_created_by=Auth::id();
        $task->ta_start_date=$input["start_date"];
        $task->ta_end_date=$input["end_date"];
        $task->ta_assigned_to=$input["assign_to"];
        $task->ta_project_id=$input["project_id"];

        $task->save();

        return back();

    }

    public function info($id){

        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();

        $task = m_tasks::where("ta_id",$id)->first();
        if($task->ta_status ==$this->task_new  && $task->ta_assigned_to == Auth::id()){
            $task->ta_status = $this->task_open;
            $task->save();
        }

        $data["task"]=$task;

        $data["closed_comment"] = ($data["task"]->ta_status == $this->task_canceled || $data["task"]->ta_status == $this->task_done)? "d-none":"";

        $data["comments"]=m_comments::where("c_entity_id",$id)->where("c_entity_type",2)->get();
        $data["comment_status"]=m_codes::getCodes("12");
        $data["attachments"]=m_Attachments::where("attach_entity_id",$id)
            ->where("attach_entity_type" , 2)->get();


        $data["entity_type"] =2;
        $data["entity_id"] = $id;

        return view("tasks.info",$data);



    }



}
