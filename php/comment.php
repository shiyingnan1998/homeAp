<?php
    session_start();
    $phone=$_SESSION["phone"];
    $message=$_POST["comment"];
    include("conn.php");
    $title=$_POST["title"];
    $sql="select id
    from users
    where phone='$phone'";
    $result = mysqli_query($conn,$sql);  
    $con=mysqli_fetch_row($result);
    $sql2="select id
    from article
    where title='$title'";
    $res = mysqli_query($conn,$sql2);  
    $co=mysqli_fetch_row($res);
    //echo $con[0];
    $today = date("Y-m-d");
    $sqll="insert into message(u_id,message,date,a_id) 
    values('$con[0]','$message','$today','$co[0]')";
    if ($conn->query($sqll) === TRUE){
        echo "1";
    }
    else{
        echo "0";
    }
    $conn->close();//关闭数据库
?>