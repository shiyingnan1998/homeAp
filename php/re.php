<?php
    session_start();
    $id=$_POST["id"];
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
    $sqll="insert into reply(r_id,u_id,message) values('$id','$con[0]','$message')";
    mysqli_query($conn,$sqll); 
    // $sql3="select title
    // from message,article
    // where message.id='$id' and article.id=message.a_id";
    // $res = mysqli_query($conn,$sql3);  
    // $con=mysqli_fetch_row($res);
    // echo $con[0];
    if ($conn->query($sqll) === TRUE){
        echo $_SESSION["title"];
    }
    else{
        echo "0";
    }
    $conn->close();//关闭数据库
?>