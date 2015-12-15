<?php

namespace App\Http\Controllers\Goenitz;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index(){
        $user=User::firstOrFail();
        return view('goenitz.user.index',[
            'user'=>$user
        ]);
    }

    public function update($id)
    {
        $input = \Request::all();
        if(isset($input['password']) & $input['password']!=''){
            $input['password']=bcrypt($input['password']);
        }else{
            unset($input['password']);
        }
        $user=User::firstOrFail();
        $user->update($input);
        $user->profile->update($input);
        return redirect(action('Goenitz\UserController@index',$user));
    }
}
