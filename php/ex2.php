<?php
session_start();
if ($_SESSION["check"] == 1) {
    $_SESSION["check"] = 2;
}
$_SESSION["ing"]=2;
echo $_SESSION["check"];
?>