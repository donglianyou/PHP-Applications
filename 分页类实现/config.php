<?php
header('Content-Type: text/html; charset=utf8');
$arr = [
    'HOST' =>   'localhost',
    'DBNAME' => 'msg',
    'USER' =>   'root',
    'PASS' =>   'root'
];
foreach ($arr as $name => $value) {
    define($name, $value);
}
$pdo=new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
$pdo->exec('set names utf8');
?>