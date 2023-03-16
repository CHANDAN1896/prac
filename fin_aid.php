<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];



if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $education = mysqli_real_escape_string($conn, $_POST['education']);
   $employment = mysqli_real_escape_string($conn, $_POST['employment']);
   $earning = mysqli_real_escape_string($conn, $_POST['earning']);
   $income = mysqli_real_escape_string($conn, $_POST['income']);
   $reason = mysqli_real_escape_string($conn, $_POST['reason']);
   $sport = mysqli_real_escape_string($conn, $_POST['sport']);
   
   


   $select = mysqli_query($conn, "SELECT * FROM `fin_aid` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'you have already applied for financial aid of kindly check your mail box'; 
   } else{
         $insert = mysqli_query($conn, "INSERT INTO `fin_aid`(name, email, education, employment, earning, income, reason, sport) VALUES('$name', '$email', '$education', '$employment', '$earning', '$income', '$reason', '$sport')") or die('query failed');

         
         if($insert){
          
             
$subject = "Financial Aid";
$message = " Hey $name

    We have recieved your request for Financial Aid of $sport . We would like to work with you your request is under verification we will back to you soon.


Thanks & Regards,

Sports Academy.
";
$sender = "From: asports429@gmail.com";
if(mail($email, $subject, $message, $sender)){
   echo"email sent properly";
  
}
else{
   echo"not sent";
}
           
            header('location:home.php');
         }else{
            $message[] = 'Application failed!';
         }
      }
   

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Financial aid</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" referrerpolicy="no-referrer" />


              <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>         
   
<script>

function validate(){
var education = document.faid.education.value;
var employment = document.faid.employment.value;
var earning = document.faid.earning.value;
var income = document.faid.income.value;
var sport = document.faid.sport.value;

if(education==" "){
    alert("Please select  Education");
    document.faid.education.focus();
    return false;
}

if(employment==" "){
    alert("Please select  Employment status");
    document.faid.employment.focus();
    return false;
}

if(earning==" "){
    alert("Please select a Earning");
    document.faid.earning.focus();
    return false;
}

if(income==" "){
    alert("Please select a Income");
    document.faid.income.focus();
    return false;
}


 if(sport==" "){
            alert("Please select a sport");
            document.faid.sport.focus();
            return false;
        }

}

</script> 
</head>
<body>



   
<div class="form-container">



   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" name="faid" enctype="multipart/form-data" onsubmit="return validate()" >
   <h2>Financial Aid Form</h2>
      <?php
         
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>

      
        
            <input type="text" style="display:none;"  name="name" value="<?php echo $fetch['name']; ?>" class="box">
           
            <input type="email" style="display:none;"  name="email" value="<?php echo $fetch['email']; ?>" class="box">

   <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="education">
  <option selected value=" " >Education</option>
  <option value="Highschool"> High school</option>
  <option value="Somecollege">Some college</option>
  <option value="master">Marter's/Advanced degree</option>
  <option value="other">Other</option>
  
   </select>

   <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="employment">
  <option selected value=" ">Employement Status</option>
  <option value="Partime">Part time</option>
  <option value="Fulltime">Full time</option>
  <option value="Unemployed">Unemployed</option>
  <option value="Student">Student</option>
  <option value="Other">Other</option>
   </select>


   <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="earning">
  <option selected value=" ">Earning Member</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">More than two</option>
   </select>


   <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name ="income">
  <option selected value=" ">Income</option>
  <option value="0-1 lakh">0 - 1 Lakh</option>
  <option value="1-2 lakhs">1 - 2 Lakhs</option>
  <option value="2-4 lakhs">2 - 4 Lakhs </option>
  <option value="4 lakhs+">More than 4 Lakhs </option>
   </select>



   <select name="sport" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" >
     
     <option selected value=" ">Select a sport</option>
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

   <textarea name="reason" rows="6" placeholder=" Reason you applied for aid" class="box" required></textarea>
     

<input type="submit"  name="submit" value="submit" class="btn btn-primary" >
   </form>

</div>


</body>
</html>

