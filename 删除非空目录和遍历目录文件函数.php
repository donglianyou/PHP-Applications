<?php
header('Content-Type:text/html;charset=utf-8');
$dir='pm.cn';
//递归删除非空目录
function deldir($dir){
    if (is_dir($dir)) {
        $files=scandir($dir);
        foreach ($files as $file) {
            if ($file!='.' && $file!='..') {
               $path=$dir.'/'.$file;
                if (is_dir($path)) {
                    deldir($path);
                }else{
                    unlink($path);
                }
            }
        }
        rmdir($dir);
        echo "删除成功！";
    }else{
        echo "未找到指定的目录！";
    }
}
//递归遍历目录及目录下的所有文件和文件夹,返回文件数组  
$files=array();
function listAllFiles($dir=""){           
    if(is_dir($dir)){  
        if($handle=opendir($dir)){  
            //var_dump($handle);resource(2) of type (stream)   
            while(false!==($file=readdir($handle))){  
                //var_dump($file);//全是文件名,第1个是点,第2个是点点,其他就abc.php  
                if($file!="."&&$file!=".."){  
                    //继续分别判断是文件夹还是文件  
                    if(is_dir($dir."/".$file)){  
                        //echo "here"."<br/>";  
                        //如果是文件夹,继续遍历  
                        $files[$file]=listAllFiles($dir."/".$file);  
                    }else{  
                        //如果是文件,添加到文件数组中,记得加上路径                                                       
                        $files[]=$dir."/".$file;  
                    }  
                }  
            }                 
            closedir($handle);              //遍历完毕,必须关毕  
        }  
    }  
    return $files;  
}  
echo "<pre>";  
print_r(listAllFiles($dir));  
echo "</pre>"; 
?>