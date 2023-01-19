<?php
include 'dbcon.php';
?>

<html>
<head>
<title>View</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  margin-left: 350px; 
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
    <center>
    <br><br><br><br><br>
    
	  <form action="#" method="POST">
      <input type="text" name="search">
      <input type="submit" name="btn1" value="search"><br><br>

    <?php
    include 'dbconnect.php';
    ?>

    
    <table border="2" id="customers">
        <tr>
            <td>id</td>
            <td>Name</td>
            <td>Address</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Password</td>
            <td>Photo</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
		<?php
		$result=mysqli_query($con,"SELECT * FROM `registration`");
		while($row=mysqli_fetch_array($result))
		{ ?>
        <?php $l=$row["logid"];
        $r="SELECT * FROM `login` WHERE `logid`=$l";
        $re=mysqli_query($con,$r);
        $r1=mysqli_fetch_array($re);
        $lsid=$r1["logid"];
        ?>
			<tr>
			<td><?php echo $row["rid"];?></td>
            <td><?php echo $row["rname"];?></td>
            <td><?php echo $row["raddress"];?></td>
            <td><?php echo $r1["email"];?></td>
            <td><?php echo $row["rphone"];?></td>
            <td><?php echo $r1["pswd"];?></td>
            <td><img src="uploads/<?php echo $row["images"];?>" width="100px" height="100px"></td>
            <td><a href="update.php?uid=<?php echo $lsid;?>">Update</a></td>
            <td><a href="delete.php?did=<?php echo $lsid;?>">Remove</a></td>
            </tr>
            

        <?php  } 
        include "header.html";
        include "sidebar.html";
        ?>
    </table>
    <a href="regg.php">Register here</a>
    </center>
    </form>
</body>
</html>