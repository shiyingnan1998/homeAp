<?php
session_start();
if (isset($_SESSION["v"])){
    echo "1";
}
else{
    echo "0";
}
?>