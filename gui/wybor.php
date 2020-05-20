<?php
session_start();
$conn = new mysqli("localhost", "root", "", "wypozyczalnia");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$dodb = $_SESSION['dataodb'];
$dzwr = $_SESSION['datazwr'];
$sql = "SELECT s.id_samochod, marka, model, rok_prod, silnik, miejsca, drzwi, bagaznik, klimatyzacja, kolor, rodz_paliwa, cena, zdjecie, status FROM samochod s left join wypozyczenie w ON s.id_samochod = w.id_samochod where status = 'Oddany' OR status IS NULL;";
$result = $conn->query($sql);
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
        <section id="wyp">
            <div class="container">
                <hr>
                <h2 class="text-center">Aktualnie dostępne pojazdy</h2>
                <hr>
            </div>
        </section>
        <section>
            <div class="container">
                <?php

                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="row wyniki_sam">
                        <div class="col-sm-12 col-md-6 col-lg-5">
                            <h3><?php echo $row['marka'] . ' ' . $row['model'] ?></h3>
                            <img src="images/cars_big/<?php echo $row['zdjecie'] ?>.jpg" alt="" class="w-100">
                        </div>

                        <div class="col-sm-6 col-md-4 wyniki_sam_list">
                            <h5>Liczba miejsc: <?php echo $row['miejsca'] ?></h5>
                            <h5>Bagażnik: <?php echo $row['bagaznik'] ?></h5>
                            <h5>Liczba drzwi: <?php echo $row['drzwi'] ?></h5>
                            <h5>Kolor: <?php echo $row['kolor'] ?></h5>
                            <h5>Rodzaj klimatyzacji: <?php echo $row['klimatyzacja'] ?></h5>
                            <h5>Rodzaj paliwa:<?php echo $row['rodz_paliwa'] ?></h5>
                        </div>

                        <div class="col-sm-6 col-md-2 col-lg-3">
                            <h4>Łączny koszt to: <?php echo ((strtotime($_SESSION['datazwr']) - strtotime($_SESSION['dataodb'])) / (60 * 60 * 24) + 1) * $row['cena'] ?>
                                PLN</h4>
                            <form action="zakonczenie.php" method="post">
                                <input name="id_sam" type="hidden" value="<?php echo $row['id_samochod'] ?>">
                                <button name="wybierz" class="btn btn-warning">Wypożycz</button>
                            </form>
                        </div>

                    </div>
                    <hr>
                <?php
                }
                $conn->close();
                ?>
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