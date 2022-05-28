<?php
    session_start();
    if(isset($_SESSION['session_username'])){
        header('Location: home.php');
        exit;
    }
    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = mysqli_connect("localhost", "root","", "hw1") or die(mysqli_error($conn));
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $query = "SELECT username, pswd FROM login WHERE username = '$username' ";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($res) > 0){
                $passowrd_check = mysqli_fetch_assoc($res); 
                if(password_verify($_POST['password'],$passowrd_check['pswd'])){ //password check è criptata quindi non posso usare ===
                    $_SESSION["session_username"] = $_POST['username'] ;
                    header("Location: home.php");
                    mysqli_free_result($res);
                    mysqli_close($conn);
                    exit;
                }
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }

?>
<html>
    <head>
        <link rel='stylesheet' href='./style/login.css'>
        <script src='./scripts/login.js' defer></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Crypto News - Accedi</title>
    </head>
    <body>
        
        <div class="container" id="container">
	            <div class="form-container sign-up-container">
		            <form  method='post'>
			            <h1>Create Account</h1>
                        <div>
                            <input type="text" name ='name' placeholder="Name" />
                            <p class='hidden-style hidden vuoto'>Questo campo non può essere vuoto</p>
                        </div>
                        <div>
                            <input type="text" name='surname' placeholder="Surname" />
                            <p class='hidden-style hidden vuoto'>Questo campo non può essere vuoto</p>
                        </div>
                        <div>
                            <input id='username' type="text" name='username' placeholder="Username" />
                            <p class='hidden-style hidden vuoto'>Questo campo non può essere vuoto</p>
                            <p  id ='username-in-uso' class='hidden-style hidden errore'>username già in uso</p>
                        </div>
                        <div>
                            <input id='password' type="password" name='password' placeholder="Password" />
                            <p id ='password-non-valida' class='hidden-style hidden errore'>La password deve essere lunga almeno 8 caratteri e deve contenere una maiuscola,dei numeri e un carattere speciale !@#$%^&*</p>
                            <p class='hidden-style hidden vuoto'>Questo campo non può essere vuoto</p>
                        </div>
                         <div>
                            <input class='button' id='button-signup' type='button' value="Sign Up">
                            <p class='hidden-style hidden errore'> Username già in uso e/o password non valida </p>
                            <p class='hidden-style hidden vuoto'>Nessun campo può rimanere vuoto </p>
                        </div>
		            </form>
	            </div>
                <div class="form-container sign-in-container">
                    <form  method='post'>
                        <h1>Sign in</h1>
                        <input type="text" name='username' placeholder="Username" />
                        <input type="password" name='password' placeholder="Password" />
                        <input class='button' type='submit' value="Sign In">
                        <?php if(isset($error)) echo "<p>$error</p>" ?>
                    </form>
	            </div>
	            <div class="overlay-container">
		            <div class="overlay">
			            <div class="overlay-panel overlay-left">
				            <h1>Welcome Back!</h1>
				            <p>To keep connected with us please login with your personal info</p>
				            <button class="ghost button" id="signIn">Sign In</button>
			            </div>
			            <div class="overlay-panel overlay-right">
				            <h1>Hello, Friend!</h1>
				            <p>Enter your personal details and start journey with us</p>
				            <button class="ghost button" id="signUp">Sign Up</button>
			            </div>
		            </div>
	            </div>
        </div>

        <footer>
	        <p>Created with by Andrea Antonino Maugeri 1000004687</p>
        </footer>
</body>
</html>