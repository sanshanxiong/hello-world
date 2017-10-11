<?php
/**
 * Created by PhpStorm.
 * User: qcx
 * Date: 2017/10/10
 * Time: 14:01
 */
require_once  "MyPDO.class.php";
$id=$_GET['id'];
$pdo= new MyPDO();
$sql ="select id ,name,password,address from user where id=:id";
$data=["id"=>$id];
$user = $pdo->selectOne($sql,$data);
$data =$user;
require_once "views/user.html";