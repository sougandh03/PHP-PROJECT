<?php
include 'dbcon.php';
$update=$_GET["uid"];
$sql1="SELECT * FROM `registration` WHERE `logid`='$update'";
$result1=mysqli_query($con,$sql1);
$sql2="SELECT * FROM `login` WHERE `logid`='$update'";
$result2=mysqli_query($con,$sql2);
while($row1=mysqli_fetch_array($result1))
		{
			$row2=mysqli_fetch_array($result2);
			$txt1=$row1["rname"];
			$txt2=$row1["raddress"];
			$txt3=$row1["rphone"];
			$txt4=$row2["email"];
			$txt5=$row2["pswd"];
			$img=$row1["images"];
			
			
		


if(isset($_POST["btn1"]))
{
	$row1=mysqli_fetch_array($result1);
	unlink("uploads/".$row1["images"]);
	$name=$_POST["txt1"];
	$address=$_POST["txt2"];
	$email=$_POST["txt3"];
	$phone=$_POST["txt4"];
	$password=$_POST["pswd"];
	$i=$_FILES["img"]["name"];
	move_uploaded_file($_FILES["img"]["tmp_name"],"uploads/".$_FILES["img"]["name"]);
	$sql1="UPDATE `registration` SET `rname`='$name',`raddress`='$address',`rphone`='$phone',`images`='$i' WHERE `logid`='$update'";
	$result1=mysqli_query($con,$sql1);
	$sql2="UPDATE `login` SET `email`='$email',`pswd`='$password' WHERE `logid`='$update'";
	$result2=mysqli_query($con,$sql2);
	header("location:view.php");
	
	

}
?>

<html>
<head>
<title>Registration</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  margin-left: auto; 
  margin-right: auto;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color:#f2f2f2;}

#customers tr:hover {background-color:#ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>


<br><br><br><br>
    <form action="#" method="POST" enctype="multipart/form-data">
        <center>
        <h1>Registration</h1>
        <table border="2" id="customers">
			
			<tr>
                <td>Name</td>
                <td><input type="text" name="txt1" value="<?php echo $txt1 ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="txt2" value="<?php echo $txt2 ?>"></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="email" name="txt3" value="<?php echo $txt4 ?>"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="txt4" value="<?php echo $txt3 ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pswd" value="<?php echo $txt5 ?>"></td>
            </tr>
			<tr>
                <td>File Upload </td>
                <td><input type="file" name="img"></td>
				<td><img src="uploads/<?php echo $row1["images"];?>" width="100px" height="100px"></td>
				
            </tr>
            <tr>
                <td colspan="2"><center><input type="submit" name="btn1"></center></td>
            </tr>
        </table>
		<?php
		}
        include "header.html";
        include "sidebar.html";
		?>
        </center>
    </form>
	
</body>
</html>