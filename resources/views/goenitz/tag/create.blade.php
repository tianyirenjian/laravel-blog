@extends('goenitz.goenitz')
@section('title')
    <title>添加标签</title>
@stop
@section('content')
    <div class="content-header">
        <h1>添加标签</h1>
    </div>
    <div class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">添加标签</div>
                <div class="box-tools">
                    <a href="{{ action('Goenitz\TagController@index') }}" class="btn btn-primary btn-xs">返回列表</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5">
                        {!! Form::open(['url'=>action('Goenitz\TagController@store')]) !!}
                        <div class="form-group<?php if($errors->has('name')){echo ' has-error';}?>">
                            {!! Form::label('name','名称:') !!}
                            {!! Form::text('name',null,['class'=>'form-control input-sm']) !!}
                            <p class="help-block">{{ $errors->first('name') }}</p>
                        </div>
                        {!! Form::submit('添加',['class'=>'btn btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop