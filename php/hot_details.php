<?php
  $iid = $_GET["id"];

  include("conn.php");

  $sql="select content 
  from hotspots 
  where id='$iid'";

  $id="1";
  $res=mysqli_query($conn,$sql);
  $con=mysqli_fetch_row($res);
  echo $con[0];

  $sqll="update hotspots 
  set is_check=1
  where id='$iid'";
  //insert into hot_check(u_id,h_id) values('$id','$h_id');
  mysqli_query($conn,$sqll);
  $conn->close();//关闭数据库
?>

