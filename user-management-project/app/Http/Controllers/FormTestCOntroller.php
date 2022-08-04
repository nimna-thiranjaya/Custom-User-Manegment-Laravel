<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormTestCOntroller extends Controller
{
    public function testForm(){
        return view("pages.form-test.signature");
    }

    public function saveSignature(Request $request){

        dd($request->input());
    }
}
