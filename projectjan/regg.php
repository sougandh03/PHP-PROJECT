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
    <?php
    
    include 'dbcon.php';
	if(isset($_POST["btn1"]))
	{
		$name=$_POST["txt1"];
		$address=$_POST["txt2"];
		$email=$_POST["txt3"];
		$phone=$_POST["txt4"];
		$password=$_POST["pswd"];
        $i=$_FILES["img"]["name"];
        $q="INSERT INTO `login`( `email`, `pswd`) VALUES ('$email','$password')";
        $res=mysqli_query($con,$q);
        if($res){
            $ql="SELECT * FROM `login` WHERE `email`='$email'";
            $r=mysqli_query($con,$ql);
            $row=mysqli_fetch_array($r);
            $lid=$row["logid"];
            move_uploaded_file($_FILES["img"]["tmp_name"],"uploads/".$_FILES["img"]["name"]);
            $sql="INSERT INTO `registration`(`logid`,`rname`, `raddress`, `rphone`,`images`) VALUES ('$lid','$name','$address','$phone','$i')";
		    $result=mysqli_query($con,$sql);
	    	if($result==1){
		    	//echo "<script>alert('inserted')</script>";
                //header("location:view.php");
            }
        }
		//echo $name."<br>".$address."<br>".$email."<br>".$phone."<br>".$password;
		
			
		
	}
    ?>
	
    

    
    <br><br><br><br>
    <form action="#" method="POST" enctype="multipart/form-data">
        <center>
        <h1>Registration</h1>
        <table border="2" id="customers">
            
			
			<tr>
                <td>Name</td>
                <td><input type="text" name="txt1"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="txt2"></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="email" name="txt3"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="txt4"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pswd"></td>
            </tr>
			<tr>
                <td>File Upload</td>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td colspan="2"><center><input type="submit" name="btn1"></center></td>
            </tr>
        </table>
        <p>Already have an account?<a href="login.php">Login</a></p>
        </center>
    </form>
	
</body>
</html>