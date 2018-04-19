<?php 
/**
1·作者：dong sir
2·select():查询表多条数据
3·find():查询表一条数据
4·find($id):查询表中某一条数据
5·delete($id):删除某一条数据，进行了简单的防护，不允许直接删除整表数据
6·insert($post):插入一条从表单传过来的数据
7·update($post):修改一条从表单传过来的数据
*/

//Model.class.php
include('config.php');
class Model{
    //表名属性
    public $table;
    //构造方法及表名赋值
    public function __construct($t){
        $this->table=$t;
        mysql_connect(HOST,USER,PASS);
        mysql_query('set names utf8');
        mysql_select_db(DBNAME);
    }
    //select 查询
    public function select(){
        $sql="select * from {$this->table}";
        $res = mysql_query($sql);
        while ($row=mysql_fetch_assoc($res)) {
            $rows[]=$row;
        }
        return $rows;
    }
    //find 查询
    public function find($id=0){
        $where='';
        if ($id) {
            
            $where="where id={$id}";
        }
        $sql="select * from {$this->table} {$where} limit 1";
        $res=mysql_query($sql);
        $row=mysql_fetch_assoc($res);
        return $row;
    }
    //delete 删除数据
    public function delete($id=0){
        if ($id) {
            $sql="delete from {$this->table} where id={$id}";
            if (mysql_query($sql)) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }
    //insert 插入数据
    public function insert($arr=0){
        if ($arr) {
            foreach ($arr as $key => $val) {
                $keys[]=$key;
                $vals[]='\''.$val.'\'';
            }
            $keystr=join(',',$keys);
            $valstr=join(',',$vals);
            $sql="insert into {$this->table}({$keystr}) values({$valstr})";
            if (mysql_query($sql)) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    //update 修改数据
    public function update($arr=0){
        if ($arr) {
            $id=$arr['id'];
            unset($arr['id']);
            foreach ($arr as $key => $val) {
                $row[]="{$key}='{$val}'";
            }
            $rows=join(',',$row);
            $sql="update {$this->table} set {$rows} where id={$id}";
            if (mysql_query($sql)) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
?>