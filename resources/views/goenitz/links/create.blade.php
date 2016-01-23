@extends('goenitz.goenitz')
@section('title')
    <title>添加友情链接</title>
@stop
@section('content')
    <div class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <div class="box-title">添加友情链接</div>
                <div class="box-tools">
                    <a href="{{ action('Goenitz\LinkController@index') }}" class="btn btn-primary btn-xs">返回列表</a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::open(['url'=>action('Goenitz\LinkController@store')]) !!}
                        <div class="form-group{{ $errors->has('name')? ' has-error':'' }}">
                            {!! Form::label('name','名称:') !!}
                            {!! Form::text('name',null,['class'=>'form-control input-sm']) !!}
                            <p class="help-block">{{ $errors->first('name') }}</p>
                        </div>
                        <div class="form-group{{ $errors->has('url')? ' has-error':'' }}">
                            {!! Form::label('url','网址:') !!}
                            {!! Form::text('url',null,['class'=>'form-control input-sm']) !!}
                            <p class="help-block">{{ $errors->first('url') }}</p>
                        </div>
                        <div class="form-group{{ $errors->has('sort')? ' has-error':'' }}">
                            {!! Form::label('sort','排序:') !!}
                            {!! Form::number('sort',$next_sort,['class'=>'form-control input-sm']) !!}
                            <p class="help-block">{{ $errors->first('sort') }}</p>
                        </div>
                        {!! Form::submit('提交', ['class' => 'btn btn-primary btn-sm']) !!}
                        <a href="{{ action('Goenitz\LinkController@index') }}" class="btn btn-default btn-sm">返回</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop