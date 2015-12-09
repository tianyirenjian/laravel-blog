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
<link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
@yield('style')
</head>
<body class="front">
<header>
    <div class="container">
        <h1 id="webname">
            <a href="/">Goenitz</a>
        </h1>
        <h5 id="webdesc">我就是我 是颜色不一样的烟火</h5>
    </div>
</header>
@yield('content')
<footer>
    <p class="container">©2015 Powered by Goenitz.</p>
</footer>
<div class="progress xxs" id="topProgress">
    <div class="progress-bar" style="width: 0%"></div>
</div>
<script src="{{ elixir('js/app.js') }}"></script>
<script type="text/javascript">
hljs.initHighlightingOnLoad();
</script>
</body>
</html>
