@extends('goenitz.goenitz')
@section('title')
    <title>更新标签</title>
@stop
@section('content')
    <div class="content-header">
        <h1>更新标签</h1>
    </div>
    <div class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">更新标签: {{ $tag->name }}</div>
                <div class="box-tools">
                    <a href="{{ action('Goenitz\TagController@index') }}" class="btn btn-primary btn-xs">返回列表</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5">
                        {!! Form::model($tag,['url'=>action('Goenitz\TagController@update',$tag)]) !!}
                        {!! Form::hidden('_method','put') !!}
                        <div class="form-group<?php if($errors->has('name')){echo ' has-error';}?>">
                            {!! Form::label('name','名称:') !!}
                            {!! Form::text('name',null,['class'=>'form-control input-sm']) !!}
                            <p class="help-block">{{ $errors->first('name') }}</p>
                        </div>
                        {!! Form::submit('更新',['class'=>'btn btn-success btn-sm']) !!}
                        {!! Form::reset('重置',['class'=>'btn btn-default btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop