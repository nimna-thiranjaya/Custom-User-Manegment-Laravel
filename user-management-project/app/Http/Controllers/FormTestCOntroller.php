<?php

namespace App\Http\Controllers;

use App\Models\UserSignature;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Name\FullyQualified;

class FormTestCOntroller extends Controller
{
    public function testForm(){
        return view("pages.form-test.signature");
    }

    public function sendEMail(){
        return view("pages.sendemail.sendemail");
    }

    // public function emailSend(){
    //     $details = [
    //         'title' => 'Sample Mail Title',
    //         'body' => 'My name is Nimna'
    //     ];

    //     Mail::to('nimnathiranjaya523@gmail.com')->send(new \App\Mail\MyTestMail($details));

    //     dd("Email is Sent.");
    // }

    public function saveSignature(Request $request){

            $request->validate([
                "file_one" => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            ]);



            if ($request->hasFile('file_one')) {
                $file = $request->file('file_one');
                $path = "uploads/";
                $uploaded = $file->move(public_path($path),"Nimna".'.'.$file->getClientOriginalExtension());
            }


            dd($request);

    }
}
