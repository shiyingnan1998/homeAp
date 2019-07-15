<?php
session_start();
$_SESSION["check"] = !isset($_SESSION["check"]) ? 1 : $_SESSION["check"];
$_SESSION["ing"]=1;
echo $_SESSION["check"];
// echo $_SESSION["check"];
?>