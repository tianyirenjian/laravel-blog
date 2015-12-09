@extends('goenitz.goenitz')
@section('title')
    <title>更新文章</title>
    <link rel="stylesheet" type="text/css" href="/markdown/editor.css">
    <style type="text/css">
    .CodeMirror{
        height:250px;
    }
    .editor-preview img{
        max-width: 100%;
        height: auto!important;
    }
    </style>
@stop
@section('content')
    <div class="content-header">
        <h1>更新文章</h1>
    </div>
    <div class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">更新文章: {{ $article->title }}</div>
                <div class="box-tools">
                    <a href="{!! action('Goenitz\ArticleController@index') !!}" class="btn btn-primary btn-xs">返回列表</a>
                </div>
            </div>
            <div class="box-body">
                {!! Form::model($article,['url'=>action('Goenitz\ArticleController@update',$article)]) !!}
                {!! Form::hidden('_method','put') !!}
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group<?php if($errors->has('title')){ echo " has-error"; }?>">
                            {!! Form::label('title','标题:') !!}
                            {!! Form::text('title',null,['class'=>'form-control input-sm']) !!}
                            <p class="help-block">{{ $errors->first('title') }}</p>
                        </div>
                        <div class="form-group<?php if($errors->has('slug')){ echo " has-error"; }?>">
                            {!! Form::label('slug','文件名:') !!}
                            {!! Form::text('slug',null,['class'=>'form-control input-sm']) !!}
                            <p class="help-block">{{ $errors->first('slug') }}</p>
                        </div>
                        <div class="form-group<?php if($errors->has('content')){ echo " has-error"; }?>">
                            {!! Form::label('content','内容:') !!}
                            {!! Form::textarea('content',null,['class'=>'form-control input-sm','rows'=>5]) !!}
                            <p class="help-block">{{ $errors->first('content') }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('tag_list[]','标签:') !!}
                            {!! Form::select('tag_list[]',$tags,$article->tags->lists('id')->all(),['class'=>'form-control tag_list','multiple'=>'multiple']) !!}
                        </div>
                        {!! Form::submit('更新',['class'=>'btn btn-success btn-sm']) !!}
                        {!! Form::reset('重置',['class'=>'btn btn-default btn-sm']) !!}
                    </div>
                    <div class="col-md-3">
                        <div class="form-group<?php if($errors->has('password')){ echo " has-error"; }?>">
                            {!! Form::label('password','密码:') !!}
                            {!! Form::text('password',null,['class'=>'form-control input-sm']) !!}
                            <p class="help-block"><i class="fa fa-info-circle"> </i> 可以设置多个密码，以英文逗号分隔</p>
                            <p class="help-block">{{ $errors->first('password') }}</p>
                        </div>
                        <div class="form-group<?php if($errors->has('password_hint')){ echo " has-error"; }?>">
                            {!! Form::label('password_hint','密码提示:') !!}
                            {!! Form::textarea('password_hint',null,['class'=>'form-control input-sm','rows'=>3]) !!}
                            <p class="help-block">{{ $errors->first('password_hint') }}</p>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('script')
<script src="/markdown/editor.js"></script>
<script src="/markdown/marked.js"></script>
<script>
$(function(){
    $(".tag_list").select2();
    var editor=new Editor();
    editor.render();
});
</script>
@stop