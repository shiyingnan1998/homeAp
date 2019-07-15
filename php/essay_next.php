<?php
    session_start();
    $_SESSION["title"]=$_POST["title"];
    $title=$_POST["title"];
    include("conn.php");
    $sql="select title,author,date,content,date
    from article
    where title='$title'";
    $result = mysqli_query($conn,$sql);  
    //$con=mysqli_fetch_row($result);
    //echo $con[0];
    $sqll="select message,point,u_image,u_name,message.date,message.id
    from message,users,article 
    where article.id=message.a_id and title='$title' and message.u_id=users.id";
    $res = mysqli_query($conn,$sqll);  
    $sql3="select u_name,reply.message
    from message,users,reply,article 
    where article.id=message.a_id and title='$title' and reply.r_id=message.id and reply.u_id=users.id";
    $res3 = mysqli_query($conn,$sql3);  
    $jarr = array();
    while ($rows=mysqli_fetch_array($result)){
        //echo $rows;
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        for($i=0;$i<$count;$i++){  
            unset($rows[$i]);//删除冗余数据 
            //echo  $rows[$i];
            } 
        //if($rows[0]=='pitch' || $rows[0]=='yaw'){
        //$rows[1]=(int)$rows[1];}
        array_push($jarr,$rows);
    }
    while ($rows=mysqli_fetch_array($res)){
        //echo $rows;
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        for($i=0;$i<$count;$i++){  
            unset($rows[$i]);//删除冗余数据 
            //echo  $rows[$i];
            } 
        //if($rows[0]=='pitch' || $rows[0]=='yaw'){
        //$rows[1]=(int)$rows[1];}
        array_push($jarr,$rows);
    }
    while ($rows=mysqli_fetch_array($res3)){
        //echo $rows;
        $count=count($rows);//不能在循环语句中，由于每次删除 row数组长度都减小  
        for($i=0;$i<$count;$i++){  
            unset($rows[$i]);//删除冗余数据 
            //echo  $rows[$i];
            } 
        //if($rows[0]=='pitch' || $rows[0]=='yaw'){
        //$rows[1]=(int)$rows[1];}
        array_push($jarr,$rows);
    }
    /*print_r($jarr);//查看数组
    foreach($jarr as $value){
        echo "{$value}<br>";
       }
    /*echo "<br/>";
    
    echo '<hr>';

    echo '编码后的json字符串：';*/
    echo $str=json_encode($jarr);//将数组进行json编码
    $conn->close();//关闭数据库
?>