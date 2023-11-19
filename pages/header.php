<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="reset.css">
    <title>Login</title>
</head>
<body>
    <nav style="display:flex; background-color: #000; color: #fff; align-items:center; justify-content:center;">
        <div id="container">
            <ul style="display: flex; flex-direction: row; padding: 10px; margin: 0;">
                <li style="margin-right: 20px;"><a href="contacts.php" style="text-decoration: none; color: #fff;">Contacts</a></li>
                <?php
                if (isset($_SESSION["userid"])) {
                    echo"<li style='margin-right: 20px';><a href='home.php' style='text-decoration: none; color: #fff;'>Home</a></li>";
                    echo"<li style='margin-right: 20px';><a href='./inc/logout.inc.php' style='text-decoration: none; color: #fff;'>Logout</a></li>";
                }else {
                    echo"<li style='margin-right: 20px';><a href='signup.php' style='text-decoration: none; color: #fff;'>Signup</a></li>";
                    echo"<li style='margin-right: 20px';><a href='login.php' style='text-decoration: none; color: #fff;'>Login</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>


    
