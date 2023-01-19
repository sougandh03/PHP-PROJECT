<?php
include 'dbcon.php';
$delete=$_GET["did"];
echo $delete;
$res=mysqli_query($con,"SELECT * FROM `registration` WHERE `logid`='$delete' ");
$row=mysqli_fetch_array($res);
unlink("uploads/".$row["images"]);
$result=mysqli_query($con,"DELETE FROM `registration` WHERE `logid`='$delete'");
mysqli_query($con,"DELETE FROM `login` WHERE `logid`=$delete");
header("location:view.php");

?>