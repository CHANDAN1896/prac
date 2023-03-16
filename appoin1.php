<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$sno = $_POST['sno'];

$errors = array();


//Database connection

$conn = new mysqli('localhost','root','','sportsacademy');
if($conn->connect_error){
    die('Connection failed :' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into appointment (name, email, sno) values(?, ?, ?)");
    $stmt->bind_param("ssi", $name, $email, $sno, );


            $subject = "Appointment Booking";
            $message = " Hey $name
            
                We have recieved your request for appointment booking.this your confirmation email you can visit our Academy as per the given date on Appointment Form Timing for the visit is from 8:00 Am to 5:00 Pm.


Thanks & Regards,

Sports Academy.
            ";
            $sender = "From: asports429@gmail.com";
            if(mail($email, $subject, $message, $sender))
               echo"email sent properly";
            else
               echo"not sent";
   
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        exit('<h2>Invalid email address!</h2>'); // Use your own error handling ;)
        
     }
     $select = mysqli_query($conn, "SELECT `email` FROM `appointment` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($conn));
     if(mysqli_num_rows($select)) {
        exit('<h2> Your appointment has already booked!</h2><br> <h4> We have Sent you an confirmation email on your registered email. <center><div><p id="pay" class="gam"  ><b><a href="sports.php" onclick="history.go(-1)" style="text-decoration: none; color: rgb(5, 12, 18);"> Go Back</a></b> </p> </div></center>');

     }
    //  $select = mysqli_query($conn, "SELECT `sno` FROM `appointment` WHERE `sno` = '".$_POST['sno']."'") or exit(mysqli_error($conn));
    //  if(mysqli_num_rows($select)) {
    //     exit('<h2> this number already exist try with another number!</h2>');
    //  }
    
    $stmt->execute();
    
    
    $stmt->close();
    $conn->close();
}
?>

<html>

<head>
<link rel="stylesheet" href="style1.css">
    <style>
        #appo{
            
            border:2px solid black;
            margin: auto;
            margin-top:100px;
            text-align:center;
            width: 500px;
            padding: 30px;
            margin-bottom:100px;
        }
        #ud{
            text-transform:uppercase;
            padding-top:10px;
           margin-left:-100px;
        }
    </style>

  


<script>
      function preback(){window.history.forward();}
      setTimeout("preback()",0);
      window.onunload=function(){null};
   </script>
   
    </head>
    <body>

   
    <div id="appo">

   
    <h1>Your Appointment for Ground Visit of our Academy has submitted.</h1>
    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
    <h3 style="margin: 15px; 0 15px 0">This Appointment will only active for tommorrow only.</h3>
    <h2 style="margin: 15px; 0 15px 0">Visitors Timing: 8:00 am to 5pm .</h2>
    <center><div><p id="pay" class="gam"  ><b><a href="sports.html" onclick="history.go(-1)" style="text-decoration: none; color: rgb(5, 12, 18);"> Go Back</a></b> </p> </div></center>

</div>


<div id="appo">
    <h3 style="padding-bottom:10px; border-bottom:1px solid black;">Appointment Form </h3>
<p  class="logo" style="padding-top:20px;" > Sports Academy</p>
<p style="padding-top:20px; margin-left: -203px;"><span id="ud">Name :</span> <?php echo $name; ?></p>
<p style="padding-top:10px; margin-left: -100px;"><span id="ud">Contact No :</span> <?php echo  $sno; ?></p>
<p style="padding-top:10px; "><span id="ud">Email :</span> <?php echo  $email; ?></p>

<p style="padding-top:10px; margin-left: -113px;"><span id="ud">Timing : 8:00 am to 5pm </span></p>

<p style="padding-top:10px; padding-bottom:20px; margin-left: -70px;"><span id="ud">Appointment Date :</span>  <script>
    
    var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
   var day = currentDate.getDate()
   var month = currentDate.getMonth() + 1
   var year = currentDate.getFullYear()
   document.write("<b>" + day + "/" + month + "/" + year + "</b>")
   
       </script></p>

<p style="padding-top:20px; border-top:1px solid black;"> We have Sent you an email on your registerd email for booking confirmation.</p>

</div>
    </body>
    
</html>