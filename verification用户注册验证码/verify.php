<?php
session_start();
$img=imagecreatetruecolor(100, 30);
$white=imagecolorallocate($img,255,255,255);
$blue=imagecolorallocate($img,0,0,255);
$gray=imagecolorallocate($img, 200, 200, 200);
$black=imagecolorallocate($img, 0, 0, 0);

//填充白色背景
imagefill($img,0,0,$white);
//所有字母数字
$arr=array_merge(range(0,9),range('a', 'z'),range('A', 'Z'));
//打乱字母数字
shuffle($arr);
//将数组中前五个字母或数字拼接成字符串
$randStr=join('',array_slice($arr, 0,5));
//把随机字符串放到session数组中
$_SESSION['verifycode']=$randStr;
//绘制文字图片
imagettftext($img, 22, 0, 0, 28, $blue, 'fonts.TTF', $randStr);
//点干扰素
for ($i=0; $i < 300; $i++) { 
    imagesetpixel($img,mt_rand(0,100),mt_rand(0,30),$black);
}
//线干扰素
for ($i=0; $i < 10; $i++) { 
    imageline($img,mt_rand(0,100),mt_rand(0,30),mt_rand(0,100),mt_rand(0,30),$blue);
}
//曲线干扰素
for ($i=0; $i < 10; $i++) { 
    imageellipse($img, mt_rand(0,100),mt_rand(0,30), 20,20, $blue);
}
//输出最终图像或保存最终图像
header('content-type:image/png');
imagepng($img);
//释放画布资源
imagedestroy($img);
?>