<?php

namespace App\Http\Controllers\Goenitz;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller
{
    public function index(){
        return view('goenitz.setting.index');
    }

    public function update(Requests\SettingRequest $request,$id){
        $setting=Setting::findOrFail($id);
        //$setting->fill(\Request::all());
        //return ['ok'=>$setting->save()];
        return ['ok'=>$setting->update($request->all())];
    }

    public function store(Requests\SettingRequest $request){
        return ['ok'=>!!Setting::create($request->all())];
    }

    public function getData(){
        return Setting::all();
    }

    public function destroy($id){
        return ['ok'=>Setting::destroy($id)];
    }
}
