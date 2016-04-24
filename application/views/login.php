<script>
    function validateForm() {
        var x = document.forms["login"]["username"].value;
        if (x.length < 4 || x > 20) {
            alert("invalid username");
            return false;
        }
    }
</script>
<div class="container">
    <br>
    <br>
    <form class="form-signin" method="post" name="login" onsubmit="return validateForm()">
        <h2 class="form-signin-heading">登录管理员账号</h2>
        <br>
        <label for="inputText" class="sr-only">Username</label>
        <input type="text" name="username" id="inputText" class="form-control" placeholder="用户名" maxlength="20" required
               autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
    </form>

</div> <!-- /container -->
<?php
if (validation_errors() != '') echo "<script> alert('invalid username or password incorrect');</script>"
?>