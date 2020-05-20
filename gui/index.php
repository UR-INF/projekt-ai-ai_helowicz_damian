<?php
session_start();


$conn = new mysqli("localhost", "root", "", "wypozyczalnia");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT MARKA, MODEL, ZDJECIE FROM samochod";
$result = $conn->query($sql)




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
            <a class="nav-brand btn btn-warning btn-lg" role="button" href="#start">
                <i class="icon-box">CarTon</i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" href="#dlaczego">Kim jesteśmy?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" href="#onas">Dlaczego my?</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" href="#galeria">Nasze samochody</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" href="#kontakt">Kontakt</a>
                    </li>
                    <?php if (isset($_SESSION["zalogowany"])) {
                        echo '<li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" aria-pressed="true" href="panelKlienta.php">Konto</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" aria-pressed="true" href="wypozyczenieFormularz.php">Wypożycz samochód</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" aria-pressed="true" href="wylogowanie.php">Wyloguj</a>

                    </li>';
                    } elseif (isset($_SESSION['admin'])) {
                        echo '<li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" aria-pressed="true" href="panelPracownika.php">Zamówienia</a>

                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" aria-pressed="true" href="wylogowanie.php">Wyloguj</a>

                    </li>';
                    } else {
                        echo '<li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" aria-pressed="true" href="logowanieFormularz.php">Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning btn-lg" role="button" aria-pressed="true" href="rejestracjaFormularz.php">Rejestracja</a>

                    </li>';
                    }
                    ?>
                </ul>
            </div>
    </nav>
    <main>

        <section id="dlaczego">
            <div class="container">
                <hr>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/car.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/car1.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="images/car2.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <hr>
            </div>
        </section>
        <?php if (isset($_SESSION['sukces_wyp'])) {
        echo'<section>
            <div class="container text-center">

                <h5>Gratulacje!</h5>
                <h5>Samochód został wypożyczony pomyślnie!</h5>
                <h5> Za 30 minut zapraszamy pod odbiór do wybranego przez siebie punktu!</h5>
                <hr>
            </div>
        </section>';
        }
        unset($_SESSION['sukces_wyp']);
            ?>
        <section id="onas">
            <div class="container">
                <div class="bg-warning">
                    <br>
                    <h3 class="text-center">Dlaczego my?</h3>
                    <br>
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm-12 col-md-3">
                                <i class="icon-basket"></i>
                                <h4>Tylko Kilka kroków</h4>
                                <p>
                                    i masz samochód
                                </p>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <i class="icon-dollar"></i>
                                <h4>
                                    Brak Kaucji
                                </h4>
                                <p>
                                    za wypożyczenie
                                </p>

                            </div>

                            <div class="col-sm-12 col-md-3">
                                <i class="icon-cab"></i>
                                <h4>
                                    Podstawienie za darmo
                                </h4>
                                <p>
                                    W 30 minut
                                </p>
                                <p>
                                    do wybranego przez Ciebie punktu
                                </p>

                            </div>
                            <div class="col-sm-12 col-md-3">
                                <i class="icon-user-pair"></i>
                                <h4>
                                    Całodobowa obsługa
                                </h4>
                                <p>
                                    chętnie pomoże Ci w każdej sytaucji
                                </p>

                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <div class="container">
                <hr>
            </div>
        </section>


        <section id="galeria" class="kolor1">

            <div class="container">
                <h3 class="text-center">Nasze samochody</h3>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-0">
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div id="carouselExampleSlidesOnly" class="carousel slide text-center" data-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    
                                        while($row = $result->fetch_assoc()) {
                                        if ($row['ZDJECIE'] == 1) {
                                    ?>
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="images/cars_big/<?php echo $row['ZDJECIE']; ?>.jpg" alt="<?php echo $row['ZDJECIE']; ?>">
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="images/cars_big/<?php echo $row['ZDJECIE']; ?>.jpg" alt="<?php echo $row['ZDJECIE']; ?>">
                                            </div>

                                    <?php
                                        }
                                    }
                                    
                                    $conn->close();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </section>
        <section id="kontakt">
            <div class="container">
                <div class="bg-warning">
                    <br>
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
                    <br>
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