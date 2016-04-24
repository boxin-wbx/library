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
<script>
    function validateForm() {
        var x = document.forms["login"]["username"].value;
        if (x.length < 4 || x > 20) {
            alert("invalid username");
            return false;
        }
    }
</script>

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
                    <li><a href="#">主页</a></li>
                    <li><a href="/library/index.php/home/search">图书查询</a></li>
                    <li><a href="#">图书入库</a></li>
                    <li><a href="#">借书</a></li>
                    <li><a href="#">还书</a></li>
                    <li><a href="#">借书证管理</a></li>
                    <?php if ($_SESSION['id'] == 'root' ) :?>
                        <li class="active"><a href="/library/index.php/admin/addAdmin">添加管理员</a></li>
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
</body>
</html>
<!-- Page Content -->
<div class="container">
    <br>
    <br>
    <form class="form-signin" method="post" name="login" onsubmit="return validateForm()">
        <h2 class="form-signin-heading">注册管理员账号</h2>
        <br>

        <label for="inputText" class="sr-only">Username</label>
        <input type="text" name="username" id="inputText" class="form-control" placeholder="用户名" maxlength="20" required
               autofocus>

        <label for="inputName" class="sr-only">Name</label>
        <input type="text" name="name" id="inputName" class="form-control" placeholder="姓名" required>

        <label for="inputPhone" class="sr-only">Phone</label>
        <input type="number" name="phone" id="inputPhone" class="form-control" placeholder="手机" required>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>

        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
    </form>

</div> <!-- /container -->
<?php if  (validation_errors() != ""): ?>
<script>alert('username exists!');</script>
<?php endif; ?>
</body>
</html>