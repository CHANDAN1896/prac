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



    

<style>
    
    /* about us css */
    
    
    img{
        border-radius: 10px;
        color: aliceblue;
    }
    #ph{
        background: red;
        display: flex;
    }
    #phc{
        
        border: 2px solid black;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    
    
    
    
    
    
    
    /* road map start */
    
    .container1{
    margin-top: 20px;
    }
    .timeline {
    position: relative;
    padding: 0;
    list-style: none;
    }
    .timeline:before {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 40px;
    width: 2px;
    margin-left: -1.5px;
    content: "";
    background-color: #e9ecef;
    }
    .timeline > li {
    position: relative;
    min-height: 50px;
    margin-bottom: 50px;
    }
    .timeline > li:after, .timeline > li:before {
    display: table;
    content: " ";
    }
    .timeline > li:after {
    clear: both;
    }
    .timeline > li .timeline-panel {
    position: relative;
    float: right;
    width: 100%;
    padding: 0 20px 0 100px;
    text-align: left;
    }
    .timeline > li .timeline-panel:before {
    right: auto;
    left: -15px;
    border-right-width: 15px;
    border-left-width: 0;
    }
    .timeline > li .timeline-panel:after {
    right: auto;
    left: -14px;
    border-right-width: 14px;
    border-left-width: 0;
    }
    .timeline > li .timeline-image {
    position: absolute;
    z-index: 100;
    left: 0;
    width: 80px;
    height: 80px;
    margin-left: 0;
    text-align: center;
    color: white;
    border: 7px solid #e9ecef;
    border-radius: 100%;
    background-color: #ffc800;
    z-index: 0;
    }
    .timeline > li .timeline-image h4, .timeline > li .timeline-image .h4 {
    font-size: 10px;
    line-height: 14px;
    margin-top: 12px;
    }
    .timeline > li.timeline-inverted > .timeline-panel {
    float: right;
    padding: 0 20px 0 100px;
    text-align: left;
    }
    .timeline > li.timeline-inverted > .timeline-panel:before {
    right: auto;
    left: -15px;
    border-right-width: 15px;
    border-left-width: 0;
    }
    .timeline > li.timeline-inverted > .timeline-panel:after {
    right: auto;
    left: -14px;
    border-right-width: 14px;
    border-left-width: 0;
    }
    .timeline > li:last-child {
    margin-bottom: 0;
    }
    .timeline .timeline-heading h4, .timeline .timeline-heading .h4 {
    margin-top: 0;
    color: inherit;
    }
    .timeline .timeline-heading h4.subheading, .timeline .timeline-heading .subheading.h4 {
    text-transform: none;
    }
    .timeline .timeline-body > ul,
    .timeline .timeline-body > p {
    margin-bottom: 0;
    }
    
    @media (min-width: 768px) {
    .timeline:before {
    left: 50%;
    }
    .timeline > li {
    min-height: 100px;
    margin-bottom: 100px;
    }
    .timeline > li .timeline-panel {
    float: left;
    width: 41%;
    padding: 0 20px 20px 30px;
    text-align: right;
    }
    .timeline > li .timeline-image {
    left: 50%;
    width: 100px;
    height: 100px;
    margin-left: -50px;
    }
    .timeline > li .timeline-image h4, .timeline > li .timeline-image .h4 {
    font-size: 13px;
    line-height: 18px;
    margin-top: 16px;
    }
    .timeline > li.timeline-inverted > .timeline-panel {
    float: right;
    padding: 0 30px 20px 20px;
    text-align: left;
    }
    }
    @media (min-width: 992px) {
    .timeline > li {
    min-height: 150px;
    }
    .timeline > li .timeline-panel {
    padding: 0 20px 20px;
    }
    .timeline > li .timeline-image {
    width: 150px;
    height: 150px;
    margin-left: -75px;
    }
    .timeline > li .timeline-image h4, .timeline > li .timeline-image .h4 {
    font-size: 18px;
    line-height: 26px;
    margin-top: 30px;
    }
    .timeline > li.timeline-inverted > .timeline-panel {
    padding: 0 20px 20px;
    }
    }
    @media (min-width: 1200px) {
    .timeline > li {
    min-height: 170px;
    }
    .timeline > li .timeline-panel {
    padding: 0 20px 20px 100px;
    }
    .timeline > li .timeline-image {
    width: 170px;
    height: 170px;
    margin-left: -85px;
    }
    .timeline > li .timeline-image h4, .timeline > li .timeline-image .h4 {
    margin-top: 40px;
    }
    .timeline > li.timeline-inverted > .timeline-panel {
    padding: 0 100px 20px 20px;
    }
    }
    
    .page-section {
    padding: 6rem 0;
    }
    .page-section h2.section-heading, .page-section .section-heading.h2 {
    font-size: 2.5rem;
    margin-top: 0;
    margin-bottom: 1rem;
    }
    .page-section h3.section-subheading, .page-section .section-subheading.h3 {
    font-size: 1rem;
    font-weight: 400;
    font-style: italic;
    font-family: "Roboto Slab", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    margin-bottom: 4rem;
    }
    
    @media (min-width: 768px) {
    section {
    padding: 9rem 0;
    }
    }
    
    .text-center {
    text-align: center !important;
    }
    
    .page-section h2.section-heading, .page-section .section-heading.h2 {
    font-size: 2.5rem;
    margin-top: 0;
    margin-bottom: 1rem;
    }
    .text-uppercase {
    text-transform: uppercase !important;
    }
    
    .page-section h3.section-subheading, .page-section .section-subheading.h3 {
    font-size: 1rem;
    font-weight: 400;
    font-style: italic;
    font-family: "Roboto Slab", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    margin-bottom: 4rem;
    }
    
    .text-muted {
    --bs-text-opacity: 1;
    color: #6c757d !important;
    }
    
    p {
    line-height: 1.75;
    }
    
    /* road map end */
    
    
    
    
    
    
    
    
    /* about us en*/
    </style>
    

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
                    <li><a href="fill.php"><i class="fa-solid fa-blog"></i> Fill form</a></li>
                    <li><a class="active" href="about.php"><i class="fa-solid fa-address-card"></i> About</a></li>
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

 






  
        <!-- road map start-->

<section class="page-section" id="about">
    <div class="container1">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..."></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2009-2011</h4>
                        <h4 class="subheading">Our Humble Beginnings</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..."></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>March 2011</h4>
                        <h4 class="subheading">An Agency is Born</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..."></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>December 2015</h4>
                        <h4 class="subheading">Transition to Full Service</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..."></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>July 2020</h4>
                        <h4 class="subheading">Phase Two Expansion</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Be Part
                        <br>
                        Of Our
                        <br>
                        Story!
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>

<!-- road map end -->
        <section>
            
            <div id="ph">
                
                <img src="trainer/me.jpeg" height="500px">

                <p id="phc">
                    <h1>MEET CHANDAN</h1>

                    Chandan gupta is from india.
                </p>
            </div>
        </section>
        













  <!-- footer -->
<!-- footer start -->



<footer>

  <div class="foo1">
      <a  class="logo" href="home.php"> Sports Academy</a>
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
                      
         <li> <a href="about.php" id="foota">About Us</a></li>
         <li> <a href="sports.php" id="foota">our sports</a></li>
          <li><a href="privacy.html" id="foota">Privacy Policy</a></li>
         <li> <a href="tc.html" id="foota">Terms & Conditions</a></li>
         <li> <a href="contact.php" id="foota">Contact Us</a></li>
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