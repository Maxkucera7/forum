<?php     session_start();?>
<nav class="flex gap-1">
    <h1>FORUM</h1>

   <ul>
    <li><a href="index.php">Hlavní stránka</a></li>
    <li><a href="">Příspěvky</a></li>
    <?php if($_SESSION['username']) {
        echo '  <li><a href="create.php">Vytvořit</a></li>';
    }?>
    <li><a href="">O nás</a></li>
   </ul>

   <ul>
       <?php if($_SESSION['username']) {
          echo '<li><a href="">'.$_SESSION['username'].'</a></li>';
          echo '<li>
          <form action="server/logout.php" method="post">
          <button>Odhlásit se</button>
          
          </form>
          
          </li>';
          if ($_SESSION["admin"]) {
            echo '<li><a href="">ADMIN</a></li>';
          }
         
       } else{
           echo '  <li><a href="login.php">Přihlásit se</a></li>';
           echo '  <li><a href="registrace.php">Registrovat se</a></li>';
       }
       ?>
     
   </ul>
</nav>
<!-- <?php echo '<div class="success">'.$_SESSION["success"].'</div>' ?> -->

