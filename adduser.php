<?php
/**
 * Created by PhpStorm.
 * User: qcx
 * Date: 2017/10/10
 * Time: 14:42
 */
require_once  "MyPDO.class.php";

if($_SERVER["REQUEST_METHOD"]=="GET")
{
    //返回给用户一个空表单
    require_once "views/adduser.html";
}
else  //post
{
   //获得数据
    $name=$_POST["name"];
    $password = $_POST["password"];
    $address  =$_POST["address"];
    //写添加语句
    $pdo = new MyPDO();
    $sql ="insert into user (name,password,address) values(:name,:password,:address)";
    $data =["name"=>$name,"password"=>$password,"address"=>$address];
    //执行添加操作
    $pdo->nonQuery($sql,$data);
    //显示添加成功的信息，并跳转到列表页
    $msg ="添加成功";
    require_once "views/info.html";
    header("refresh:2;url=users.php");
}
