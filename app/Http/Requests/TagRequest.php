<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagRequest extends Request
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
            $id=$this->route()->parameters()['tags'];
            return [
                'name'=>'required|max:255|unique:tags,name,'.$id
            ];
        } else {
            return [
                'name'=>'required|max:255|unique:tags'
            ];
        }
    }

    public function attributes()
    {
        return [
            'name'=>'名称'
        ];
    }
}
