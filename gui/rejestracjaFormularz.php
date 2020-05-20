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
        <main>
            <section id="reg">
                <div class="container">
                    <hr>
                    <h2 class="text-center">Rejestracja</h2>
                    <hr>
                </div>
            </section>
            <section id="rejestracja">
                <div class="container">
                    <form class="form-horizontal text-center" method="post" action="rejestracja.php">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="imie">Imię<input id="imie" name="imie" type="text" class="form-control input-md" pattern="[A-Za-z]{2,}" required></label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nazwisko">Nazwisko<input id="nazwisko" name="nazwisko" type="text" class="form-control input-md" pattern="[A-Za-z]{2,}" required></label>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="email">E-mail<input id="email" name="email" type="email" placeholder="np. jan.kowalski@gmail.com" class="form-control input-md" required></label>
                        </div>
                        <?php
                        if (isset($_SESSION['powtorzeniemaila'])) echo $_SESSION['powtorzeniemaila'];
                        unset($_SESSION['powtorzeniemaila']);
                        ?>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="haslo">Hasło<input id="haslo" name="haslo" type="password" placeholder="min. 6 znaków" class="form-control input-md" pattern=".{6,}" required></label>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="haslo2">Powtórz hasło<input id="haslo2" name="haslo2" type="password" class="form-control input-md" pattern=".{6,}" required></label>
                        </div>
                        <?php
                        if (isset($_SESSION['powtorzeniehasla'])) echo $_SESSION['powtorzeniehasla'];
                        unset($_SESSION['powtorzeniehasla']);
                        ?>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nr_telefonu">Numer telefonu <input id="nr_telefonu" name="nr_telefonu" type="text" class="form-control input-md" pattern="^[1-9]{1}[0-9]{8}$" required></label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="nr_karty">Numer karty kredytowej/debetowej<input id="nr_karty" name="nr_karty" type="text" placeholder="16 cyfr" class="form-control input-md" pattern="^[0-9]{16}$" required></label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="data_waz">Data ważności<input id="data_waz" name="data_waz" type="text" placeholder="MM/RR" class="form-control input-md" pattern="^[0-9]{2}/[0-9]{2}$" required></label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cvv">Kod CVV<input id="cvv" name="cvv" type="text" placeholder="kod zawarty na odwrocie karty" class="form-control input-md" pattern="^[0-9]{3}$" required></label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="checkboxes">

                                <div class="checkbox">
                                    <label for="checkboxes-0">
                                        <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1" required>
                                        * Oświadczam, że zapoznałem się i akceptuję Regulamin CarTon.pl
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="checkboxes-1">
                                        <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
                                        Wyrażam zgodę na przetwarzanie moich danych osobowych w celach marketingowych i otrzymywanie informacji handlowych od CarTon sp. z o. o. oraz partnerów z wykorzystaniem środków komunikacji elektronicznej (m.in. e-mail).
                                    </label>
                                </div>
                                <p class="text-danger">* Pole obowiązkowe</p>
                        </div>
                        </label>
                        <div class="form-group">
                            <label class="control-label text-center" for="rej">
                                <button id="rej" name="rej" class="btn btn-warning">Rejestracja</button>
                            </label>

                        </div>



                    </form>
                    <hr>
                </div>
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
                <div class="container">
                    <hr>
                </div>
            </section>
        </main>
        <footer>
            <p>Designed by Damian Helowicz &copy; 2020</p>
        </footer>

        </div>

</body>

</html>