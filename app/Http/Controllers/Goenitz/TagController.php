<?php

namespace App\Http\Controllers\Goenitz;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Tag::all();
        return view('goenitz.tag.index',[
            'tags'=>$tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goenitz.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TagRequest $request)
    {
        $input=$request->all();
        $tag=Tag::create($input);
        return redirect()->action('Goenitz\TagController@index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag=Tag::findOrFail($id);
        return view('goenitz.tag.edit',[
            'tag'=>$tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\TagRequest $request, $id)
    {
        $tag=Tag::findOrFail($id);
        $input=$request->all();
        $tag->update($input);
        return redirect()->action('Goenitz\TagController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->action('Goenitz\TagController@index');
    }
}
