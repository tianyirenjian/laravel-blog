@extends('goenitz.goenitz')
@section('title')
    <title>友情链接管理</title>
@endsection
@section('content')
    <div class="content">
        <div class="box box-solid">
            <div class="box-header with-border">
                <div class="box-title">友情链接管理</div>
                <div class="box-tools">
                    <a href="{{ url('goenitz/links/create') }}" class="btn btn-primary btn-xs">添加友情链接</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>网址</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                    <tbody>
                    @forelse($links as $link)
                    <tr>
                        <td>{{ $link->id }}</td>
                        <td>{{ $link->name }}</td>
                        <td>{{ $link->url }}</td>
                        <td>{{ $link->sort }}</td>
                        <td>
                            <a href="{{ action('Goenitz\LinkController@edit', $link) }}">
                                <i class="fa fa-pencil-square"></i>
                            </a>
                            <a href="{{ action('Goenitz\LinkController@destroy', $link) }}" onclick="return confirm('确定要删除 {{ $link->name }} 吗？');">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center">暂无链接</td>
                    </tr>
                    @endforelse
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop