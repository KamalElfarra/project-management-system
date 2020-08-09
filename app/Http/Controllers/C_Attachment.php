<?php

namespace App\Http\Controllers;

use App\Models\m_Attachments;
use App\Models\m_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Attachment extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function manage(){
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $data["attachments"]=m_Attachments::all();


        return view("Attachments.attachment_table",$data);

    }

    public function Add(request $request)
    {

        $entity_types[1] ="projects";
        $entity_types[2] ="tasks";
        $entity_types[3] ="tickets";
        $entity_types[4] ="discussions";
        $entity_types[5] ="comments";

        $input=$request->input();
        $files = $request->file();

        $entity_name=$entity_types[$input["entity_type"]];
        $entity_id = $input["entity_id"];

        $entity_path = public_path('/uploads/'.$entity_name);
        $attach_path = public_path('/uploads/'.$entity_name.'/'.$entity_id);

        if(!file_exists($entity_path)) {
            mkdir($entity_path);
        }

        if(!file_exists($attach_path)) {
            mkdir($attach_path);
        }

        if (isset($files["attachment"])) {

            $attachment_file = $files["attachment"];

            $imageName = time() . "." .$attachment_file->getClientOriginalExtension();
            $attachment_file->move($attach_path, $imageName);

            //store in db
            $attachment = new m_Attachments();
            $attachment->attach_file_name = $imageName;
            $attachment->attach_path = $attach_path;
            $attachment->attach_extension = $attachment_file->getClientOriginalExtension();

            $attachment->attach_entity_type=$input["entity_type"];
            $attachment->attach_entity_id=$input["entity_id"];
            $attachment->attach_Name=$input["Name"];
            $attachment->attach_by=Auth::id();


            $attachment->save();


        }

        return back();

    }


    public function  download($attach_id){

        $attach = m_Attachments::where("attach_id" , $attach_id)->first();

        return response()->download($attach["attach_path"] ."/"
            .$attach["attach_file_name"]);
    }

    public function delete($id){

        $attachment=m_Attachments::where("attach_id",$id)->first();
        $data["attachment"]=$attachment;

        return view("Attachments.delete",$data);

    }
    public function delete_attach(request $request){

        $input=$request->input();

        $id=$input["attach_id"];

        m_Attachments::where("attach_id",$id)->delete();

        return back()->with("message","attachment with id ::".$id.":: was deleted successful");

    }

}

