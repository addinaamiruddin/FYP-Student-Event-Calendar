<?php 

$host="localhost";
$user="root";
$password="";
$db="demo";

$con=mysqli_connect($host,$user,$password);
mysqli_select_db($con,$db);

if(isset($_POST['username']))
{
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from loginform where user='".$uname."'AND Pass='".$password."' limit 1";
    
    $result=mysql_query($sql);
    
    if(mysql_num_rows($result)==1)
    {
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin login page</title>
    <link rel="stylesheet" href="testBOX1.css">
    <link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<body>
<div class="box">
<div class="container">
<img src="userIcon.png" style="width:80px;height:80px;margin-top:-100px; "/>
    <form method="POST" action="#">
			<div class="form-input">
				<input type="text" name="text" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
    </form>
</div>
</div>
</body>
</html>


