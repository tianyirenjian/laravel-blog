<?php

namespace App\Http\Controllers\Goenitz;

use App\Link;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::all();
        return view('goenitz.links.index', [
            'links' => $links
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $next_sort = \DB::table('links')->max('sort');
        return view('goenitz.links.create', [
            'next_sort' => $next_sort + 1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\LinkRequest $request)
    {
        $input = $request->all();
        Link::create($input);
        return redirect(action('Goenitz\LinkController@index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $link = Link::findOrFail($id);
        return view('goenitz.links.edit',[
            'link' => $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\LinkRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\LinkRequest $request, $id)
    {
        $link = Link::findOrFail($id);
        $input = $request->all();
        $link->update($input);
        return redirect(action('Goenitz\LinkController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Link::destroy($id);
        return redirect(action('Goenitz\LinkController@index'));
    }
}
