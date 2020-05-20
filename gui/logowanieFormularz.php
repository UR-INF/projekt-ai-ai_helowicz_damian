<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

    <title>CarTon - Twoja wypożyczalnia!</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-warning">
        <div class="container">
            <a class="nav-brand btn btn-warning btn-lg" role="button" href="index.php">
                <i class="icon-box">CarTon</i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" href="index.php">Kim jesteśmy?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" href="index.php">Dlaczego my?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" href="index.php">Nasze samochody</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" href="#kontakt">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" aria-pressed="true" href="logowanieFormularz.php">Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" aria-pressed="true" href="rejestracjaFormularz.php">Rejestracja</a>

                    </li>

                </ul>
            </div>
    </nav>
    <main>
        <section id="log">
            <div class="container">
                <hr>
                <h2 class="text-center">Logowanie</h2>
                <hr>
            </div>
        </section>
        <?php
        if (isset($_SESSION['sukces'])) echo $_SESSION['sukces'];
        unset($_SESSION['sukces']);
        ?>
        <section id="logowanie">
            <div class="container">
                <form class="form-horizontal text-center" method="post" action="logowanie.php">
                    <fieldset>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">E-mail<input id="email" name="email" type="email" class="form-control input-md" required></label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password">Hasło<input id="password" name="password" type="password" class="form-control input-md" required></label>
                        </div>

                        <?php
                        if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
                        unset($_SESSION['blad']);
                        ?>

                    </fieldset>
                    <div class="form-group">
                        <label class="control-label text-center" for="log"></label>
                        <button id="log" name="log" class="btn btn-warning">Zaloguj</button>
                    </div>
                </form>
                <hr>
            </div>
        </section>
        </section>
        <section id="kontakt">
            <div class="container">
                <div class="bg-warning">
                    <hr>
                    <div class="row text-center">
                        <div class="col-sm-12 col-md-6">
                            <h3 class="text-center">Kontakt</h3>
                            <p>CarTon sp. z o. o.</p>
                            <p>tel. 888 888 888</p>
                            <p>Grabina 106</p>
                            <p>05-650 Chynów</p>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <h3 class="text-center">Social Media</h3>
                            <a href="https://www.facebook.com/damian.helowicz" target="_blank"><i class="icon-facebook-squared"></i></a>
                            <a href="https://www.instagram.com/skippingbaker/?hl=pl" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="https://twitter.com/Helowith" target="_blank"><i class="icon-twitter"></i></a>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

        </section>
    </main>
    <footer>
        <p>Designed by Damian Helowicz &copy; 2020</p>
    </footer>

    </div>

</body>

</html>