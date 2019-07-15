<?php
    include("conn.php");
    //$title=$_POST["title"];
    /*$sql="select title,author,date,content
    from village
    where title=$titile";*/
    $sql="select name,image,summary,collect
    from hotspots
    where id=2";
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
        //if($rows[0]=='pitch' || $rows[0]=='yaw'){
        //$rows[1]=(int)$rows[1];}
        array_push($jarr,$rows);
    }
    echo $str=json_encode($jarr);//将数组进行json编码
    $conn->close();//关闭数据库
?>