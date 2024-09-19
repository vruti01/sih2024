<?php

   $connection = mysqli_connect('localhost','root','','user_db');

   if(isset($_POST['send'])){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $subject = $_POST['subject'];
      $email = $_POST['email'];
      $massage = $_POST['massage'];
    
      $request = " insert into contact_data(fname,lname,subject,email,massage ) values('$fname','$lname','$subject','$email','$massage') ";
      mysqli_query($connection, $request);

     header('location:index.php'); 

   }else{
      echo 'something went wrong please try again!';
   }

?>