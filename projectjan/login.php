<html>
<head>
<title>Login</title>
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
<?php
include 'dbcon.php';
if(isset($_POST["btn1"]))
{
	$email=$_POST["txt1"];
	$password=$_POST["txt2"];
	$result=mysqli_query($con,"SELECT * FROM `login` WHERE `email`='$email' AND `pswd`='$password'");
	$n=mysqli_num_rows($result);
	if($n=1)
	{
		header("location:index.html");
	}
}
?>
<br><br><br><br>
    <form action="#" method="POST" enctype="multipart/form-data">
        <center>
        <h1>LOGIN</h1>
        <table border="2" id="customers">
            
			
			<tr>
                <td>Email</td>
                <td><input type="text" name="txt1"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="txt2"></td>
            </tr>
			<tr>
                <td colspan="2"><center><input type="submit" name="btn1" value="login"></center></td>
            </tr>
        </table>
        <p>Don't have an account?Register now<a href="regg.php">REGISTER NOW</a></p>
		</center>
    </form>
	
</body>
</html>