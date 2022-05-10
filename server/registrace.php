<?php
@require('db.php');
session_start();
if(isset($_POST["newusername"]) && isset($_POST["newemail"]) && isset($_POST["newpassword"]) && isset($_POST["newanswer"]))
{
$username = $_POST["newusername"];
$email = $_POST["newemail"];
$password = $_POST["newpassword"];
$answer = $_POST["newanswer"];
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
    echo '<div style="color:red"><p>Uživatel již existuje</p></div>';
  return false;
}

$sql = "INSERT INTO users(username,email,password,answer) VALUES ('$username','$email','$passwordHash','$answer')";

if ($conn->query($sql) === TRUE) {
    echo '<div style="color:green"><p>Registrace byla úspěšná !</p></div>';


    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['success'] ="Uživatel je registrován !";

   // header('location: ../index.php');

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else
{
    //Chyba
    echo '<div style="color:red"><p>Chyba !</p></div>';
}