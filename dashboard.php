
<?php
$pagename="dashboard";

session_start();
if(empty($_SESSION['username'])) 
{ echo "<script>window.open('login.php','_self')</script>"; }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>COCSIT</title>
        
        <link href="style/style.css" rel="stylesheet" type="text/css" />

    </head>
    <body>
        
    <?php include("common/admin_menu.php"); ?>
    <?php include("common/header.php"); ?>
        
        <section class="page-section">
            <div class="container">
                <section class="introduction">
                    <h1>Dashboard <br>Welcome to Student Registration Management System. </h1>
                    <a href="today_registerd_std.php" class="button" style="width: 300px;">Show Today's Registerd Students</a>
<br><br>
                    <a href="index.php" class="button" style="width: 300px;" target="_blank">Go to Home</a>
        
                </section>
            </div>
        </section>

        <?php include("common/footer.php"); ?>
    </body>
</html>
