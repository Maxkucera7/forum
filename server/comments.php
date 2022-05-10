<?php
require ('db.php');
session_start();

            if(isset($_POST["newcomment"]))
            {
                $comment = $_POST["newcomment"];
                $post_id = $_POST["newid"];
                if (empty($_SESSION["username"])) {
                    $username = null;
                }else{
                    $username = $_SESSION["username"];
                }
                
                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = $conn->query($sql) or die($conn->error);

                if (strlen($comment) > 5) {


                            //check if registrej a ma id
                            if($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $user = $row["username"];

                                $sql = "INSERT INTO comments(post_id,text,user_id) VALUES ('$post_id','$comment','$user')";
                                if ($conn->query($sql) === TRUE) {
                                    echo 'ok';
                                
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                            
                            } 
                            
                            //je to guest
                            else {
                            
                                $sql = "INSERT INTO comments(post_id,text,user_id) VALUES ('$post_id','$comment',NULL)";
                                if ($conn->query($sql) === TRUE) {
                                    echo 'ok';
                                
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            } 
                        
                        }else{
                            echo 'tvoje mama';
                        }
            
            }else{
            
            }






