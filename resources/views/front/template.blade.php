<!DOCTYPE html>
<html lang="en">
<head>
<!--
  ________                     .__  __                                        
 /  _____/  ____   ____   ____ |__|/  |_________ __  _  _____  ___________    
/   \  ___ /  _ \_/ __ \ /    \|  \   __\___   / \ \/ \/ /\  \/  /\___   /    
\    \_\  (  <_> )  ___/|   |  \  ||  |  /    /   \     /  >    <  /    /     
 \______  /\____/ \___  >___|  /__||__| /_____ \   \/\_/  /__/\_ \/_____ \ /\ 
        \/            \/     \/               \/                \/      \/ \/ 
-->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('title')
<link rel="stylesheet" type="text/css" href="{{ elixir('css/front.css') }}">
@yield('style')
</head>
<body class="front">
<nav class="navbar navbar-default  navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.goenitz.xyz/">
                Goenitz
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">首页</a></li>
                <li><a href="/post/hello-world">关于</a></li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
<footer>
    <p class="container">©2015 Powered by Goenitz.</p>
</footer>
<div class="progress" style="height:3px;" id="topProgress">
    <div class="progress-bar" style="width: 0%"></div>
</div>
<script src="{{ elixir('js/front.js') }}"></script>
<script type="text/javascript">
hljs.initHighlightingOnLoad();
</script>
</body>
</html>
