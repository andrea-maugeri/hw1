<?php
session_start();
    if(!isset($_SESSION['session_username'])){
        header('Location: login.php');
        exit;
    }
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Crypto News - Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Hurricane&family=IBM+Plex+Sans+Arabic:wght@200&family=Inspiration&family=Nunito:wght@300;700;800&family=Open+Sans:wght@300&family=Raleway:wght@200&family=Roboto:ital,wght@1,300&family=Work+Sans:wght@100&display=swap" rel="stylesheet">
    <script src="./scripts/home.js" defer="true"></script>
</head>
  <body>
    <header>
      <nav>
        <div id="links">
            <a href="home.php">Home </a>
            <a href="preferiti.php">Preferiti</a>
            <a href="search.php">Podcast</a>
            <a href="logout.php">Logout</a>
        </div>
        <div id="menu" class='menu'>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class='hidden' id='show_menu'>
            <a href="home.php">Home </a>
            <a href="preferiti.php">Preferiti</a>
            <a href="search.php">Podcast</a>
            <a href="logout.php">Logout</a>
            <div id='close_menu'>Close menu ✖</div>
        </div>
      </nav>
      <h1>
        <strong>Benvenuto <?php echo $_SESSION['session_username'] ?>,</br> naviga tra tanti articoli relativi </br> al mondo delle criptovalute </strong></br>
                <div id="collegamenti"> seguici sui social</div>
                <div id="contatti">
                        <span>
                            <a href="https://www.facebook.com/andrea.maugeri.520"> <img class='contatti' src="./images/facebook.jpg"></a>    
                        </span>
                        <span>
                            <a href="https://www.instagram.com/andrea_0132/"> <img class='contatti' src="./images/instagram.jpg"></a>
                        </span>
                        <span>
                            <a href="https://github.com/andrea-maugeri/"> <img class='contatti' src="./images/GitHub.jpg"></a>
                        </span>
               </div>
      </h1>
      </header>
      <section id="news">
      </section>
      <footer>
        <div id="foot1">Powered by Andrea Antonino Maugeri 1000004687</div>
        <div id="foot2">Powered by Andrea Antonino Maugeri</br> 1000004687</div>
      </footer>
  </body>
</html>