@extends('goenitz.goenitz')
@section('title')
<meta name="csrf-token" content="{{ csrf_token() }}" xmlns:v-on="http://www.w3.org/1999/xhtml">
<title>网站设置</title>
@stop
@section('content')
<div class="content-header">
    <h1>网站设置</h1>
</div>
<div class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-title"><i class="fa fa-list"></i> 设置管理</div>
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped" id="settings">
                <thead>
                    <tr>
                        <th>字段名</th>
                        <th>字段值</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($settings as $setting) --}}
                    <tr v-for="setting in settings">
                        <td>{!! Form::text('name',null,['class'=>'form-control','v-model'=>'setting.name']) !!}</td>
                        <td>{!! Form::text('value',null,['class'=>'form-control','v-model'=>'setting.value']) !!}</td>
                        <td>
                            <button type="button" v-on:click="save($index)"  class="btn btn-success btn-sm"><i class="fa fa-floppy-o"> </i> 保存</button>
                            <button type="button" v-on:click="destroy($index)" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"> </i> 删除</button>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                    <tr>
                        <td>{!! Form::text('new_name',null,['class'=>'form-control','v-model'=>'new_name']) !!}</td>
                        <td>{!! Form::text('new_value',null,['class'=>'form-control','v-model'=>'new_value']) !!}</td>
                        <td>
                            <button type="button" v-on:click="create" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"> </i> 新增</button>
                            <button type="button" v-on:click="reset" class="btn btn-default btn-sm"><i class="fa fa-refresh"> </i> 清空</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <i class="fa fa-question-circle"></i> 使用说明
            </div>
        </div>
        <div class="box-body">
            <ul>
                <li>此处用于设置在前台模板需要用到的变量。</li>
            </ul>
        </div>
    </div>
</div>
@stop
@section('script')
<script src="{{ elixir('js/vue.min.js') }}"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var app=new Vue({
    el:'#settings',
    data:{
        settings:[],
        new_name:'',
        new_value:''
    },
    methods:{
        save: function (i) {
            var name=this.settings[i].name;
            var value=this.settings[i].value;
            $.ajax({
                url:'/goenitz/settings/'+this.settings[i].id,
                method:'PUT',
                data: $.param({name:name,value:value}),
                dataType:'json'
            }).done(function(data){
                if(data.ok){
                    toastr.success('保存成功!');
                }
            }).fail(function(xhr){
                if(xhr.status==422){
                    var errors=xhr.responseJSON;
                    for(var err in errors){
                        toastr.error(errors[err],'保存失败!');
                    }
                }else{
                    toastr.error('保存失败!错误代码：'+xhr.status);
                }
            });
        },
        destroy:function(i){
            var id=this.settings[i].id;
            var name=this.settings[i].name;
            if(confirm('确定要删除 '+name+' 吗？')){
                $.ajax({
                    method:'DELETE',
                    url:'/goenitz/settings/'+id,
                    dataType:'json'
                }).done(function(data){
                    if(data.ok){
                        toastr.success('删除成功!');
                    }
                    getData();
                });
            }
        },
        create:function(){
            var that=this;
            $.ajax({
                url:'{{ action('Goenitz\SettingController@store') }}',
                data: $.param({name:that.new_name,value:that.new_value}),
                method:'post',
                dataType:'json'
            }).done(function(data){
                if(data.ok){
                    toastr.success('添加成功!');
                    that.new_name='';
                    that.new_value='';
                    getData();
                }
            }).fail(function(xhr){
                if(xhr.status==422){
                    var errors=xhr.responseJSON;
                    for(var err in errors){
                        toastr.error(errors[err],'保存失败!');
                    }
                }else{
                    toastr.error('保存失败!错误代码：'+xhr.status);
                }
            });
        },
        reset:function(){
            this.new_name='';
            this.new_value='';
        }
    }
});
$(function(){
    getData();
});
//载入数据
function getData(){
    $.ajax({
        url:'{{ action('Goenitz\SettingController@getData') }}',
        dataType:'json'
    }).done(function(data){
        app.settings=data;
    });
}
</script>
@stop