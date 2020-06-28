<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    protected $table = "postview";
    protected $fillable = [
        "message",
        "user_id"
    ];

}
