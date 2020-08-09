<?php

namespace App\Http\Controllers;

use App\Models\m_configoration;
use App\Models\m_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Configoration extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function manage(){
        $data["login"] = Auth::user();
        $data["user_privileges"] = Auth::user()->group->privileges();
        $data["conf"] = m_configoration::first();
        return view('configorations.configoration' , $data);

    }



    public function save_edit(Request $request){
        $conf= m_configoration::first();
        $conf->app_name = $request->input("app_name");
        $conf->app_short_name = $request->input("app_abbrev");
        $conf->app_copyrights_text = $request->input("copyrights");

        $files = $request->file();
        if (isset($files["app_logo"])) {
            $app_logo = $files["app_logo"];
            $imageName = 'logo.' . $app_logo->getClientOriginalExtension();
            $app_logo->move(public_path('/uploads/logo'), $imageName);
            $conf->app_logo = '/uploads/logo/' . $imageName;
        }
        $conf->save();
        return back()->with("msg" , "Configuration updated successfully");
    }
}
