<?php 
include "config.php";
session_start();
$user_id = $_SESSION['user_id'];


    //if user click change password button
    if(isset($_POST['change-password'])){
        
        $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
        $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    
   if( !empty($new_pass) || !empty($confirm_pass)){
   if($new_pass != $confirm_pass){
       $message[] = 'confirm password not matched!';
    }else{
       mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id '") or die('query failed');
       $message[] = 'password updated successfully!';
       header('location: login.php');
      
    }
 }
 


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off" style="border: 2px solid black; margin-top:200px; padding: 30px;">
                    <h2 class="text-center">New Password</h2>
                    <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="new_pass" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="confirm_pass" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button btn-primary" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>