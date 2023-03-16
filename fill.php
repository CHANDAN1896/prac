<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>



          <!-- script for validation of dropdown -->
<script>

function validate(){
   var sport = document.myform.sports.value;
   if(sport==" "){
      alert("Please select a sport");
      document.myform.sports.focus();
      return false;
   }
}

</script> 



   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>         
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">	
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style1.css">
    

</head>
<body>


<section id="header">
<a  class="logo" href="home.php"> Sports Academy</a>

            <div>
                <ul id="navbar">

                    <li><a href="home.php" ><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="sports.php"><i class="fa-solid fa-money-check-dollar"></i> Sports</a></li>
                    <li><a class="active"  href="fill.php"><i class="fa-solid fa-blog"></i> Fill form</a></li>
                    <li><a href="about.php"><i class="fa-solid fa-address-card"></i> About</a></li>
                    <li><a href="contact.php"><i class="fa-solid fa-envelope-circle-check"></i> Contact Us</a></li>
                      
                    
                   <li> <a href="#"> <i id="bar1" data-bs-toggle="modal" data-bs-target="#staticBackdrop">

      <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      if($fetch['image'] == ''){
         echo '<img height="80px" width="80px" style="border-radius:50%" src="images/default-avatar.png">';
      }else{
         echo '<img width="80px" height="80px" style="border-radius:50%" src="uploaded_img/'.$fetch['image'].'">';
      }
      ?>
      </i></a></li>

      <p id="close"><i class="fa fa-times"></i> </p>
                </ul>


            </div>

            <!-- responsive hamberger icon code -->

            <div id="mobile">
              
              <i id="bar" class="fas fa-outdent"> </i>
          </div>


        </section>

        


<!-- Vertically centered scrollable modal -->
<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
         
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
        
        <div class="container" >

<div class="profile" >

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      if($fetch['image'] == ''){
         echo '<img src="images/default-avatar.png">';
      }else{
         echo '<img src="uploaded_img/'.$fetch['image'].'">';
      }
   ?>
   <h3><?php echo $fetch['name']; ?></h3>
   <a href="update_profile.php" class="btn">update profile</a>
   <a href="home1.html?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
   <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>
</div>

</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>




  <div class="form-container">

<form name="myform" method="post" action="form.php" >
   <h3>Select Sport</h3>

   <input type="text" name="uname" placeholder=" enter name" class="box" required>
   <input type="email" name="uemail" placeholder="enter email" class="box" required>
   <input type="text" pattern="[6789][0-9]{9}" name="sno" placeholder="enter no" class="box" required>
   <input type="text" name="address" placeholder="enter address" class="box" required >
   
   <select name="sports" class="box" required>
    
  
 
   <option value=" ">Select a sport</option>
        <option value="Badminton">Badminton</option>
        <option value="Basketball">Basketball</option>
        <option value="Boxing">Boxing</option>
        <option value="Carrom">Carrom</option>
        <option value="Chess">Chess</option>
        <option value="Cricket">Cricket</option>
        <option value="Fencing">Fencing</option>
        <option value="Football">Football</option>
        <option value="Golf">Golf</option>
        <option value="Hockey">Hockey</option>
        <option value="Javelin-Throw">Javelin-Throw</option>
        <option value="kabbadi">kabbadi</option>
        <option value="Kho-Kho">Kho-Kho</option>
        <option value="Table-Tennis">Table-Tennis</option>
        <option value="Tennis">Tennis</option>
        <option value="Volleyball">Volleyball</option>
        <option value="Weight lifting">Weight lifting</option>
        <option value="Wrestling">Wrestling</option>
       
   
   </select>
   <input type="submit" name="submit" value="submit" class="btn" >


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