@extends('goenitz.goenitz')
@section('title')
    <title>文章标签管理</title>
@stop
@section('content')
    <div class="content-header">文章标签</div>
    <div class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">文章标签</div>
                <div class="box-tools">
                    <a href="{{ action('Goenitz\TagController@create') }}" class="btn btn-primary btn-xs">添加标签</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名称</th>
                            <th>文章数量</th>
                            <th>添加时间</th>
                            <th>最后修改</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->articles()->count() }}</td>
                            <td>{{ $tag->created_at }}</td>
                            <td>{{ $tag->updated_at }}</td>
                            <td>
                                <a href="{{ action('Goenitz\TagController@edit',$tag) }}">
                                    <i class="fa fa-pencil-square"></i>
                                </a>
                                <a href="{{ action('Goenitz\TagController@destroy',$tag) }}" onclick="return confirm('确定要删除标签 {{ $tag->name }} 吗？');">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop