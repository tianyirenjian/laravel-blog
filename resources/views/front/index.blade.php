@extends('front.template')
@section('title')
@if(isset($tag))
<title>标签:{{ $tag->name }} - {{ $setting->webname }}</title>
@elseif(isset($query))
<title>搜索:{{ $query }} - {{ $setting->webname }}</title>
@else
<title>{{ $setting->webname }}</title>
<meta name="keywords" content="{{ $setting->keywords }}">
<meta name="description" content="{{ $setting->description }}">
@endif
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="posts col-md-9">
            @forelse($articles as $article)
            <div class="panel panel-default">
                <div class="panel-body">
                    <article class="post">
                        <h3>
                            <a href="{{ action('IndexController@show',$article->slug) }}">{{ $article->title }}</a>
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
            @empty
                <div class="panel panel-default">
                    <div class="panel-body">暂无内容。</div>
                </div>
            @endforelse
            {!! $articles->render() !!}
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
