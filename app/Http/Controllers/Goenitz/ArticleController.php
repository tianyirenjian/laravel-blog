<?php

namespace App\Http\Controllers\Goenitz;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::with('tags')->latest()->paginate(10);
        return view('goenitz.article.index',[
            'articles'=>$articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::lists('name','id');
        return view('goenitz.article.create',[
            'tags'=>$tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ArticleRequest $request)
    {
        $article=Article::create($request->all());
        $article->tags()->sync($request->get('tag_list',[]));
        return redirect()->action('Goenitz\ArticleController@index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $tags=Tag::lists('name','id');
        return view('goenitz.article.edit',[
            'article'=>$article,
            'tags'=>$tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ArticleRequest $request, $id)
    {
        $article=Article::findOrFail($id);
        $article->update($request->all());
        $article->tags()->sync($request->get('tag_list',[]));
        return redirect()->action('Goenitz\ArticleController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->action('Goenitz\ArticleController@index');
    }
}
