<?php
    $m=$_POST[""];
    include("conn.php");
    $sql="name,image,summary,collect
    from hotspots
    where name like '%'.'$m'.%'";
    $result = mysqli_query($conn,$sql);  
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
?>