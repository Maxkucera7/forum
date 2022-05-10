<?php
require ('db.php');

if(isset($_request['id'])){
  
     $id = $_REQUEST['id'];
 
     echo($id);

     $sql = "SELECT * FROM posts where id=$id";
     $query = mysqli_connect($conn,$sql);
     
}