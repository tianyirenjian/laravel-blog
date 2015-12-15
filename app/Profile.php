<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=['nickname','avatar','website','weibo','github','city','intro'];
}
