<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method()=='PUT') {
            $id=$this->route()->parameters()['articles'];
            return [
                'title'=>'required|max:255',
                'slug'=>'required|max:255|unique:articles,slug,'.$id,
                'content'=>'required',
                'password'=>'max:255',
                'password_hint'=>'max:255'
            ];
        } else {
            return [
                'title'=>'required|max:255',
                'slug'=>'required|max:255|unique:articles',
                'content'=>'required',
                'password'=>'max:255',
                'password_hint'=>'max:255'
            ];
        }
    }

    public function attributes()
    {
        return [
            'title'=>'标题',
            'slug'=>'文件名',
            'content'=>'文章内容',
            'password'=>'密码',
            'password_hint'=>'密码提示'
        ];
    }
}
