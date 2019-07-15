<?php
    session_start();
    $phone=$_SESSION["phone"];
    $title=$_POST["title"];
    include("conn.php");
    $sql="select id
    from users
    where phone='$phone'";
    $result = mysqli_query($conn,$sql);  
    $con=mysqli_fetch_row($result);
    $sqll="select id
    from article
    where title='$title'";
    $res = mysqli_query($conn,$sqll);  
    $co=mysqli_fetch_row($res);
    $sql3="select count(*)
    from article_c
    where a_id='$co[0]' and u_id='$con[0]'";
    $r = mysqli_query($conn,$sql3);  
    $c=mysqli_fetch_row($r);
    if($c[0]=='0'){
        echo "0";
    }
    else{
        echo "1";
    }
    ?>
