<?php
require('db.php');
session_start();
if(isset($_SESSION['username'])){
    header("Location: ../index.php");
}else{
    $email = $_POST["newemail"];
    $password = $_POST["newpassword"];

    $sql = "SELECT password,username,role FROM users WHERE email='$email'";
   
    $res = $conn->query($sql);
    if($conn->error) { 
        
    }
    else {
        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            $hash = $row["password"];
            if(password_verify($password, $hash)) {
                echo "ok";
                if($row["role"] == 1){
                    $_SESSION["admin"] = $row["role"];
                }
                
                $_SESSION["username"] = $row["username"]; 
               
            } else {
                echo "Špatné heslo!";
            }
        } else {
            echo "Chyba! Neexiustuješ!";
        }
    }
}
