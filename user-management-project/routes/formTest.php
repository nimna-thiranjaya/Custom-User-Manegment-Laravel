<?php

use App\Http\Controllers\FormTestCOntroller;
use Illuminate\Support\Facades\Route;

Route::get("/testForm", [FormTestCOntroller::class, "testForm"])->name('testForm');
Route::get("/sendEMail", [FormTestCOntroller::class, "sendEMail"])->name('sendEMail');


Route::post("/saveSignature", [FormTestCOntroller::class, "saveSignature"])->name('formtest.saveSignature');
// Route::get("emailSend", [FormTestCOntroller::class, "emailSend"])->name('formtest.emailSend');
