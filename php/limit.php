<?php
session_start();
if (isset($_SESSION["phone"])){
    echo "1";
}
else{
    echo "0";
}
?>