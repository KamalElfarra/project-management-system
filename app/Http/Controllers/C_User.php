<?php

namespace App\Http\Controllers;

use App\Models\m_codes;
use App\Models\m_file;
use App\Models\m_group;
use App\Models\m_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_User extends Controller {

    public function __construct() {
        $this->middleware("auth");
        
        $this->middleware(function ($request, $next) {
            $user = Auth::user();
            //Group 1 :: admin
            if($user->u_group !=1 ){
                return back()->withErrors("You are not Admin You do not has Permissions");
            }else{
                return $next($request);
            }
            
        });
    }

    public function view() {

        $data["language"] = m_codes::getCodes(2);
        $data["status"] = m_codes::getCodes(1);
        $data["groups"] = m_group::all();
        $data["user_privileges"] = Auth::user()->group->privileges();

        $users = m_user::all();
        $file = new m_file();
        $file->f_path = "uploads/users/images";
        $file->f_name = "avatar.jpg";

        foreach ($users as &$u) {
            if (!isset($u->image->f_name)) {
                $u->image = $file;
            }
        }


        $data["users"] = $users;
        //dd($data);

        return view('users.user', $data);
    }

    public function info($id) {


        $data["user"] = m_user::where("u_id", $id)->first();
        $data["user_privileges"] = Auth::user()->group->privileges();

        return view("users.info", $data);
    }

    public function change_view($id = 0) {

        if ($id == 0)
            $id = Auth::id();

        //return $id;
        $user = m_user::where("u_id", $id)->first();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $data["user"] = $user;

        return view("users.change_password", $data);
    }

    public function change_password(Request $request) {
        $input = $request->input();
        $user_id = $input["user_id"];
        if ($user_id == null) {
            return redirect("message")->withErrors("cant change password");
        }
        $user = m_user::where("u_id", $user_id)->first();
        $current_password = $user->u_password;
        $this->validate($request, [
            'password' => 'required| in:' . $current_password,
            'new_password' => 'required|different:password',
            're_password' => 'required|same:new_password'
                ], [
            "password.in" => "Error Old password",
            "new_password.required" => "New password Can not be empty",
            "new_password.different" => "Error new password equal the old password",
            "re_password.same" => "New password mismatch"
        ]);


        $user->u_password = $input["new_password"];
        $user->save();

        return redirect("user")->with("message", "password was changed successful");
    }

    public function add(Request $request) {
        if($request->input("access_group_sel") == 4){
            $this->validate($request, [
                'password' => 'required',
                're_password' => 'required|same:password',
                'email' => 'required|unique:user_tb,u_email',
            ]);
        }else{
            $this->validate($request, [
                'password' => 'required',
                're_password' => 'required|same:password',
                'email' => 'required|unique:user_tb,u_email',
                'employee_num' => 'required|unique:user_tb,u_employeenum'
            ]);
        }


        $input = $request->input();
        $files = $request->file();

        //TODO:check password validate
        //TODO:get created by id from login user id

        $user = new m_user();

        $user->u_active = $input["status_sel"];
        $user->u_group = $input["access_group_sel"];
        $user->u_firstname = $input["first_name"];
        $user->u_lastname = $input["last_name"];
        $user->u_employeenum = $input["employee_num"];
        $user->u_password = $input["password"];
        $user->u_email = $input["email"];
        $user->u_phone = $input["phone"];
        //$user->u_photo=$input["user_photo"];
        $user->u_language = $input["language_sel"];
        $user->u_createdby = Auth::id();

        $user->save();

        $user_id = $user->u_id;

        //   `u_photo`

        if (isset($files["user_photo"])) {
            /*
              request()->validate([
              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
              ]);
             */
            $user_photo = $files["user_photo"];
            $imageName = $user_id . '.' . $user_photo->getClientOriginalExtension();
            $user_photo->move(public_path('/uploads/users/images'), $imageName);

            $file = new m_file();
            $file->f_name = $imageName;
            $file->f_path = '/uploads/users/images';
            $file->f_extension = $user_photo->getClientOriginalExtension();
            // $file->f_size = $user_photo->getSize();
            //$file->f_size =-1;
            $file->f_upload_user = Auth::id();
            $file->save();

            $user->u_photo = $file->f_id;
            $user->save();
        }
//    return back()->withInput();
        return back();
    }

    public function edit($id) {

        $user = m_user::where("u_id", $id)->first();
        if ($user == null) {
            return redirect("user")->withErrors("User is not Available");
        }
        //dd($user->toArray());
        $data["user"] = $user;
        $data["user_privileges"] = Auth::user()->group->privileges();

        $language = m_codes::getCodes(2);
        foreach ($language as $la) {

            $la->selected = "";
            if ($la->cd_id == $user->u_language) {

                $la->selected = "selected";
            }
        }
         $data["language"] = $language;

        $status = m_codes::getCodes(1);
        foreach ($status as $st) {
            $st->selected = "";
            if ($st->cd_id == $user->u_active) {
                $st->selected = "selected";
            }
        }
        $data["status"] = $status;


        $groups = m_group::all();
        foreach ($groups as $g) {
            $g->selected = "";
            if ($g->g_id == $user->u_group) {
                $g->selected = "selected";
            }
        }



        $data["groups"] = $groups;

        //dd($groups->toArray());
        return view("users.edit_user", $data);
    }

    public function edituser($id, Request $request) {


        $this->validate($request, [
            're_password' => 'same:password',
            'email' => 'required|unique:user_tb,u_email,' . $id . ',u_id',
            'employee_num' => 'required|unique:user_tb,u_employeenum,' . $id . ',u_id'
        ]);


        $user = m_user::where("u_id", $id)->first();
        if ($user == null) {
            return redirect("user")->withErrors("User is not Available");
            ;
        }
        $input = $request->input();
        $files = $request->file();


        $user->u_active = $input["status_sel"];
        $user->u_group = $input["access_group_sel"];
        $user->u_firstname = $input["first_name"];
        $user->u_lastname = $input["last_name"];
        $user->u_employeenum = $input["employee_num"];
        if (!empty($input["password"])) {
            $user->u_password = $input["password"];
        }
        $user->u_email = $input["email"];
        $user->u_phone = $input["phone"];
        //$user->u_photo=$input["user_photo"];
        $user->u_language = $input["language_sel"];
        $user->u_createdby = Auth::id();

        $user->save();

        return redirect("user");
    }

    public function delete($user_id) {

        //TODO if there is any data belong to this user  do not delete
        $user = m_user::where("u_id", $user_id)->first();
        $data["user"] = $user;
        return view("users.delete", $data);
    }

    public function delete_confirmation(Request $request) {
        $input = $request->input();
        $user_id = $input["user_id"];
        if ($user_id == 1) {
            return back()->withErrors("Can not delete super user");
        }
        m_user::where("u_id", $user_id)->delete();
        return back()->with("message", "User with id ::" . $user_id . "::deleted Successfully");
    }

}
