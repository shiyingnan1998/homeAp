<?php
    session_start();
    $phone=$_SESSION["phone"];
    //echo $phone;
    include("conn.php");
    //$title=$_POST["title"];
    $sql="select u_image,u_name,phone
    from users
    where phone='$phone'";
    $result = mysqli_query($conn,$sql);  
    //$con=mysqli_fetch_row($result);
    //echo $con[0];
    $jarr = array();
    while ($rows=mysqli_fetch_array($result)){
        //echo $rows;
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        for($i=0;$i<$count;$i++){  
            unset($rows[$i]);//删除冗余数据 
            //echo  $rows[$i];
            } 
        array_push($jarr,$rows);
    }
    echo $str=json_encode($jarr);//将数组进行json编码
    $conn->close();//关闭数据库
?>