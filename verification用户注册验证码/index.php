<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户注册</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
        <form action="reg.php" method="post" accept-charset="utf-8">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">用户名：</span>
                </div>
                <input type="text" name="username" class="form-control" value="" placeholder="">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">密码：</span>
                </div>
                <input type="password" name="password" class="form-control" value="" placeholder="">
            </div>
            <div class="input-group mb-3">
            <div class="input-group-prepend ">
                    <span class="input-group-text">验证码：</span>
                </div>
                <img src="verify.php" onclick="this.src='verify.php'+'?'+Math.random()" style="cursor: pointer;border: 1px solid #ced4da;border-radius: .25rem; border-left: none;">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">输入验证码：</span>
                </div>
                <input type="text" name="verifycode" class="form-control" value="" placeholder="">
            </div>
            <input type="submit" value="提交" class="btn btn-primary btn-lg">
         </form> 
        </div>
    </div>
</body>
</html>
<?php 

?>