@extends('goenitz.goenitz')
@section('title')
    <title>添加文章</title>
    <link rel="stylesheet" href="/bootstrap-markdown/css/bootstrap-markdown.min.css">
@stop
@section('content')
    <div class="content-header">
        <h1>添加文章</h1>
    </div>
    <div class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">添加文章</div>
                <div class="box-tools">
                    <a href="{!! action('Goenitz\ArticleController@index') !!}" class="btn btn-primary btn-xs">返回列表</a>
                </div>
            </div>
            <div class="box-body">
                {!! Form::open(['url'=>action('Goenitz\ArticleController@store')]) !!}
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
                            {!! Form::textarea('content',null,['class'=>'form-control input-sm']) !!}
                            <p class="help-block">{{ $errors->first('content') }}</p>
                        </div>
                        <div class="form-group">
                            {!! Form::label('tag_list[]','标签:') !!}
                            {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control tag_list','multiple'=>'multiple']) !!}
                        </div>
                        {!! Form::submit('添加',['class'=>'btn btn-primary btn-sm']) !!}
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
<script src="/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="/bootstrap-markdown/locale/bootstrap-markdown.zh.js"></script>
<script src="/bootstrap-markdown/js/marked.js"></script>
<script>
$(function(){
    $(".tag_list").select2();
    $("#content").markdown({autofocus:false,savable:false,language:'zh'});
});
</script>
@stop
