<?php
//大图资源
$img='uploads/img/1.jpg';
function thumb($img,$dstx,$dsty,$pre){
    //得到图片信息
    $arr=getimagesize($img);
    //获取图片宽
    $srcx=$arr[0];
    //获取图片高
    $srcy=$arr[1];
    //获取图片类型（1 = GIF，2 = JPG，3 = PNG，4 = SWF，5 = PSD，6 = BMP，7 = TIFF(intel byte order)，8 = TIFF(motorola byte order)，9 = JPC，10 = JP2，11 = JPX，12 = JB2，13 = SWC，14 = IFF，15 = WBMP，16 = XBM）
    $srctype=$arr[2];
    //图片类型判断
    switch ($srctype) {
        case '1':
            $imgfrom='imagecreatefromgif';
            $imgout='imagegif';
            break;
        case '2':
            $imgfrom='imagecreatefromjpeg';
            $imgout='imagejpeg';
            break;
        case '3':
            $imgfrom='imagecreatefrompng';
            $imgout='imagepng';
            break;
        default:
            return '错误类型';
            break;
    }
    //原图资源
    $srcimg=$imgfrom($img);
    //等比例算法
    $scale=max($srcx/$dstx,$srcy/$dsty);
    $dstx=floor($srcx/$scale);
    $dsty=floor($srcy/$scale);
   
    //目标资源
    $dstimg=imagecreatetruecolor($dstx,$dsty);
    //图片缩放
    imagecopyresampled($dstimg, $srcimg, 0, 0, 0, 0, $dstx, $dsty, $srcx, $srcy);
    //保存路径
    $dir=dirname($img);
    $file=basename($img);
    $dstfile=$dir.'/'.$pre.$file;
    //保存图片
    $imgout($dstimg,$dstfile);
    //关闭资源
    imagedestroy($srcimg);
    imagedestroy($dstimg);
}
thumb($img,500,500,'t_500_');
thumb($img,200,200,'t_200_');
thumb($img,100,100,'t_100_');
?>