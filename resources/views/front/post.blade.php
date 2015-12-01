@extends('front.template')
@section('title')
    <title>{{ $article->title }}</title>
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="posts col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <article class="post">
                        <h3>
                            {{ $article->title }}
                        </h3>
                        <ul class="post-meta clearfix">
                            <li class="post-date" title="{{ $article->created_at }}">
                                <i class="fa fa-clock-o"> </i> <?php
                                $date=new \Date($article->created_at);
                                echo $date->ago();
                                ?></li>
                            @foreach($article->tags as $tag)
                                <li>
                                    <a href="{{ action('IndexController@showTag',$tag->name) }}"><span class="label label-default"><i class="fa fa-tag"> </i> {{ $tag->name }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="post-content">
                            @if(!$article->password || (\Session::get('passed_'.$article->id)))
                            {!! Markdown::convertToHtml($article->content) !!}
                            <div style="margin-bottom: 10px;padding-bottom: 15px;"></div>
                            <!-- UY BEGIN -->
                            <div id="uyan_frame"></div>
                            <script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=1679714"></script>
                            <!-- UY END -->
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Form::open(['url'=>action('IndexController@show',$article->slug),'class'=>'form-inline']) !!}
                                    <div class="form-group<?php if($errors->has('password')&&$errors->first('id')==$article->id){ echo ' has-error';}?>">
                                        {!! Form::label('password','密码：') !!}
                                        {!! Form::text('password',null,['class'=>'form-control input-sm']) !!}
                                        {!! Form::submit('查看',['class'=>'btn btn-primary btn-sm']) !!}
                                        @if($errors->has('password')&&$errors->first('id')==$article->id)
                                        <p class="help-block">{{ $errors->first('password') }}</p>
                                        @endif
                                        <p class="help-block">{{ $article->password_hint }}</p>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            @endif
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="/search">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control input-sm" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-sm" type="submit">搜索</button>
                        </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tags panel panel-default">
                <div class="panel-body">
                    <nav>
                        <ul class="nav">
                            @foreach($tags as $tag)
                                <li>
                                    <a href="{{ action('IndexController@showTag',$tag->name) }}">{{ $tag->name }} ({{ $tag->articles->count() }})</a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@stop