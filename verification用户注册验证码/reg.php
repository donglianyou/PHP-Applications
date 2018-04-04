<?php
session_start();
header('content-type:text/html;charset=utf-8');
//获取表单输入的验证码
$fcode=strtolower($_POST['verifycode']);
//获取图片中的随机验证码
$vcode=strtolower($_SESSION['verifycode']);
if ($fcode == $vcode) {
    echo "<h2>{$_POST['username']} 注册成功</h2>";
}else{
    echo "<h2>验证码输入有误！</h2>";
}
echo "<script>setTimeout(function(){location='index.php';},3000)</script>";
?>