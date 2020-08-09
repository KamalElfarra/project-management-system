<?php

namespace App\Http\Controllers;

use App\Models\m_Attachments;
use App\Models\m_codes;
use App\Models\m_comments;
use App\Models\m_discussion;
use App\Models\m_project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Discussion extends Controller
{
    private $discussion_closed = 56;
    private $discussion_new = 54;
    private $discussion_open = 55;
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            //Group 1 :: admin
            if(!empty($user->group->privileges()->discussion->nav) ){
                return redirect("/")->withErrors("You do not has Permissions");
            }else{
                return $next($request);
            }
        });
    }

    public function manage(){
        $closed_st = 71;
        $data["status"]=m_codes::getCodes(10);
        $data["user_privileges"] = Auth::user()->group->privileges();

        if(Auth::user()->u_group == 1){
            $discutions = m_discussion::all();
        }else{
            $discutions = m_discussion::select("discussion_tb.*")
                ->join('project_team_tb', 'diss_project_id', '=', 'project_team_tb.t_p_id')
                ->where("project_team_tb.t_u_id" , Auth::id())
                ->distinct()
                ->get();
        }
        foreach($discutions as &$diss){
            $diss->closed_class = $diss->diss_status == $closed_st ?"d-none":"";
        }
        $data["discussions"] = $discutions;
        return view('discussions.discussion_all',$data);
    }

    public function Add(request $request){
        $this->validate($request, [
            'status'=>'required:discussion_tb,diss_status',
            'Name'=> 'required:discussion_tb,diss_name',
            'description'=> 'required:discussion_tb,diss_description',
        ]);

        $input=$request->input();

        $discussion=new m_discussion();

        $discussion->diss_status=$input["status"];
        $discussion->diss_name=$input["Name"];
        $discussion->diss_description=$input["description"];
        $discussion->diss_project_id=$input["project_id"];
        $discussion->diss_created_by=Auth::id();

        $discussion->save();

        return back();

    }

    public function delete($id){
        $discussion=m_discussion::where("diss_id",$id)->first();
        $data["discussion"]=$discussion;
        return view("discussions.delete_discussion",$data);
    }

    public function deletedis(request $request){
        $input=$request->input();
        $id=$input["discussion_id"];
        m_discussion::where("diss_id",$id)->delete();
        return back()->with("message","the id ::".$id."::deleted success");
    }

    public function edit($id){
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $discussion=m_discussion::where("diss_id",$id)->first();
        if($discussion==null){
            return redirect("discussion")->withErrors("discussion was not available");
        }

        $data["discussion"]=$discussion;
        $data["status"]=m_codes::getCodes(10);
        $status=m_codes::getCodes(10);
        foreach ($status as $st){
            $st->selected="";
            if($st->cd_id==$discussion->diss_status){
                $st->selected="selected";
            }
            $data["status"]=$status;
        }
            return view("discussions.edit_dis",$data);
    }

    public function editdi($id,request $request){

        $this->validate($request, [
            'status'=>'required:discussion_tb,diss_status'.$id.'diss_id',
            'Name'=> 'required:discussion_tb,diss_name'.$id.'diss_id',
            'description'=> 'required:discussion_tb,diss_description'.$id.'diss_id',
        ]);

        $discussion=m_discussion::where("diss_id",$id)->first();
        if($discussion==null){
            return redirect("discussion")->withErrors("discussion wan bot available");
        }

        $input=$request->input();
        $discussion=new m_discussion();
        $discussion->diss_status=$input["status"];
        $discussion->diss_name=$input["Name"];
        $discussion->diss_description=$input["description"];
        $discussion->diss_project_id=1;
        $discussion->diss_created_by=Auth::id();
        $discussion->save();
        return redirect("discussion");
    }

    public function info($id){

        $discussion=m_discussion::where("diss_id",$id)->first();

        if($discussion->diss_status ==$this->discussion_new  ){
            $discussion->diss_status = $this->discussion_open;
            $discussion->save();
        }
        $data["discussion"] = $discussion;

        $data["comments"]=m_comments::where("c_entity_id",$id)->where("c_entity_type",4)->get();
        $data["comment_status"]=m_codes::getCodes("12");

        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();

        $data["closed_comment"] = $data["discussion"]->diss_status == $this->discussion_closed ? "d-none":"";


        $data["attachments"]=m_Attachments::where("attach_entity_id",$id)
            ->where("attach_entity_type" , 4)->get();


        $data["entity_type"]=4;
        $data["entity_id"]=$id;

        return view("discussions.info",$data);

    }
}



