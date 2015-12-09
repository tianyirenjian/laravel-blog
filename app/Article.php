<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $dates=['delete_at'];
    protected $fillable=['title','slug','content','password','password_hint'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //获取密码，如果密码不包含英文逗号，在首尾添加一个英文逗号
    public function getPasswordAttribute()
    {
        $password=$this->attributes['password'];
        if($password==null||$password==','){
            return null;
        }else{
            if(strlen($password)){
                if(substr($password,0,1)!=','){
                    $password=','.$password;
                }
                if(substr($password,-1)!=','){
                    $password=$password.',';
                }
                return $password;
            }else{
                return null;
            }
        }
    }
}
