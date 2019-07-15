<?php
$host='127.0.0.1';
$user='root';
$password='';
$dbName='hometown';
$conn=new mysqli($host,$user,$password,$dbName);
if ($conn->connect_error){
    die("连接失败：".$conn->connect_error);
}
mysqli_set_charset($conn,"utf8") or die("数据库编码集设置失败！");
?>