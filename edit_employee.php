<?php
session_start();
if(empty($_SESSION['username']))
{
    header("Location: login.php");
}

include('common/db_connect.php');

if (isset($_POST['save_btn']))
{
    $emp_id=$_POST['emp_id'];
    $fullname=$_POST['fullname'];
	$address=$_POST['address'];
	$mobile=$_POST['mobile'];
    $email=$_POST['email']; 
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
    $doj=$_POST['doj'];
	$aadhar=$_POST['aadhar'];
	$salary=$_POST['salary'];

    $sql = "UPDATE emp_master_tb SET emp_fullname='$fullname',
    emp_address='$address',
    emp_mobile='$mobile',
    emp_email='$email',
    emp_gender='$gender',
    emp_dob='$dob',
    emp_doj='$doj',
    emp_aadhar_no='$aadhar',
    emp_salary='$salary' WHERE emp_id=$emp_id";
    

if ($conn->query($sql) === TRUE) 
	 {
        echo "<script>window.alert('Record Updated successfully');</script>";
        header('Location: '.$_SERVER['PHP_SELF']);
        die;
     }
else {
      echo "Error updating record: ";
	  $conn->error;
     }
$conn->close();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Management System- Dashboard</title>
</head>
<body>
<table cellspacing="0" cellpadding="10px;" width="100%" height="100%">
	<tr>
        <?php include('common/header.php');?>
    </tr>
    <tr>
    	<?php include('common/menu.php');?>
        <td style="background-color:#003366;"></td>
    </tr>
    <tr>
    	<td height="80%" valign="top">
        <h4>imp links</h4>
        <h4>imp links</h4>
        <h4>imp links</h4>
        <h4>imp links</h4>
        </td>
        <td>
            <h1>Edit Employee</h1>
<form name="reg_form"  method="POST">
<table>
    <tr>
        <td><label for="">Emp ID:</label></td>
        <td> <input type="text" name="emp_id" id="emp_id" required> </td>
    </tr>
    <tr>
        <td><label for="">Full Name:</label></td>
        <td> <input type="text" name="fullname" id="fullname" required> </td>
    </tr>
    <tr>
        <td><label for="">Address:</label></td>
        <td> <textarea name="address" id="address"></textarea> </td>
    </tr>
    <tr>
        <td><label for="">Mobile:</label></td>
        <td> <input type="text" name="mobile" id="mobile" required> </td>
    </tr>
    <tr>
        <td><label for="">Email:</label></td>
        <td> <input type="email" name="email" id="email" required> </td>
    </tr>
    <tr>
        <td><label for="">Gender:</label></td>
        <td> <input type="radio" name="gender" id="gender" value="male" required>Male &nbsp;&nbsp;&nbsp;
    &nbsp; <input type="radio" name="gender" id="gender" value="female" required>Female</td>
    </tr>
    <tr>
        <td><label for="">Date of Birth:</label></td>
        <td> <input type="date" name="dob" id="dob" required> </td>
    </tr>
    <tr>
        <td><label for="">Date of Joining:</label></td>
        <td> <input type="date" name="doj" id="doj" required> </td>
    </tr>
    <tr>
        <td><label for="">Aadhar Number:</label></td>
        <td> <input type="text" name="aadhar" id="aadhar" required> </td>
    </tr>
    <tr>
        <td><label for="">Monthly Salary:</label></td>
        <td> <input type="number" name="salary" id="salary" required> </td>
    </tr>
    <tr>
        <td><input type="submit" name="save_btn" id="save_btn" value="Save"></td>
        <td><input type="reset" name="clear_btn" id="clear_btn" value="Clear">  </td>
    </tr>
</table>
<br><br><hr><hr>
</form>
<table align="center" cellspacing="0" cellpadding="10px;" border="1">
 	<tr style="background-color:#003366; color:#FFFFFF;">
        <th>Emp id</th>
        <th>Fullname</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Date of Joining</th>
        <th>Aadhar Number</th>
        <th>Salary</th>
    </tr>
    <?php 
        $query="SELECT * FROM emp_master_tb";
		$result = mysqli_query($conn, $query);
		$rowcount=mysqli_num_rows($result);
		if($rowcount> 0)
		{		
			while($datarow = mysqli_fetch_array($result))
			{
			?>
             <tr>
                    <td> <?php echo $datarow['emp_id'];?>       </td>
                    <td> <?php echo $datarow['emp_fullname'];?> </td>
                    <td> <?php echo $datarow['emp_address'];?>  </td>
                    <td> <?php echo $datarow['emp_mobile'];?>   </td>
                    <td> <?php echo $datarow['emp_email'];?>    </td>
                    <td> <?php echo $datarow['emp_gender'];?>   </td>
                    <td> <?php echo $datarow['emp_dob'];?>      </td>
                    <td> <?php echo $datarow['emp_doj'];?>      </td>
                    <td> <?php echo $datarow['emp_aadhar_no'];?></td>
                    <td> <?php echo $datarow['emp_salary'];?>   </td>
            </tr>
			<?php
			}
		}	
	?>
    
</table>

        </td>
        <td></td>
    </tr>
    <tr>
    	<?php include('common/footer.php');?>
    </tr>
</table>
</body>
</html>
