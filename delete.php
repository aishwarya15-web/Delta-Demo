<?php
include("common/db_connect.php");

$pagename = "delete";

session_start();
if (empty($_SESSION['username'])) {
    echo "<script>window.open('login.php','_self')</script>";
}


if(isset($_POST['deletebtn']))  
{	
        $stud_id=$_POST["delete_stud_id"];
		$sql = "DELETE FROM stud_registration_tb WHERE stud_id=$stud_id";
        if ($conn->query($sql) === TRUE) 
            {
                echo "<script>window.alert('Record Deleted Successfully');</script>";
                echo "<script>window.open('delete.php','_self')</script>";
                die;
            }
        else {
                echo "Error deleting record: ";
                $conn->error;
            }
        $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>COCSIT</title>

    <link href="style/style.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <?php include("common/admin_menu.php"); ?>
    <?php include("common/header.php"); ?>

    <section class="page-section">
        <div class="container">
            <section class="introduction">
                <h1>
                    Delete Selected Student From Table
                </h1>
                
            <table align="center" cellspacing="0" cellpadding="10px;" border="1">
 	<tr style="background-color:#003366; color:#FFFFFF;">
        <th>Delete</th>		
        <th>Student ID</th>
        <th>Full Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Class</th>
        <th>Status</th>
    </tr>
    <?php 
		$query="SELECT * FROM stud_registration_tb JOIN class_tb ON stud_registration_tb.class_id=class_tb.class_id ORDER BY stud_id DESC";                                       
		$result = mysqli_query($conn, $query);
		$rowcount=mysqli_num_rows($result);
		if($rowcount> 0)
		{		
				$srno = 0;
				while($datarow = mysqli_fetch_array($result))
			{
			$srno++;
			
			?>
             <tr>
                    <td>
                    <form name="form" method="post" style="all: initial;">
             		<input type="submit" name="deletebtn" value="Delete" style="width: 80px; background-color: red; color: #FFFFFF; padding: 5px; border-radius: 30px;"> 
                    <br>
                    <input type="hidden" name="delete_stud_id" value="<?php echo $datarow['stud_id'];?>">

                    </form>    
                    </td>
                    <td>
             		<?php echo $datarow['stud_id'];?>       
                    </td>
                    <td>
                    <?php echo $datarow['stud_full_name'];?>
                    </td>
                    <td>
                    <?php echo $datarow['stud_mobile'];?>
                    </td>
                    <td>
                    <?php echo $datarow['stud_email'];?>
                    </td>
                    <td>
                    <?php echo $datarow['stud_address'];?>
                    </td>
                    <td>
                    <?php echo $datarow['stud_gender'];?>
                    </td>
                    <td>
                    <?php echo $datarow['class_name'];?>
                    </td>
                    <td>
                    <?php if ($datarow['stud_status'] == 1){echo "Active";}else{echo "In-Active";};?>
                    </td>
            </tr>
			<?php
			}
		}	
	?>
    
</table>
            </section>

        </div>
    </section>

    <?php include("common/footer.php"); ?>
</body>

</html>