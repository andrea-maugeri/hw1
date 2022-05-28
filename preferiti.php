<?php
session_start();
if(!isset($_SESSION['session_username'])){
    header('Location: login.php');
    exit;
} 

?>
<html>
    <head>
        <link rel='stylesheet' href='./style/favorites.css'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@600&family=BIZ+UDPGothic&family=Open+Sans:wght@300&family=Smooch&display=swap" rel="stylesheet">
        <script src='./scripts/favorites.js' defer='true'></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crypto News-Preferiti</title>
    </head>
    <body>
    <header>
        <a href="http://localhost/hw1/home.php">Home</a>
        <div> <?php echo $_SESSION['session_username'] ?>, qui puoi trovare i tuoi articoli preferiti <div>
    </header>
    <section id="news">
    <?php 
    $conn = mysqli_connect("localhost", "root","", "hw1") or die(mysqli_error($conn));
    $query = " select * from preferiti where user=" ."'" .$_SESSION['session_username'] ."'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(mysqli_num_rows($res) > 0) {
        while($row=mysqli_fetch_assoc($res)){
            echo "<div class='testo'>";
            echo "<h2>" .$row["title"] ."</h2>";
            if($row["img_url"])
                echo "<img src=" .$row["img_url"] .">";
            echo "<article>" .$row["content"] ."</article>";
            echo "<a href=" .$row["link"] .">Clicca qui per l'articolo completo</a>";
            echo "<input type='submit' class= 'like-button like-button-unselected' value='Rimuovi dai preferiti ✖' />";
            echo "</div>";
        }
        mysqli_free_result($res);
        mysqli_close($conn);
    }
    else echo "<div class='testo' ><h2>La tua lista preferiti è vuota</h2></div>";
    ?>
    </section>
    <footer>
          <div id="foot1">
            Powered by Andrea Antonino Maugeri 1000004687
          </div>
          <div id="foot2">
            Powered by Andrea Antonino Maugeri</br> 1000004687
          </div>
    </footer>
    </body>
</html>