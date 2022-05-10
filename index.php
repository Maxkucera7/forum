<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .grid-4{
    display:grid;
    gap: 2rem;
    grid-template-columns: repeat(4, minmax(0, 1fr));
}
    </style>
</head>
<body>
<?php 
        @include('nav.php');
        @include('server/posts.php');  
    ?>
    <div class="container">
   
    <h1>Forum</h1>

        <div class="grid-4">
            <?php 
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div>';
                        echo '<small>'.$row["datum"].'</small>';
                        echo "<br>";
                      echo "Uživatel: " . $row["user"]. " - Nadpis: " . $row["nadpis"]. " " . $row["text"]. "<br>";
                      echo '<a href="view.php?id='.$row["id"].'">Zobrazit příspěvek</a>';
                      echo '</div>';
                     
                    }
                  } else {
                    echo "0 results";
                  }
                  $conn->close();
            ?>
        </div>

</div>
</body>
</html>