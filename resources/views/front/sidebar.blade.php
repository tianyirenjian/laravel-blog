<div class="panel panel-default">
    <div class="panel-body">
        <form action="/search">
            <div class="input-group">
                <input type="text" name="query" class="form-control input-sm" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-sm" type="submit">搜索</button>
                </span>
            </div>
        </form>
    </div>
</div>
<div class="box box-solid">
    <div class="box-body no-padding" style="display: block;">
        <ul class="nav nav-pills nav-stacked">
            @foreach($tags as $tag)
                <li @if(isset($page_tag) && $page_tag==$tag->name) class="active" @endif >
                    <a href="{{ action('IndexController@showTag',$tag->name) }}">
                        <i class="fa fa-tag"></i>
                        {{ $tag->name }}
                        <span class="label label-primary pull-right">{{ $tag->articles->count() }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- /.box-body -->
</div>