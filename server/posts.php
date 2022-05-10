<?php
require('db.php');
session_start();

$sql = "SELECT * FROM posts";
$result = $conn->query($sql);

//single page
if(isset($_GET['id'])){
  
    $id = $_GET['id'];

    $sqlPOST = "SELECT * FROM posts where id=$id";
    $post = $conn->query($sqlPOST);

    //komenty
    $sqlComment = "SELECT * FROM comments WHERE post_id='$id'";
    $resultComment = $conn->query($sqlComment);

    
    
}

