<?php 
header('Content-type:text/html;charset=utf8');
$pdo=new PDO("mysql:host=localhost;dbname=msg","root",'root');
$pdo->exec('set names utf8');
$id=$_GET['id'];
$sql="delete from user where id={$id}";
$smt=$pdo->prepare($sql);
if ($smt->execute()) {
    echo "<script>location.href='index.php'</script>";
}else{
    echo "删除失败！";
}
?>