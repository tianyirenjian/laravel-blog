@extends('goenitz.goenitz')
@section('title')
<title>账号信息</title>
@stop
@section('content')
	<div class="content-header">
		<h1>账号信息</h1>
	</div>
	<div class="content">
		<div class="box">
			<div class="box-body">
				{!! Form::open(['url'=>action('Goenitz\UserController@update',$user),'class'=>'form-horizontal']) !!}
				{!! Form::hidden('_method','PUT') !!}
				<div class="form-group">
					{!! Form::label('name','用户名：',['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-4 form-control-static">
                        {{ $user->name }}
                    </div>
				</div>
                <div class="form-group">
                    {!! Form::label('email','邮箱：',['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-4">
                        {!! Form::text('email',$user->email,['class'=>'form-control']) !!}
                    </div>
                </div>
				<div class="form-group">
					{!! Form::label('password','密码：',['class'=>'col-md-2 control-label']) !!}
					<div class="col-md-4">
						{!! Form::password('password',['class'=>'form-control']) !!}
						<div class="help-block"><i class="fa fa-info-circle"> </i>不修改则不需填写</div>
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('nickname','昵称：',['class'=>'col-md-2 control-label']) !!}
					<div class="col-md-4">
						{!! Form::text('nickname',$user->profile->nickname,['class'=>'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('avatar','头像地址：',['class'=>'col-md-2 control-label']) !!}
					<div class="col-md-4">
						{!! Form::text('avatar',$user->profile->avatar,['class'=>'form-control']) !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('website','个人网站：',['class'=>'col-md-2 control-label']) !!}
					<div class="col-md-4">
						{!! Form::text('website',$user->profile->website,['class'=>'form-control']) !!}
					</div>
				</div>
                <div class="form-group">
                    {!! Form::label('weibo','微博：',['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-4">
                        {!! Form::text('weibo',$user->profile->weibo,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('github','Github：',['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-4">
                        {!! Form::text('github',$user->profile->github,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('city','地区：',['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-4">
                        {!! Form::text('city',$user->profile->city,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('intro','简介：',['class'=>'col-md-2 control-label']) !!}
                    <div class="col-md-4">
                        {!! Form::textarea('intro',$user->profile->intro,['class'=>'form-control','rows'=>3]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        {!! Form::submit('保存',['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop
