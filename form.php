
<?php


$uname = $_POST['uname'];
$uemail = $_POST['uemail'];
$sno = $_POST['sno'];
$address = $_POST['address'];
$sports = $_POST['sports'];

//Database connection

$conn = new mysqli('localhost','root','','sportsacademy');
if($conn->connect_error){
    die('Connection failed :' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into form (uname, uemail, sno, address, sports) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $uname, $uemail, $sno, $address, $sports);


    
 if(!filter_var($_POST['uemail'], FILTER_VALIDATE_EMAIL)) {
    echo('<script> alert("Invalid email address!")</script>'); // Use your own error handling ;)
    
 }
 $select = mysqli_query($conn, "SELECT `uemail` FROM `form` WHERE `uemail` = '".$_POST['uemail']."'") or exit(mysqli_error($conn));
 if(mysqli_num_rows($select)) {
    exit('<h2>This email is already being used!</h2>');
 }
   
    $stmt->execute();

    
    $stmt->close();
    $conn->close();
}



?>