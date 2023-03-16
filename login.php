<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn,($_POST['email']));
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">	
   <!-- restriction to go back -->

   <script>
      function preback(){window.history.forward();}
      setTimeout("preback()",0);
      window.onunload=function(){null};
   </script>

   

</head>
<body>


<section id="header">
<a  class="logo" href="home1.html"> Sports Academy</a>

            <div>
                <ul id="navbar">
                    <li><a href="home1.html" ><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="sports.html"><i class="fa-solid fa-money-check-dollar"></i> Sports</a></li>
                    <li><a href="fill.html"><i class="fa-solid fa-blog"></i> Fill Form</a></li>
                    <li><a href="about.html"><i class="fa-solid fa-address-card"></i> About</a></li>
                    <li><a href="contact.html"><i class="fa-solid fa-envelope-circle-check"></i> Contact Us</a></li>
                    <li><a class="active" href="login.php"><i class="fa-solid fa-sign-in"></i> Login</a></li>   
                    <p id="close"><i class="fa fa-times"></i> </p>
                </ul>

            </div>
            <!-- responsive hamberger icon code -->

            <div id="mobile">
              
              <i id="bar" class="fas fa-outdent"> </i>
          </div>

        </section>


 
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
      <a href="forgot-password.php">forgot password?</a>
      <p>don't have an account? <a href="register.php">regiser now</a></p>
   </form>

</div>





  <!-- footer -->
<!-- footer start -->



<footer>

  <div class="foo1">
      <a  class="logo" href="home1.html"> Sports Academy</a>
          <h4>Contact Us</h4>
          <p><strong>Address: </strong>Kamraj Nagar, Ghatkopar(E), Sports Academy.</p>
          <p><strong>Phone No: </strong>9082428735</p>
          <a href="mailto:asports429@gmail.com" style="text-decoration: none; color: black;"><p><strong> Email: </strong> asports429@gmail.com</p></a>
          <p><strong>Avilability:</strong>24/7</p>



          
          <div class="follow_us" >
              <h4>Follow us on Social Media</h4>

              <div class="icons">
                <a id="foota" href="https://www.youtube.com/@acpsachingaming8986"><i class="fa-brands fa-youtube fa-2x"></i></a>
                 <a id="foota" href="https://www.twitter.com/@SportsA60948427"> <i class="fa-brands fa-twitter fa-2x"></i></a>
                 <a id="foota" href="https://www.facebook.com/profile.php?id=100030685280523"> <i class="fa-brands fa-facebook fa-2x"></i></a>
                 <a id="foota" href="https://www.instagram.com/chandangupta9294/"> <i class="fa-brands fa-square-instagram fa-2x" ></i></a>
              </div>    

  </div>

  </div>
</div>

  <div class="foo1" >

                      <center><h4>About</h4><br></center>
           <ul>
                      
         <li> <a href="about.html" id="foota">About Us</a></li>
         <li> <a href="sports.html" id="foota">our sports</a></li>
          <li><a href="privacy.html" id="foota">Privacy Policy</a></li>
         <li> <a href="tc.html" id="foota">Terms & Conditions</a></li>
         <li> <a href="contact.html" id="foota">Contact Us</a></li>
     </ul>
      

  </div>

  <div class="foo1" >


         <center> <h4> Timing </h4><br></center>
          <ul>

         
              <li id="tm">Mon :5:30am-8:30pm</li>
              <li id="tm">Tue :5:30am-8:30pm</li>
              <li id="tm">Wed :5:30am-8:30pm</li>
              <li id="tm">Thu :5:30am-8:30pm</li>
              <li id="tm">Fri :5:30am-8:30pm</li>
              <li id="tm">Sat :5:30am-6:30pm</li>
              <li id="tm">Sun : closed</li>
     </ul>
      

  </div>


  <div class="foo1">
      <h4>Install our App</h4>
<p>From Google Play Store or App Store</p>
<div class="row">
<img src="css/gp1.png" style="height:70px; width: 300px;">
<img src="css/as.png" style="height:70px; width: 300px;">
</div>
<p>Secured Payment Options</p>
<img src="css/pg.png" style="height:150px; width: 400px;">

</div>


  </div>
</footer>

  <center> 
      <div class="copyright">
      <p>All right reserved &#169; 2023 Sports Academy</p>

  </div>
</center>


<script src="js/script.js"></script>
</body>
</html>