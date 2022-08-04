<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSignature extends Model
{
    use HasFactory;

    protected $fillable = [
        "full_name",
        "signed",
        "user_id",
    ];
}
