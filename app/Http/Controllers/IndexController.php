<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;
use App\Setting;

class IndexController extends Controller
{
    private $tags;
    private $setting;

    public function __construct()
    {
        $this->tags=Tag::with(['articles'=>function($query){
            $query->select('id');
        }])->get();
        $this->setting=Setting::first();

        /*$this->tags=Tag::select([
            'tags.*',
            \DB::raw('ifnull(count(article_tag.tag_id),0) as count')
        ])->join('article_tag','tags.id','=','article_tag.tag_id')
        ->join('articles','articles.id','=','article_tag.article_id')
        ->where('articles.deleted_at',null)
        ->groupBy('article_tag.tag_id')
        ->get();*/
    }

    public function index()
    {
        $articles=Article::with('tags')->latest()->paginate(5);
        return view('front.index',[
            'articles'=>$articles,
            'tags'=>$this->tags,
            'setting'=>$this->setting
        ]);
    }

    public function show($slug)
    {
        $article=Article::with('tags')->where('slug',$slug)->first();
        if(!$article){
            abort(404);
        }else{
            if(\Request::method()=='GET'){
                return view('front.post',[
                    'article'=>$article,
                    'tags'=>$this->tags,
                    'setting'=>$this->setting
                ]);
            }else{
                //判断密码
                $validator=\Validator::make(\Request::all(),[
                    'password'=>'required|max:255'
                ],[],[
                    'password'=>'密码'
                ]);
                //为错误信息添加id，防止前台多个密码区域显示错误
                $validator->after(function($validator) use($article){
                    if($validator->errors()->has('password')){
                        $validator->errors()->add('id',$article->id);
                    }
                });
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator->errors());
                }
                $password=\Request::get('password');
                if(strstr($article->password,','.$password.',')>-1){
                    \Session::set('passed_'.$article->id,true);
                    return redirect()->action('IndexController@show',$article->slug);
                }else{
                    $validator->errors()->add('password','密码不匹配！');
                    $validator->errors()->add('id',$article->id);
                    return redirect()->back()->withErrors($validator->errors());
                }
            }
        }
    }

    public function showTag($name)
    {
        $tag=Tag::with('articles')->where('name',$name)->first();
        if(!$tag){
            abort(404);
        }else{
            $articles=$tag->articles()->latest()->paginate(5);
            return view('front.tag',[
                'tag'=>$tag,
                'articles'=>$articles,
                'tags'=>$this->tags,
                'setting'=>$this->setting
            ]);
        }
    }
}
