<?php

$name = $_POST['name'];
$email = $_POST['email'];
$mno = $_POST['mno'];
$you = $_POST['you'];
$feed = $_POST['feed'];

//Database connection

$conn = new mysqli('localhost','root','','sportsacademy');
if($conn->connect_error){
    die('Connection failed :' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into contact1 (name, email, mno, you, feed) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $name, $email, $mno, $you, $feed);
    $stmt->execute();
    
    
    $stmt->close();
    $conn->close();
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style1.css">
    </head>
    <body>
    <style>
        #appo{
            
            border:2px solid black;
            margin: auto;
            margin-top:100px;
            text-align:center;
            width: 500px;
            padding: 30px;
        }
    </style>
   

    <div id="appo">

   
    <h1>Your Feedback has submitted.</h1>
    <h3 style="margin: 15px; 0 15px 0">Thanks for the feedback.<h3>
    <h2 style="margin: 15px; 0 15px 0"><a href="mailto:asports429@gmail.com" style="text-decoration: none; color: black;"><p><strong> For further details contact us on : </strong> asports429@gmail.com</p></a>
          <h2>
    <center><div><p id="pay" class="gam"  ><b><a href="contact.html" onclick="history.go(-1)" style="text-decoration: none; color: rgb(5, 12, 18);"> Go Back</a></b> </p> </div></center>

</div>
    </body>
    
</html>