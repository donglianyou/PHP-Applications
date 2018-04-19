<?php
header('Content-Type: text/html; charset=gbk');
$arr = array(
    'HOST' =>   'localhost',
    'DBNAME' => 'msg',
    'USER' =>   'root',
    'PASS' =>   'root'
);
foreach ($arr as $name => $value) {
    define($name, $value);
}
?>