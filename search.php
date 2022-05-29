<?php

session_start();
if(!isset($_SESSION['session_username'])){
    header('Location: login.php');
    exit;
} 
?>
<html>
    <head>
        <link rel='stylesheet' href='./style/search.css'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@600&family=BIZ+UDPGothic&family=Open+Sans:wght@300&family=Smooch&display=swap" rel="stylesheet">
        <script src='./scripts/search.js' defer='true'></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crypto News-Podcast</title>
    </head>
    <body>
    <header> 
        <div>
            <a href="home.php">Home</a>
            <div id='header'> <?php echo $_SESSION['session_username'] ?>,</br> cerca podcasts relativi ad una cryptovaluta </div>
            <form>
                <input type='text'  placeholder = ' cerca una crypto'>
            </form>
        </div>
    </header>
    <section>
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


