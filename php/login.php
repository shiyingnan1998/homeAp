<?php
session_start();
$phone=$_POST["phone"];
$psd=$_POST["check"];
if (!preg_match('/^1([38][0-9]|4[579]|5[0-3,5-9]|6[6]|7[0135678]|9[89])\d{8}$/', $phone)) {
    echo "手机号格式错误";
}
else{
    include("conn.php");
    $sql="select psd
    from users
    where phone=$phone";
    $res=mysqli_query($conn,$sql);
    $con=mysqli_fetch_row($res);
    //echo $con[0];
    if($con[0]==$psd){
        echo "1";
    }
    else{
        echo "验证码输入错误";
    }
    $_SESSION["phone"]=$phone;
}
?>
