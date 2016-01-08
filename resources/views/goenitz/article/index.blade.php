@extends('goenitz.goenitz')
@section('title')
    <title>文章管理</title>
@stop
@section('content')
    <div class="content-header">
        <h1>文章管理</h1>
    </div>
    <div class="content">
        <div class="box">
            <div class="box-header">
                <div class="box-title">文章管理</div>
                <div class="box-tools">
                    <a href="{{ action('Goenitz\ArticleController@create') }}" class="btn btn-primary btn-xs">添加文章</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>标签</th>
                            <th>添加时间</th>
                            <th>最后修改</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>
                                <a href="/post/{{ $article->slug }}" target="_blank">{{ $article->title }}</a>
                            </td>
                            <td>
                                @foreach($article->tags as $tag)
                                <span class="label label-default">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $article->created_at }}</td>
                            <td>{{ $article->updated_at }}</td>
                            <td>
                                <a href="{{ action('Goenitz\ArticleController@edit',$article) }}">
                                    <i class="fa fa-pencil-square"></i>
                                </a>
                                <a href="{{ action('Goenitz\ArticleController@destroy',$article) }}" onclick="return confirm('确定要删除 {{ $article->title }} 吗？');">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
		{!! $articles->render() !!}
            </div>
        </div>
    </div>
@stop
