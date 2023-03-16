
<div>

<!--newsletter php connection-->

<?php

$email = $_POST['email'];
$conn = new mysqli('localhost','root','','sportsacademy');
if ($conn->connect_error){
 die('connection failed:'.$connect_error);
}else{
 $stmt = $conn ->prepare("insert into newsletter (email) values(?)");
 $stmt->bind_param("s",$email);

 
 if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   exit('<h2>Invalid email address!</h2>'); // Use your own error handling ;)
   
}
$select = mysqli_query($conn, "SELECT `email` FROM `newsletter` WHERE `email` = '".$_POST['email']."'") or exit(mysqli_error($conn));
if(mysqli_num_rows($select)) {
   exit('<h2>This email is already being used!</h2>');
}
  
 $stmt->execute();
 

 
 $stmt ->close();
 $conn ->close();
}

?>


</div>

<html>
<head>
    <title>email</title>
    
</head>
<body>
<h1>Thanks for your valuable feedback</h1>
<a href="home1.html">go back </a>






<?php


?>

</body>

   
</html>