<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinkRequest extends Request
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
        if ($this->method() == 'PUT') {
            $link = $this->route()->parameters()['links'];
            return [
                'name' => 'required|max:255',
                'url' => 'required|max:255|unique:links,url,'. $link,
                'sort' => 'integer'
            ];
        } else {
            return [
                'name' => 'required|max:255',
                'url' => 'required|max:255|unique:links',
                'sort' => 'integer'
            ];
        }
    }

    public function attributes()
    {
        return [
            'name' => '名称',
            'url' => '网址',
            'sort' => '排序'
        ];
    }
}
