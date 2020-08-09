<?php

namespace App\Http\Controllers;

use App\Models\m_codes;
use App\Models\m_group;
use App\Models\m_user;
use App\Models\m_userAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_UserAlert extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function all(){
        $data["tools"] = m_userAlert::getMyAlerts();
        $data["user_privileges"] = Auth::user()->group->privileges();
        return view('tools.my_alerts',$data);
    }
    public function info($alert_id){
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $data["alert"] = m_userAlert::where("too_id" , $alert_id)->first();
        return view("tools.info" , $data);
    }

    public function manage(){
        //$data["notifications"] = m_userAlert::where("too_created_by" , Auth::id())->get();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $data["type"]=m_codes::getCodes(13);
        $data["location"]=m_codes::getCodes(14);
        $data["Groups"]=m_group::all();
        $data["Assign"]=m_user::all();
        $data["tools"]=m_userAlert::all();
        return view('tools.tool',$data);
    }

    public function Add(request $request){
        $input=$request->input();
        $user_alert=new m_userAlert();
        $user_alert->too_type=$input["type"];
        $user_alert->too_title=$input["title"];
        $user_alert->too_description=$input["description"];
        $user_alert->too_group_id=1;
        $user_alert->too_Assigned_to=$input["Assigned_to"];
        $user_alert->too_created_by=Auth::id();

        $user_alert->save();
        return back();
   }

    public function delete($id){
        $user_alert=m_userAlert::where("too_id",$id)->first();
        $data["user_alert"]=$user_alert;
        return view("tools.delete_tool",$data);
    }

    public function deletetool(request $request){
        $input=$request->input();
        $id=$input["user_alert"];
        m_userAlert::where("too_id",$id)->delete();
        return back()->with("message","the id user ::".$id.":: was deleted successfully");
    }

    public function edit_tool($id){
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $user_alert=m_userAlert::where("too_id",$id)->first();
        if($user_alert==null){
            return redirect("user_alert")->withErrors("users_alert was not found");
        }
        $data["user_alert"]=$user_alert;
        $data["type"]=m_codes::getCodes(13);
        $data["Groups"]=m_group::all();
        $data["Assign"]=m_user::all();
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        return view("tools.edit_tool",$data);
    }

    public function edit($id,request $request){
        $user_alert=m_userAlert::where("too_id",$id)->first();
        if($user_alert==null){
            return redirect("user_alert")->withErrors("users_alert was not found");
        }
        $input=$request->input();
        $user_alert=m_userAlert::where("too_id",$id)->first();

        $user_alert->too_type=$input["type"];
        $user_alert->too_title=$input["title"];
        $user_alert->too_description=$input["description"];
        $user_alert->too_group_id=1;
        $user_alert->too_Assigned_to=$input["Assigned_to"];
        $user_alert->too_created_by=Auth::id();


        $user_alert->save();
        return redirect("user_alert");
    }


}
