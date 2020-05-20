<?php
session_start();

$conn = new mysqli("localhost", "root", "", "wypozyczalnia");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ULICA, MIASTO, NUMER FROM miejsce;";
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
                <h2 class="text-center">Wyszukaj pojazdy</h2>
                <hr>
            </div>
        </section>
        <?php
        if (isset($_SESSION['zla_data'])) echo $_SESSION['zla_data'];
                        unset($_SESSION['zla_data']);
                        ?>
        <section>
            <div class="container">

                <form action="wypozyczenie.php" method="post" class="form-horizontal text-center">

                    <div class="form-group">
                        <label for="exampleSelect1" class="col-md-4 control-label">Miejsce odbioru i zwrotu
                            <select class="form-control" name="odb">
                                <?php
                                while($row = $result->fetch_assoc()) {
                                ?>
                                    <option><?php echo $row['MIASTO'], ', ul. ', $row['ULICA'], ' ', $row['NUMER']; ?></option>
                                <?php
                                }
                                $conn->close();
                                ?>
                            </select>
                        </label>

                    </div>

                    <div class="form-group">
                        <label for="example-date-input1" class="col-form-label col-md-4">Data odbioru<input class="form-control" type="date" value="<?php echo date("Y-m-d") ?>" name="dataodb"></label>

                    </div>

                    <div class="form-group">
                        <label for="example-date-input2" class="col-form-label col-md-4">Data zwrotu<input class="form-control" type="date" value="<?php echo date("Y-m-d") ?>" name="datazwr"></label>

                    </div>

                    <button id="szukaj" name="szukaj" class="btn btn-warning btn-lg">Wyszukaj</button>
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