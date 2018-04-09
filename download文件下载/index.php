<?php
//获取files中的文件
$dir='files';
$files=scandir($dir);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>文件下载</title>
</head>
<body>
<h2>文件下载页面</h2>
<hr>
<?php 
    foreach ($files as $file) {
        if ($file!='.' && $file!='..') {
            $filepath=$dir.'/'.$file;
            echo "<p>{$file} <a href='down.php?filepath={$file}'>下载</a></p>";
        }
    }
?>
</body>
</html>                 