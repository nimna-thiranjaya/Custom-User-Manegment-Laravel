<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComUser extends Model
{
    use HasFactory;

    protected $fillable = [
        "fname",
        "lname",
        "email",
        "dob",
        "Gender",
        "password",
    ];
}
