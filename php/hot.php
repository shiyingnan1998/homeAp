<?php
include("conn.php");
    $watch=$_POST["watch"];
    $sql="select pitch,yaw,type,text,URL,cssClass
    from hotspots
    where watch_id='$watch'";
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
    /*print_r($jarr);//查看数组
    foreach($jarr as $value){
        echo "{$value}<br>";
       }
    /*echo "<br/>";
    
    echo '<hr>';

    echo '编码后的json字符串：';*/
    echo $str=json_encode($jarr);//将数组进行json编码
    
    /*echo '<br>';
    $arr=json_decode($str);//再进行json解码
    echo '解码后的数组：';
    print_r($arr);//打印解码后的数组，数据存储在对象数组中
    mysqli_close($conn);*/
    $conn->close();//关闭数据库
?>