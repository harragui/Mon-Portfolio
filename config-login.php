<?php
    session_start();
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName="abdelilah";
    $db =  mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // email and password sent from form    
      $myemail = mysqli_real_escape_string($db,strtolower($_POST["email"]));
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);      
      $sql = "SELECT id FROM logex WHERE email = '$myemail' and passw = '$mypassword'";
      $result = mysqli_query($db,$sql);  
      $count = mysqli_num_rows($result);     
      // If result matched $myemail and $mypassword, table row must be 1 row	
      if($count == 1) {   
         $_SESSION['login_user'] = $myemail;     
         header("location: dashbord/index.php");
      }else{
        header("location:login.php");
        die();    
     }
   }  
?>