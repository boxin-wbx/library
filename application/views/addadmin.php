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