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

   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>         
   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">	
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style1.css">
    
<style>
  #trainer{
    text-decoration:none;
    color:black;
  }
</style>


    <script>
      function preback(){window.history.forward();}
      setTimeout("preback()",0);
      window.onunload=function(){null};
   </script>
   


   <script>

"use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('ucei48nz7udd');


</script>
    

</head>
<body>


<section id="header">
<a  class="logo" href="home.php"> Sports Academy</a>

            <div>
                <ul id="navbar">
                    <li><a class="active" href="home.php" ><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="sports.php"><i class="fa-solid fa-money-check-dollar"></i> Sports</a></li>
                    <li><a href="fill.php"><i class="fa-solid fa-blog"></i> Fill form</a></li>
                    <li><a href="about.php"><i class="fa-solid fa-address-card"></i> About</a></li>
                    <li><a href="contact.php"><i class="fa-solid fa-envelope-circle-check"></i> Contact Us</a></li>
                      
                    
                   <li id="bar1" > <a href="#"> <i data-bs-toggle="modal" data-bs-target="#staticBackdrop">

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


 
          
            <!-- responsive banner start-->


            <div id="hero">
                <div class="Portal">
                <h4>Sports which are going to change the world</h4>
                <h2> Never-give-up & Stay Focused</h2>
                <h1>Online Portal for Sports Academy</h1>
                <p>"Process is more important than the result." 
                <p>-MS Dhoni</p>
                </p>
                <a href="sports.html"><button class="normal">view more</button></a>
                </div>
                <div >
                <img class="brain" src="css/sports.jpg" width="100%" height="400px" >
                </div>
            </div>
           
            <!-- banner closing -->








            <!-- carousel start-->

          


            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="height:530px;"> 
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" style="padding: 20px;">
                  <div class="carousel-item active" data-bs-interval="10000"  >
                    <img src="css/ban4.png" width="100%" height="550px" class="d-block w-100" alt="..."  >
                 
                  
                    
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="css/ban1.png" width="100%" height="550px" class="d-block w-100" alt="...">
                   
                  </div>
                  <div class="carousel-item">
                    <img src="css/ban3.png" width="100%" height="550px" class="d-block w-100" alt="...">
                  
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true" ></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>



    
<!-- carousel end-->
        



<h2 id="head1" style="margin-top: 50px;"> Some Popular Sports<span style="color:#088178; font-size:x-large;">●</span></h2>


<!--sports page start-->

<section id="feature" class="section-p1">
    <div class="fe-box" >
        <div class="line">
         <div class="card1" >
        <img src="css/fb.jpg" alt="">
        <a href="soccer1.html"><h6>Soccer</h6></a>
     
        </div>
        </div>

    </div>

    <div class="fe-box">
        <div class="line">
        <div class="card1">
        <img src="css/cric.png" alt="">
        <a href="cricket1.html"><h6>Cricket</h6></a>
    
        </div>
        </div>

    </div>

    <div class="fe-box">
        <div class="line">
        <div class="card1">
        <img src="css/hk.jpeg" alt="">
        <a href="hockey1.html"><h6>Hockey</h6></a>
        
       
        </div>
        </div>

    </div>

    <div class="fe-box">
        <div class="line">
        <div class="card1">
        <img src="css/bm.jpg" alt="">
        <a href="badminton1.html"><h6>Badminton</h6></a>
   
    </div>
    </div>

    </div>

    <div class="fe-box">
        <div class="line">
        <div class="card1">
        <img src="css/bb.webp " alt="">
        <a href="basketball1.html"><h6>Basketball</h6></a>
      
        </div>
        </div>

    </div>

    <div class="fe-box">
        <div class="line">
        <div class="card1">
        <img src="css/vb.png " alt="">
        <a href="volleyball1.html"><h6>Volleyball</h6></a>

        </div>
        </div>
    </div>

   
<div id="hide1" >
    <div>
    <div class="hidden" >

    <div class="fe-box"  >
        <div class="line">
        <div class="card1">
        <img src="css/kb.svg" alt="">
        <a href="kabbadi1.html"><h6>kabbadi</h6></a>
       
        </div>
        </div>

    </div>

    <div class="fe-box" >
        <div class="line">
        <div class="card1">
        <img src="css/kho2.png" alt="">
        <a href="kho1.html"><h6>Kho-Kho</h6></a>
      
        </div>
        </div>
    </div>

    
    <div class="fe-box" >
        <div class="line">
        <div class="card1">
        <img src="css/ten.jpeg" alt="">
        <a href="tennis1.html"><h6>Tennis</h6></a>
      
        </div>
        </div>
    </div>


    
    <div class="fe-box" >
        <div class="line">
        <div class="card1">
        <img src="css/tt.png" alt="">
        <a href="tt1.html"><h6>Table-Tennis</h6></a>
   
        </div>
        </div>
    </div>


    
    <div class="fe-box" >
        <div class="line">
        <div class="card1">
        <img src="css/fc.png" alt="">
        <a href="fencing1.html"><h6>Fencing</h6></a>
     
        </div>
        </div>
    </div>

    <div class="fe-box"   >
        <div class="line">
        <div class="card1">
        <img src="css/gol.jpg" alt="">
        <a href="golf1.html"><h6>Golf</h6></a>
   
        </div>
       </div>
    </div>
   </div>
   </div>
</div>
</section>
<center><button id="toggle" >View more</button></center>

<script>
	const targetDiv = document.getElementById("hide1");
const btn = document.getElementById("toggle");
btn.onclick = function () {
  if (targetDiv.style.display !== "none") {
    targetDiv.style.display = "none";
    toggle.innerHTML = "View more";
  } else {
    targetDiv.style.display = "block";
    toggle.innerHTML = "view less";
  }
};
</script>

<!-- sports page end-->



<div class="clients">
  <div class="cli1">
  <li><i class="fa-light fa-solid fa-face-smile fa-3x"></i></li>
  <h2>1000+</h2>
  <h5>Trained Athelets</h5>
</div>
  <div class="cli1">
  <li><i class="fa-sharp fa-solid fa-flag-checkered  fa-3x"></i></li>
  <h2>200+</h2>
  <h5> Championships</h5>
</div>

<div class="cli1">
  <li><i class="fa-light fa-solid fa-user-plus  fa-3x"></i></li>
  <h2>50+</h2>
  <h5>Trainers</h5>
</div>
<div class="cli1">
  <li><i class="fa-solid fa-medal  fa-3x"></i></li>
  <h2>150+</h2>
  <h5>Achievements</h5>
</div>


  
</div>



<!-- news letter start -->
  
<section id="newsletter" class="section-p1 section-m1">

  <div class="newstext">
      <h4>Sign Up for the Newsletter</h4>
      <p>Get an e-mail updates about our latest creative !deas and <span>huge discount</span></p>
  </div>
  
  <form class="form1" action="newsletter.php" method="post">
      <input type="email" id="email" name="email" placeholder="your email address" onfocus="" required >
      <input type="submit"  value="send" id="btn1" name="submit" style="width: 30%;">
   
</form>
  </section>
 

  
  
  <!-- news letter end -->

  


  <!-- our trainers-->

  <div>
<h2 id="head1" style="margin-top: 50px;">Our Top Trainers<span style="color: #088178; font-size:x-large;">●</span></h2>

</div>


<div class="tr-con">
  <div class="tr">
    <img src="trainer/sra.png"  >

    <h4 ><a id="trainer" href="https://www.google.com/search?q=suresh+raina&rlz=1C1CHBF_enIN1015IN1015&oq=suresh+raina&aqs=chrome.0.0i355i433i512j46i433i512j0i131i433i512j0i512j0i131i433i512j0i512l4j0i433i512.1899j0j7&sourceid=chrome&ie=UTF-8">Suresh Raina </a></h4>
    <p> Cricket Trainer</p>
    
    
  </div>


  <div class="tr">

    <img src="trainer/jvt-rohityadav.jpg" style="width: 300px; height: 300px; border-radius: 50%; padding-top: 5px;"  >

    <h4 ><a id="trainer" href="https://wikibio.in/rohit-yadav/">Rohit Yadav </a></h4>
    <p>Javelin Throw trainer</p>
    
    
  </div>


  <div class="tr">

    <img src="trainer/tt-sharathkamal.jpeg" style="width: 300px; height: 300px; border-radius: 50%; padding-top: 5px;"  >

    <h4 ><a id="trainer" href="https://en.wikipedia.org/wiki/Sharath_Kamal">Sharath Kamal </a></h4>
    <p>Table-Tennnis trainer</p>
    
    
  </div>


  <div class="tr">

    
    <img src="trainer/bbt.jpg" style="width: 300px; height: 300px; border-radius: 50%; padding-top: 5px;"  >

    <h4 ><a id="trainer" href="https://www.google.com/search?q=drew+hanlen&rlz=1C1CHBF_enIN1015IN1015&oq=dre&aqs=chrome.0.69i59j69i57j69i60l3.4602j0j7&sourceid=chrome&ie=UTF-8">Drew hanlen </a></h4>
    <p>Basketball trainer</p>
    
    
  </div>


  <div class="tr">
    <img src="trainer/che-rb-ramesh.jpeg" style="width: 300px; height: 300px; border-radius: 50%; padding-top: 5px;"  >

    <h4 ><a id="trainer" href="https://www.google.com/search?q=rb+ramesh&rlz=1C1CHBF_enIN1015IN1015&oq=rb+ramesh&aqs=chrome..69i57.6680j0j7&sourceid=chrome&ie=UTF-8">Ramchandra Ramesh </a></h4>
    <p>Chess trainer</p>
  </div>


  <div class="tr">
    <img src="trainer/anup-kabb.webp" style="width: 300px; height: 300px; border-radius: 50%; padding-top: 5px;"  >

    <h4 ><a id="trainer" href="https://en.wikipedia.org/wiki/Anup_Kumar_(kabaddi)">Anup Kumar</a></h4>
    <p>kabbadi trainer</p>
    
    
  </div>


  <div class="tr">
    <img src="trainer/bire-hock.webp" style="width: 300px; height: 300px; border-radius: 50%; padding-top: 5px;"  >

    <h4 ><a id="trainer" href="https://en.wikipedia.org/wiki/Birendra_Lakra">Birendra Lakra </a></h4>
    <p>Hockey trainer</p>
    
    
  </div>

  <div class="tr">
    <img src="trainer/s-chateri-fb.jpeg" style="width: 300px; height: 300px; border-radius: 50%; padding-top: 5px;"  >

    <h4 ><a id="trainer" href="https://en.wikipedia.org/wiki/Sunil_Chhetri">Sunil Chhetri</a></h4>
    <p>Football trainer</p>
    
    
  </div>

  <div class="tr">
    <img src="trainer/mk-volley.jpg" style="width: 300px; height: 300px; border-radius: 50%; padding-top: 5px;"  >

    <h4 ><a id="trainer" href="https://en.wikipedia.org/wiki/Mohan_Ukkrapandian">Mohan Ukkrapandian</a></h4>
    <p>Volleyball trainer</p>
    
    
  </div>

  <div class="tr">
    <img src="trainer/shri-bad.jpeg" style="width: 300px; height: 300px; border-radius: 50%; padding-top: 5px;"  >

    <h4 ><a id="trainer" href="https://en.wikipedia.org/wiki/Srikanth_Kidambi">Srikanth Kidambi</a></h4>
    <p>Badminton trainer</p>
    
    
  </div>

  
</div>


  <!-- our trainer end-->
  

  
<div><h2 id="se1">We also send coaches from our Academy for Training Session in Schools & Colleges</h2></div>
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