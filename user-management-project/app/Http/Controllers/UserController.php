<?php

namespace App\Http\Controllers;

use App\Models\ComUser;
use App\Models\User;
use Facade\FlareClient\View;
use GuzzleHttp\Promise\Is;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PharIo\Manifest\Email;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use Whoops\Run;

use function GuzzleHttp\Promise\settle;
use function Opis\Closure\serialize;

class UserController extends Controller
{
    public function index(){
        return view('pages.user.loginpage');
    }

    public function allUsers(){
        $allUsers = ['allusers' =>ComUser::all()];
        return view('pages.user.alluser', $allUsers);
    }
    public function userRegister (){
        return view('pages.user.userregister');
    }

    public function userProfile(){
        $userData = ['userInfor'=>ComUser::where('id', "=", session("Authorization"))->first()];
        return view('pages.user.userprofile', $userData);
    }

    public function updateUser(){
        $userData = ['userInfor'=>ComUser::where('id', "=", session("Authorization"))->first()];
        return view('pages.user.accountUpdate', $userData);
    }

    public function resetPassword(){
        return view('pages.user.resetPassword');
    }

    // protected $user;

    // public function __construct()
    // {
    //     $this->user = new ComUser();
    // }



    public function register(Request $request){
            $request->validate([
                "fname" => "required",
                "lname" => "required",
                "email" => "required|email|unique:users",
                "dob" => "required",
                "Gender" =>  "required",
                "password" => "required|min:6",
                "cpassword" => "required|min:6|same:password",
            ],

            [
                "fname.required" => "First Name Required",
                "lname.required" => "Last Name Required",
                "email.required" => "Email Required",
                "email.unique" => "Email Already Exists",
                "email.email" => "Email Not Valid",
                "dob.required" => "Date of Birth Required",
                "gender.required" => "Gender Required",
                "password.required" => "Password Required",
                "cpassword.required" => "Confirm Password Required",
                "cpassword.same" => "Confirm Password not Match"

            ]
        );

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = ComUser::create($input);

        if($user){
            return back()->with('success',"Registration Successfully...!")->withInput();
        }else{
            return back()->with('fail',"Something Went Wrong....!")->withInput();

        }


    }

    public function userlogin(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6",
        ],
        [
            "email.required" => "Email Required",
            "password.required" => "Password Required"
        ]);

        $userData = ComUser::where("email","=", $request->email)->first();

        if($userData){
            $isMatch = Hash::check($request->password, $userData->password);
            if($isMatch){
                $request->session()->put("Authorization", $userData->id);
                return redirect("/home");

            }else{
                return back()->with('fail',"Incorrect Password...!");
            }
        }else{
            return back()->with('fail',"User Account Not Found...!");
        }

    }

    public function userlogout(){
        if(session()->has("Authorization")){
            session()->remove("Authorization");
            return redirect("/");
        }
    }

    public function userdelete(){
        if(session()->has("Authorization")){
            $res = ComUser::where("id", "=", session("Authorization"))->delete();
            if($res){
                return redirect("/");
            }else{
                return back()->with('fail',"Something Went wrong...!");

            }
        }
    }

    public function userUpdate(Request $request){
        if(session()->has("Authorization")){
            $id = session("Authorization");

            $user = ComUser::find($id);

            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->dob = $request->input('dob');
            $user->Gender = $request->input('Gender');
            $res = $user->update();

            if($res){
                return redirect("/userProfile")->with('success',"Account updated...!");
            }else{
                return back()->with('fail',"Something went wrong...!");
            }
        }
    }

    public function passwordReset(Request $request){

    if(session()->has("Authorization")){
        $request->validate([
            "currentPassword" => "required|min:6",
            "password" => "required|min:6",
            "cpassword" => "required|min:6|same:password",
        ]
    );

    $user = ComUser::find(session("Authorization"));

    $isMatch = Hash::check($request->currentPassword, $user->password);

        if($isMatch){
                if(!($request->currentPassword === $request->password)){
                    $hashPassword = Hash::make($request->password);
                    $user->password = $hashPassword;

                    $user->update();

                    return redirect("/userProfile")->with('success',"Password Reset Success...!");

                }else{
                    return back()->with('fail',"Current and New both Passwords are Same...!");
                }
            }else{
                return back()->with('fail',"Current Password Incorrect...!");
            }
        }else{
            return redirect("/")->with('fail',"Login required...!");
        }
    }

}
;
