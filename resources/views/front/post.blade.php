@extends('front.template')
@section('title')
<title>{{ $article->title }} - {{ $setting->webname or '' }}</title>
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
                                    <a href="{{ action('IndexController@showTag',$tag->name) }}"><span class="label label-primary"><i class="fa fa-tag"> </i> {{ $tag->name }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="post-content">
                            @if(!$article->password || (\Session::get('passed_'.$article->id)))
                            {!! Markdown::convertToHtml($article->content) !!}
                            <div style="margin-bottom: 10px;padding-bottom: 15px;"></div>
                            <!-- 多说评论框 start -->
                                <div class="ds-thread" data-thread-key="{{ $article->id }}" data-title="{{ $article->title }}" data-url="http://www.goenitz.xyz/post/{{ $article->slug }}"></div>
                            <!-- 多说评论框 end -->
                            <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
                            <script type="text/javascript">
                            var duoshuoQuery = {short_name:"{{ $setting->duoshuo_key or '' }}"};
                                (function() {
                                    var ds = document.createElement('script');
                                    ds.type = 'text/javascript';ds.async = true;
                                    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                                    ds.charset = 'UTF-8';
                                    (document.getElementsByTagName('head')[0] 
                                     || document.getElementsByTagName('body')[0]).appendChild(ds);
                                })();
                                </script>
                            <!-- 多说公共JS代码 end -->
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
            @include('front.sidebar')
        </div>
    </div>
</div>
@stop
