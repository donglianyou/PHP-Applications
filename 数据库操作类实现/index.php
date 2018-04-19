<?php
header("Content-type:text/html;charset=utf8");
include 'Model.class.php';
include 'function.inc.php';

//查询多条数据
/*$rows = M('user')->select();
echo "<pre>";
print_r($rows);*/

//查询表中某一条数据
$row = M('user')->find(3);
echo "<pre>";
print_r($row);

//修改一条数据
/*$arr = array(
    'id'    =>  '5',
    'username' => 'user55555',
    'age'      =>'100'
);
if (M('user')->update()) {
    echo "<p>数据修改成功！</p>";
}else{
     echo "<p>数据修改失败！</p>";
}*/

//插入一条数据
/*
$arr = array(
    'username' => 'user55555',
    'age'      =>'100'
);
if (M('user')->insert($arr)) {
    echo "<p>数据添加成功！</p>";
}else{
    echo "<p>请先添加数据！</p>";
}*/

//删除一条数据
/*if (M('user')->delete()) {
    echo "<p>数据库删除成功！</p>";
}else{
    echo "<p>禁止删除整表数据！</p>";
}*/

?>