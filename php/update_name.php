<?php
    session_start();
    $phone=$_SESSION["phone"];
    include("conn.php"); 
    $name=$_POST["name"];
    //$title=$_POST["title"];
    $sql="update users 
    set u_name='$name'
    where phone='$phone'";
    $result = mysqli_query($conn,$sql);  
    //$con=mysqli_fetch_row($result);
    //echo $con[0];
    if ($conn->query($sql) === TRUE){
        echo "1";
    }
    else{
        echo "0";
    }
    $conn->close();//关闭数据库
?>