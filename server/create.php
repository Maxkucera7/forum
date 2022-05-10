<?php

require('db.php');

session_start();
date_default_timezone_set("UTC");
if(isset($_POST["newnadpis"]) && isset($_POST["newtext"]))
{
    $nadpis = $_POST["newnadpis"];
    $text = $_POST["newtext"];
    $user = $_SESSION['username'];
    $d = new DateTime();
    $date =  $d->format('Y-m-d');
   // $time =  $d->format('i:s.u');
   // $date = date('m/d/Y h:i:s a', time());
    $sql = "INSERT INTO posts(user,nadpis,text,datum) 
            VALUES ('$user','$nadpis','$text','$date')";


      
  
    if ($conn->query($sql) === TRUE) {
        echo 'ok';
    
    /* 
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['success'] ="Uživatel je registrován !"; */
    
       // header('location: ../index.php');
    
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}else{
    echo 'error';
}