<?php
session_start();
if ($_SESSION["check"] == 2) {
    $_SESSION["check"] = 3;
}
$_SESSION["ing"]=3;
?>

