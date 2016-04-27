<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>简易图书馆管理系统</title>

    <!-- Bootstrap -->
    <link href="/library/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/library/assets/css/signin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/library/assets/js/bootstrap.min.js"></script>
<body>
<?php if (!isset($_SESSION['name'])) : ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">简易图书馆管理系统</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li <?php if ($content=='主页') echo "class='active'";?>><a href="#">主页</a></li>
                    <li <?php if ($content=='图书查询') echo "class='active'";?>><a href="/library/index.php/home/search">图书查询</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php if ($content=='登陆') echo "class='active'";?>><a href="/library/index.php/home/login">
                            <span class="glyphicon glyphicon-log-in"></span> 登陆</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif; ?>
<!-- Page Content -->

<?php if (isset($_SESSION['name'])): ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">简易图书馆管理系统</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li <?php if ($content=='主页') echo "class='active'";?>><a href="#">主页</a></li>
                <li <?php if ($content=='图书查询') echo "class='active'";?>><a href="/library/index.php/home/search">图书查询</a></li>
                <li <?php if ($content=='图书入库') echo "class='active'";?>><a href="#">图书入库</a></li>
                <li <?php if ($content=='借书') echo "class='active'";?>><a href="#">借书</a></li>
                <li <?php if ($content=='还书') echo "class='active'";?>><a href="#">还书</a></li>
                <li <?php if ($content=='借书证管理') echo "class='active'";?>><a href="#">借书证管理</a></li>
                <?php if ($_SESSION['id'] == 'root' ) :?>
                    <li <?php if ($content=='添加管理员') echo "class='active'";?>><a href="/library/index.php/admin/addAdmin">添加管理员</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">
                        <span class="glyphicon glyphicon-user"></span>
                        <?php echo $_SESSION['name']; ?>
                    </a>
                </li>
                <li><a href="/library/index.php/home/logout">
                        <span class="glyphicon glyphicon-log-out"></span>
                        登出
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php endif; ?>