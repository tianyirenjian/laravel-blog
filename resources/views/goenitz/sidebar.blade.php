<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->profile->avatar }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>网站管理</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../../index.html"><i class="fa fa-circle-o"></i> 网站设置</a></li>
                    <li><a href="{{ action('Goenitz\UserController@index') }}"><i class="fa fa-circle-o"></i> 账户设置</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>文章管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ action('Goenitz\ArticleController@index') }}"><i class="fa fa-circle-o"></i> 文章列表</a></li>
                    <li><a href="{{ action('Goenitz\TagController@index') }}"><i class="fa fa-circle-o"></i> 文章标签</a></li>
                </ul>
            </li>
            <!--<li><a href="#"><i class="fa fa-folder"></i> <span>文件管理</span></a></li>-->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>