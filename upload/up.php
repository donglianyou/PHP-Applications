<?php
header("Content-Type:text/html;charset=utf-8");
if ($_FILES) {
    //获取文件上传的错误码
    $error = $_FILES['img']['error'];
    if ($error==0) {
        //只允许上传png,jpg或gif图片文件
        $allow=array('png','gif','jpg');

        //只允许上传2MB以内的图片
        $allowSize=2*1024*1024;

        echo "<pre>";
        print_r($_FILES);
        $name=$_FILES['img']['name'];
        $ext = array_pop(explode('.',$name));
        $size=$_FILES['img']['size'];
        $tmp_name=$_FILES['img']['tmp_name'];

        //转换文件大小单位
        function formatSize($size){
            if ($size >=1073741824) {
                $size = number_format($size / 1073741824, 2). 'GB';
            }elseif ($size >=1048576) {
                $size = number_format($size / 1048576, 2).'MB';
            }elseif ($size >=1024) {
                $size = number_format($size / 1024, 2).'KB';
            }elseif ($size > 1) {
                $size = $size . 'bytes';
            }elseif ($size == 1) {
                $size = $size . 'byte';
            }else{
                $size = '0 bytes';
            }
            return $size;
        }

        $tfile=time().mt_rand();
        $target='uploads/'.$tfile.'.'.$ext;

        if ($size<$allowSize) {
            if(in_array($ext,$allow)){
                if (move_uploaded_file($tmp_name,$target)) {
                    echo "文件 {$name} 上传成功 大小：".formatSize($size)."！";
                }
            }else{
                echo "只允许上传png,jpg或gif图片文件！";
            }
        }else{
            echo "只能上传2MB以内的图片,你当前图片大小：".formatSize($size)."！";
        }
    }elseif ($error==1) {
        //php配置文件上传大小限制upload_max_filesize（超过该值，则报1错误码），post_max_size（超过该值，则$_FILES为空数组）
        echo "你上传的文件大小超过限制大小！";
    }elseif ($error==4) {
        echo "请先选择图片！";
    }
}else{
    //post_max_size（超过该值，则$_FILES为空数组）
    echo "文件上传大小超过表单限制！";
}
?>