<?php
session_start();
$_SESSION["check"] = !isset($_SESSION["check"]) ? 1 : $_SESSION["check"];
$_SESSION["ing"] = !isset($_SESSION["ing"]) ? 1 : $_SESSION["ing"];
 //echo $_SESSION["check"];
 $a=array($_SESSION["check"],$_SESSION["ing"]);
 echo $str=json_encode($a);//将数组进行json编码
?>