<?php

namespace App\Http\Controllers;

use App\Models\m_codes;
use App\Models\m_comments;
use App\Models\m_Attachments;
use App\Models\M_Comments_Reply;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class C_Comments extends Controller {

    public function __construct() {
        $this->middleware("auth");
    }

    public function manage() {
        $data["comments"] = m_comments::all();
        return view('projects.info', $data);
    }

    public function Add(request $request) {

        $input = $request->input();
        $file = $request->file();
//dd($file);
        $comment = new m_comments();

        $comment->c_comment = $input["comment"];
        $comment->c_entity_id = $input["entity_id"];
        $comment->c_entity_type = $input["entity_type"];
        $comment->c_created_by = Auth::id();
        // $comment->updated_at=1;

        $comment->save();
        $this->addAttachment($file, 5, $comment->c_id, "");





        return back();
    }

    public function createDirectoryIfNotExists($dirPath) {
        if (!File::exists($dirPath)) {
            File::makeDirectory($dirPath, $mode = 0777, true, true);
        }
    }

    function addAttachment($file, $entity_type, $entity_id, $Name) {

        $entity_types[1] = "projects";
        $entity_types[2] = "tasks";
        $entity_types[3] = "tickets";
        $entity_types[4] = "discussions";
        $entity_types[5] = "comments";

        //$this->crateDiritoryIfNotExists(public_path('/uploads/'));
        //$this->crateDiritoryIfNotExists(public_path('/uploads/'. $entity_types[$entity_type].'/'));

        $attach_path = public_path('/uploads/' . $entity_types[$entity_type] . '/');


        if (isset($file["attachment"])) {

            $attachment_file = $file["attachment"];

            $imageName = $entity_id . '_' . "." . $attachment_file->getClientOriginalExtension();
            $attachment_file->move($attach_path, $imageName);

            //store in db
            $attachment = new m_Attachments();
            $attachment->attach_file_name = $imageName;
            $attachment->attach_path = $attach_path;
            $attachment->attach_extension = $attachment_file->getClientOriginalExtension();

            $attachment->attach_entity_type = $entity_type;
            $attachment->attach_entity_id = $entity_id;
            $attachment->attach_Name = $Name;
            $attachment->attach_by = Auth::id();


            $attachment->save();
        }
    }

    public function search() {
        
    }

    public function delete($id) {

        $comment = m_comments::where("c_id", $id)->first();

        $data["comment"] = $comment;

        return view("comments.delete_com", $data);
    }

    public function delete_comment(request $request) {

        $input = $request->input();


        $id = $input["comment_id"];
        M_Comments_Reply::where("cr_comment_id", $id)->delete();
        m_comments::where("c_id", $id)->delete();

        return back()->with("message", "the comments with id ::" . $id . ":: was deleted successful");
    }

    public function edit($id) {
        $data["user_privileges"] = Auth::user()->group->privileges();

        $comment = m_comments::where("c_id", $id)->first();

        if ($comment == null) {

            return redirect("comment")->withErrors("comment was not Available");
        }

        $data["comment"] = $comment;

        return view("comments.edit_comment", $data);
    }

    public function edit_comm($id, request $request) {
        $comment = m_comments::where("c_id", $id)->first();
        if ($comment == null) {
            return redirect("message")->withErrors("comment was not available");
        }
        $input = $request->input();
        $comment = m_comments::where("c_id", $id)->first();
        $comment->c_comment = $input["comment"];
        $comment->c_created_by = Auth::id();
        $comment->save();

        $entity_name = "";
        switch ($comment->c_entity_type) {
            case 1:
                $entity_name = "project";
                break;
            case 2:
                $entity_name = "task";
                break;
            case 3:
                $entity_name = "ticket";
                break;
            case 4:
                $entity_name = "discussion";
                break;
        }
        return Redirect::to("/" . $entity_name . "/info/" . $comment->c_entity_id);
    }

    public function reply($comment_id) {
        $data["comment_id"] = $comment_id;
        return view("comments.reply" , $data);
        
    }

    public function reply_comm(Request $request) {
        $reply = new M_Comments_Reply();

        $reply->cr_user_id = Auth::id();
        $reply->cr_comment_id = $request->input("comment_id");
        $reply->cr_reply = $request->input("comment");
        $reply->save();

        return back();

    }



    public function reply_delete($id) {

        $comment = M_Comments_Reply::where("cr_id", $id)->first();

        $data["comment"] = $comment;

        return view("comments.delete_reply", $data);
    }

    public function reply_delete_confirmation(request $request) {

        $input = $request->input();


        $id = $input["reply_id"];

        M_Comments_Reply::where("cr_id", $id)->delete();

        return back()->with("message", "the comments with id ::" . $id . ":: was deleted successful");
    }


}
