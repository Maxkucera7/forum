<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <style>
        .flex-comment{
    justify-content: space-between;
}

    </style>
</head>
<body>
    <?php 
    @include('nav.php');
    @include('server/posts.php');
    
    ?>
    <div class="container">
        <center>
        <?php 
        echo ($id);
        $row = $post->fetch_assoc();
            echo '<h1>'.$row["nadpis"].'</h1>';
            echo '<p>'.$row["text"].'</p>';

        

       
        ?>
       
            <?php 
            if ($_SESSION["admin"]) {
                echo ' <form action="" method="post">
                <button type="button">SMAZAT</button>
                <input type="hidden" name="id" id="post_id" value="<?php echo $id;?>">
                </form>';
            }else{

            }
                 
            ?>
        <br>
        <br><br>
        <br><br><br>
        <div class="form-group">
                        <div id="message" class="col-sm-offset-3 col-sm-6 m-t-15"></div>
                    </div>
        <div class="flex flex-comment" >
            <div>
            <h2>Napsat komentář</h2>
            <form action="" method="post">
            <textarea name="" id="text" cols="30" rows="10"></textarea>
            <input type="hidden" name="id" id="post_id" value="<?php echo $id;?>">
            <br>
            <button type="button" onclick="SendComment()">Odeslat Komentář</button>
            </form>
            </div>
            <div>
                <h2><?php  ?>Komentáře:</h2>
            <?php 
                if ($resultComment->num_rows > 0) {
                    // output data of each row
                    while($row = $resultComment->fetch_assoc()) {
                        echo '<div>';
                        
                        echo "<br>";
                      echo "<small> Uživatel: " . $row["user_id"]."</small><br>";
                      echo '<span>'.$row["text"].'</span>';
                      
                      echo '</div>';
                     
                    }
                  } else {
                    echo "0 results";
                  }
                  $conn->close();
            ?>
            </div>
        </div>
    </div>
            

    </center>
    <script>
        function SendComment(){
            var text = $('#text').val();
            var id = $('#post_id').val();
            console.log(text);
            $.ajax({
                url: 'server/comments.php',
                type: 'post',
                data:{
                    newcomment:text,
                    newid:id
                },
                success:function(response){
                      // $('#message').html(response);
                        if(response == "ok") {
                    $('#message').html(`<div style="color:green;" class="w3-red w3-panel">Komentář byl odeslán</div>`);
					location.reload();


					//$("#loginContainer messages").html(`<div class="w3-green w3-panel">Přihlášen</div>`);
				} else {
                    $('#message').html(`<div  style="color:red;" class="w3-red w3-panel">${response}</div>`);
				}
                    }
            });
        }
    </script>
</body>
</html>