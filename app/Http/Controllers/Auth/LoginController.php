<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\m_user;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function verifyLogin(Request $request){

        $input = $request->input();
        //dd($input);
        $auth_data["u_email"] = $input["username"];
        $auth_data["u_password"] = $input["password"];
        $user = m_user::where($auth_data)->first();

        if($user != null){
            Auth::login($user);
           // dd($user);
            return redirect("dashboards")->with("message" , "Welcome ". $user->u_firstname);
        }else{
            return back()->withErrors("login failed");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect("/");
    }

   /* public function username(){
        return "u_email";
    }*/
}
