<?php

use App\Http\Controllers\FormTestCOntroller;
use Illuminate\Support\Facades\Route;

Route::get("/testForm", [FormTestCOntroller::class, "testForm"])->name('testForm');


Route::post("/saveSignature", [FormTestCOntroller::class, "saveSignature"])->name('formtest.saveSignature');
