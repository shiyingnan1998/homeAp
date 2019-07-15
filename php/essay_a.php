<?php
    session_start();
    $phone=$_SESSION["phone"];
    //$title=$_POST["title"];
    include("conn.php");
    //$title=$_POST["title"];
    $sql="select id
    from users
    where phone='$phone'";
    $result = mysqli_query($conn,$sql);  
    $con=mysqli_fetch_row($result);
    $sqll="select id
    from article
    where title='寻访良渚老街'";
    $res = mysqli_query($conn,$sqll);  
    $co=mysqli_fetch_row($res);
    //echo $con[0];
    $sql3="insert into article_c(a_id,u_id) values('$co[0]','$con[0]')";
    // $sql3="select title
    // from message,article
    // where message.id='$id' and article.id=message.a_id";
    // $res = mysqli_query($conn,$sql3);  
    // $con=mysqli_fetch_row($res);
    // echo $con[0];
    if ($conn->query($sql3) === TRUE){
        echo "1";
    }
    else{
        echo "0";
    }
    $conn->close();//关闭数据库
?>