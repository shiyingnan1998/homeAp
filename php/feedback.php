<?php
    session_start();
    $phone=$_SESSION["phone"];
    $message=$_POST["message"];
    include("conn.php");
    //$title=$_POST["title"];
    $sql="select id
    from users
    where phone='$phone'";
    $result = mysqli_query($conn,$sql);  
    $con=mysqli_fetch_row($result);
    //echo $con[0];
    $sqll="insert into feedback(u_id,message) values('$con[0]','$message')";
    if ($conn->query($sqll) === TRUE){
        echo "1";
    }
    else{
        echo "0";
    }
    $conn->close();//关闭数据库
?>