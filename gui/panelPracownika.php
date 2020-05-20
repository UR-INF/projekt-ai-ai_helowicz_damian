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
                    <?php if (isset($_SESSION['admin'])) {
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
        <section id="wyp">
            <div class="container">
                <hr>
                <h2 class="text-center">Panel pracownika</h2>
                <hr>
                <?php
                if (isset($_SESSION['usunieto'])) echo $_SESSION['usunieto'];
                unset($_SESSION['usunieto']);
                ?>
                <?php
                if (isset($_SESSION['oddano'])) echo $_SESSION['oddano'];
                unset($_SESSION['oddano']);
                ?>
            </div>
        </section>
        <section id="zamowienia">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Zamówienia z punktu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Wszystkie zamówienia</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php
                        $conn = new mysqli("localhost", "root", "", "wypozyczalnia");

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $email_pracownika = $_SESSION['mail_p'];

                        $sql = "SELECT id_wypozyczenia, w.id_samochod, w.id_klient, k.imie, k.nazwisko, w.id_miejsce, data_odb, data_zwr, marka, model, data_zwr-data_odb as dni, cena, status, p.email
                        FROM wypozyczenie w, samochod s, miejsce m, klient k, pracownik p
                        where s.id_samochod=w.id_samochod AND k.id_klient=w.id_klient AND m.id_miejsce=w.id_miejsce AND m.id_miejsce = p.id_miejsce AND p.email='$email_pracownika';";
                        $result = $conn->query($sql)


                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Marka</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">ID Klienta</th>
                                    <th scope="col">Imię</th>
                                    <th scope="col">Nazwisko</th>
                                    <th scope="col">Data odbioru</th>
                                    <th scope="col">Data zwrotu</th>
                                    <th scope="col">Koszt</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Opcje</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id_wypozyczenia']; ?></th>
                                        <td><?php echo $row['marka']; ?></td>
                                        <td><?php echo $row['model']; ?></td>
                                        <td><?php echo $row['id_klient']; ?></td>
                                        <td><?php echo $row['imie']; ?></td>
                                        <td><?php echo $row['nazwisko']; ?></td>
                                        <td><?php echo $row['data_odb']; ?></td>
                                        <td><?php echo $row['data_zwr']; ?></td>
                                        <td><?php
                                        if($row['dni']==0){$row['dni']=1;}
                                            $cena = $row['dni'] * $row['cena'];
                                            echo ($cena);
                                            ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                            <div class="row">
                                                <form method="post" action="zwroc.php">
                                                    <input name="id_wyp" type="hidden" value="<?php echo $row['id_wypozyczenia']; ?>">
                                                    <button name="zwroc" class="btn btn-warning btn-sm">Zwrot</button>
                                                </form>
                                                <form method="post" action="usun.php">
                                                    <input name="id_wyp" type="hidden" value="<?php echo $row['id_wypozyczenia']; ?>">
                                                    <button name="usun" class="btn btn-danger btn-sm">Usuń</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }

                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <?php
                        $conn = new mysqli("localhost", "root", "", "wypozyczalnia");

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT id_wypozyczenia, w.id_samochod, w.id_klient, k.imie, k.nazwisko, w.id_miejsce, data_odb, data_zwr, marka, model, data_zwr-data_odb as dni, ulica, numer, miasto, cena, status
                        FROM wypozyczenie w, samochod s, miejsce m, klient k, pracownik p
                        where s.id_samochod=w.id_samochod AND k.id_klient=w.id_klient AND m.id_miejsce=w.id_miejsce;";
                        $result = $conn->query($sql)


                        ?>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Marka</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">ID Klienta</th>
                                    <th scope="col">Imię</th>
                                    <th scope="col">Nazwisko</th>
                                    <th scope="col">Adres</th>
                                    <th scope="col">Data odbioru</th>
                                    <th scope="col">Data zwrotu</th>
                                    <th scope="col">Koszt</th>
                                    <th scope="col">status</th>
                                    <th scope="col">Opcje</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id_wypozyczenia']; ?></th>
                                        <td><?php echo $row['marka']; ?></td>
                                        <td><?php echo $row['model']; ?></td>
                                        <td><?php echo $row['id_klient']; ?></td>
                                        <td><?php echo $row['imie']; ?></td>
                                        <td><?php echo $row['nazwisko']; ?></td>
                                        <td><?php echo $row['ulica'], ' ', $row['numer'], ' ', $row['miasto']; ?></td>
                                        <td><?php echo $row['data_odb']; ?></td>
                                        <td><?php echo $row['data_zwr']; ?></td>
                                        <td><?php
                                            if($row['dni']==0){$row['dni']=1;}
                                            $cena = $row['dni'] * $row['cena'];
                                            echo ($cena);
                                            ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                            <div class="row">
                                                <form method="post" action="zwroc.php">
                                                    <input name="id_wyp" type="hidden" value="<?php echo $row['id_wypozyczenia']; ?>">
                                                    <button name="zwroc" class="btn btn-warning btn-sm">Zwrot</button>
                                                </form>
                                                <form method="post" action="usun.php">
                                                    <input name="id_wyp" type="hidden" value="<?php echo $row['id_wypozyczenia']; ?>">
                                                    <button name="usun" class="btn btn-danger btn-sm">Usuń</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }

                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                        <hr>

                    </div>

                </div>
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