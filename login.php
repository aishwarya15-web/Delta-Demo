<?php 
include("common/db_connect.php");

session_start();
//$_SESSION['username']="";
if(isset($_POST['btn_submit']))  
{	
		$username=$_POST["txt_username"];
		$password=$_POST["txt_password"];
		
		if((!empty($username)) && (!empty($password))) 
			{
					$query="SELECT * FROM login_tb WHERE login_name='$username' AND login_password='$password';";  
					$sql=mysqli_query($conn,$query);
					$rowcount=mysqli_num_rows($sql);
					if($rowcount> 0)
					{		
						while($datarow = mysqli_fetch_array($sql))
						{
						$username1=$datarow['login_name'];
						echo "<script>window.alert('Welcome $username1!... Login Successfull');</script>";
            session_start();
            $_SESSION['username']=$username1;
            echo "<script>window.open('dashboard.php','_self')</script>";
						}
					}
					else
					{
					echo "<script>window.alert('Login Failed: Please try again later...');</script>";
					}
			}
}		
?>
<?php
$pagename="login";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>COCSIT</title>
        
        <link href="style/style.css" rel="stylesheet" type="text/css" />
       
        <style>
form {
    border: 4px solid gray;
    width: 500px;
    text-align: left;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 30%;
}

button:hover {
  opacity: 0.8;
}

button[type=reset]{
  background-color: gray;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 20%;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}



span.psw {
  float: right;
  padding-top: 16px;
}
        </style>
    </head>
    <body>
        
    <?php include("common/menu.php"); ?>
    <?php include("common/header.php"); ?>
        
        <section class="page-section">
            <div class="container">
                <section class="login">
                <h2 align="center">Login Form</h2>
<center>
<form method="post">
  <div class="imgcontainer">
    <img src="images/avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="txt_username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="txt_password" required>
    <div align="center">
    <button type="submit" name="btn_submit">Login</button>
    <button type="reset" name="btn_cancel">Cancel</button>
    </div>
  
  </div>

  
</form>
</center>        
        
                </section>
                
            </div>
        </section>

        
    </body>
</html>
