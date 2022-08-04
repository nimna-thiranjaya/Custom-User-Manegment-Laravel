<?php

namespace App\Http\Controllers;

use App\Models\UserSignature;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Name\FullyQualified;

class FormTestCOntroller extends Controller
{
    public function testForm(){
        return view("pages.form-test.signature");
    }

    public function saveSignature(Request $request){
        // $userid = Session("Authorization");

        // if($userid){

        //     $request->validate([
        //         "full_name" => "required",
        //         "signed" => "required",
        //         "user_id" => "required"
        //     ]);

        //     if($request->signed){

        //         $input = $request->all();
        //         $input = $userid;
        //         $result = UserSignature::create($input);

        //         if($result){
        //             return Redirect("/userProfile")->with("success","Signature saved successfully...!");
        //         }else{
        //             return Redirect("/userProfile")->with("fail","Something Went Wrong...!");
        //         }
        //     }else{
        //         return back()->with("fail","Please add your Signature...!");
        //     }

        // }else{
        //     return Redirect("/")->with("fail","Please Login...!");
        // }
        dd($request);
    }
}
