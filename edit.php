<?php
/**
 * Created by PhpStorm.
 * User: qcx
 * Date: 2017/10/10
 * Time: 14:58
 */
require_once  "MyPDO.class.php";
if($_SERVER["REQUEST_METHOD"]=="GET")
{
    $id =$_GET['id'];
    $pdo=new MyPDO();
    $sql="select id ,name ,password,address from user  where id=$id";
    $user =$pdo->selectOne($sql);
    $data =$user;
    require_once "views/edituser.html";
}
else
{
    //获得数据
    $name=$_POST["name"];
    $password = $_POST["password"];
    $address  =$_POST["address"];
    $id=$_POST['id'];
    //写添加语句
    $pdo = new MyPDO();
    $sql ="update user  set name= :name ,password=:password,address=:address
  where id =:id";
    $data =["name"=>$name,"password"=>$password,"address"=>$address,"id"=>$id];
    //执行添加操作
    $pdo->nonQuery($sql,$data);
    //显示添加成功的信息，并跳转到列表页
    $msg ="修改成功";
    require_once "views/info.html";
    header("refresh:2;url=users.php");
}