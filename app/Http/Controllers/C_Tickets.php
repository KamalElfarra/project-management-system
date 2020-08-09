<?php

namespace App\Http\Controllers;

use App\Models\m_Attachments;
use App\Models\m_codes;
use App\Models\m_comments;
use App\Models\m_project;
use App\Models\m_tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Tickets extends Controller
{

    private $ticket_closed = 51;
    private $ticket_new = 48;
    private $ticket_open = 49;

    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            //Group 1 :: admin
            if(!empty($user->group->privileges()->tickets->nav) ){
                return redirect("/")->withErrors("You do not has Permissions");
            }else{
                return $next($request);
            }
        });
    }

    public function manage(){

        $data["user_privileges"] = Auth::user()->group->privileges();
        $data["status"]=m_codes::getCodes(8);
        $data["type"]=m_codes::getCodes(9);
        $data["tickets"]=m_tickets::all();

        switch (Auth::user()->u_group){
            case 1:
                $tickets=m_tickets::all();
                break;
            case 2:
            case 5:
                $tickets = m_tickets::join('project_team_tb', 'tic_project_id', '=', 'project_team_tb.t_p_id')
                    ->where("project_team_tb.t_u_id" , Auth::id())
                    ->get();
                break;

            case 4:
                $tickets = m_tickets::where("tic_created_by", Auth::id())->get();
                break;
        }

        foreach($tickets as $t){
            $t->closed = ($t->tic_status == $this->ticket_closed) ? "d-none" : "";
        }
        $data["tickets"]= $tickets;

        return view('tickets.tickets_all',$data);

    }

    public function delete($id){
        $ticket=m_tickets::where("tic_id",$id)->first();
        $data["ticket"]=$ticket;
        return view("tickets.delete_tickets",$data);
    }

    public function deleteticket(request $request){
        $input=$request->input();
        $id=$input["ticket_id"];
        m_tickets::where("tic_id",$id)->delete();
        return back()->with("message","the ticket with id ::".$id."::deleted successful");
    }

    public function edit($id){
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $ticket=m_tickets::where("tic_id",$id)->first();
        if($ticket==null){
            return redirect("ticket")->withErrors("ticket is null");
        }

        $data["ticket"]=$ticket;
        $data["status"]=m_codes::getCodes(8);
        $data["type"]=m_codes::getCodes(9);
        $status=m_codes::getCodes(8);

        foreach ($status as $st){
            $st->selected="";
            if($st->cd_id==$ticket->tic_status){
                $st->selected="selected";
            }
            $data["status"]=$status;
        }

        $type=m_codes::getCodes(9);
        foreach ($type as $ty){
            $ty->selected="";
            if($ty->cd_id==$ticket->tic_type){
                $ty->selected="selected";
            }
            $data["type"]=$type;
        }
        return view("tickets.edit_ticket",$data);

    }
    public function editti($id,request $request){

        $this->validate($request, [
            'status' => 'required:ticket_tb,tic_status'.$id.'tic_id',
            'type'=> 'required:ticket_tb,tic_type'.$id.'tic_id',
            'subject'=> 'required:ticket_tb,tic_subject'.$id.'tic_id',
            'description'=> 'required:ticket_tb,tic_description'.$id.'tic_id',
        ]);


        $ticket=m_tickets::where("tic_id",$id)->first();

        if($ticket==null){

            return redirect("message")->withErrors("ticket is not available");
        }

        $input=$request->input();

        $ticket= m_tickets::where("tic_id",$id)->first();

        $ticket->tic_status=$input["status"];
        $ticket->tic_type=$input["type"];
        $ticket->tic_subject=$input["subject"];
        $ticket->tic_description=$input["description"];
        $ticket->tic_project_id=1;
        $ticket->tic_created_by=Auth::id();
        $ticket->tic_groub=1;
        $ticket->tic_Assigned_to=1;


        $ticket->save();

        return redirect("ticket");

    }

    public function Add(request $request){

        $this->validate($request, [
            'status' => 'required:ticket_tb,tic_status',
            'type'=> 'required:ticket_tb,tic_type',
            'subject'=> 'required:ticket_tb,tic_subject',
            'description'=> 'required:ticket_tb,tic_description',
        ]);
            $input=$request->input();
            $file=$request->file();

            $ticket=new m_tickets();

            $ticket->tic_status=$input["status"];
            $ticket->tic_type=$input["type"];
            $ticket->tic_subject=$input["subject"];
            $ticket->tic_description=$input["description"];
            $ticket->tic_project_id=$input["project_id"];
            $ticket->tic_created_by=Auth::id();



            $ticket->save();

            return back();


    }

    public function info($id){

        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $ticket = m_tickets::where("tic_id",$id)->first();


        if($ticket->tic_status ==$this->ticket_new  && Auth::user()->u_group == 5 ){
            $ticket->tic_status = $this->ticket_open;
            $ticket->save();
        }
        $data["ticket"]= $ticket;

        $data["comments"]=m_comments::where("c_entity_id",$id)->where("c_entity_type",3)->get();
        $data["comment_status"]=m_codes::getCodes("12");

        $data["closed_comment"] = $data["ticket"]->tic_status == $this->ticket_closed ? "d-none":"";

        $data["attachments"]=m_Attachments::where("attach_entity_id",$id)
            ->where("attach_entity_type" , 3)->get();


        $data["entity_type"] =3;
        $data["entity_id"] = $id;

        return view("tickets.info",$data);


    }

}
