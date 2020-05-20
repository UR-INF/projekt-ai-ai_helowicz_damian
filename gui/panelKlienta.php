<?php
session_start();


$conn = new mysqli("localhost", "root", "", "wypozyczalnia");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$email_klienta = $_SESSION['mail'];
$sql = "SELECT id_wypozyczenia, w.id_samochod, w.id_klient, w.id_miejsce, data_odb, data_zwr, marka, model, data_zwr-data_odb as dni, cena, status, email, ulica, numer, miasto
FROM wypozyczenie w, samochod s, miejsce m, klient k 
where s.id_samochod=w.id_samochod AND k.id_klient=w.id_klient AND m.id_miejsce=w.id_miejsce AND email='$email_klienta'";
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
                <h2 class="text-center">Panel Klienta</h2>

            </div>
        </section>
        <section id="wypozyczenia">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Marka</th>
                            <th scope="col">Model</th>
                            <th scope="col">Ulica</th>
                            <th scope="col">Numer</th>
                            <th scope="col">Miasto</th>
                            <th scope="col">Data odbioru</th>
                            <th scope="col">Data zwrotu</th>
                            <th scope="col">Koszt</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['id_wypozyczenia']; ?></th>
                            <td><?php echo $row['marka']; ?></td>
                            <td><?php echo $row['model']; ?></td>
                            <td><?php echo $row['ulica']; ?></td>
                            <td><?php echo $row['numer']; ?></td>
                            <td><?php echo $row['miasto']; ?></td>
                            <td><?php echo $row['data_odb']; ?></td>
                            <td><?php echo $row['data_zwr']; ?></td>
                            <td><?php
                            if($row['dni']==0){$row['dni']=1;}
                            $cena=$row['dni']*$row['cena'];
                            echo($cena);
                            ?></td>
                            <td><?php echo $row['status']; ?></td>
                        </tr>
                        <?php
                        }
                        $conn->close();
                        
                        ?>
                    </tbody>
                </table>
                <hr>
            </div>
        </section>


        <section id="kontakt">
            <div class="container">
                <div class="bg-warning">
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