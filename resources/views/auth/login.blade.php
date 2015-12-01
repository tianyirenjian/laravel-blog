<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
    <style type="text/css">
    .login-container{margin-top:7%;}
    </style>
</head>
<body>
    <div class="row login-container">
        <div class="col-md-4 col-md-offset-4">
            <div class="box box-solid">
                <div class="box-header">
                    <div class="box-title">用户登录</div>
                </div>
                <div class="box-body">
                    {!! Form::open(['url'=>action('Auth\AuthController@postLogin')]) !!}
                    <div class="form-group<?php if($errors->has('email')){echo ' has-error';}?>">
                        {!! Form::label('email','电子邮件:') !!}
                        {!! Form::text('email',null,['class'=>'form-control input-sm']) !!}
                        <p class="help-block">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="form-group<?php if($errors->has('password')){echo ' has-error';}?>">
                        {!! Form::label('password','密码:') !!}
                        {!! Form::password('password',['class'=>'form-control input-sm']) !!}
                        <p class="help-block">{{ $errors->first('password') }}</p>
                    </div>
                    {!! Form::submit('登录',['class'=>'btn btn-primary btn-sm']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>