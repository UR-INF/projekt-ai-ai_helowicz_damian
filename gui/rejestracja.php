<?php
session_start();
if (!isset($_POST['rej'])) {
    header('Location: index.php');
    exit();
}


$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$nr_telefonu = $_POST['nr_telefonu'];
$email = $_POST['email'];
$haslo1 = $_POST['haslo'];
$haslo2 = $_POST['haslo2'];
$nr_karty = $_POST['nr_karty'];
$data_waz = $_POST['data_waz'];
$cvv = $_POST['cvv'];
$haslo1 = md5($haslo1);
$haslo2 = md5($haslo2);

$conn = new mysqli("localhost", "root", "", "wypozyczalnia");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select id_klient from klient where email='$email'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $r = $row['id_klient'];
}
$sql = "select id_pracownik from pracownik where email='$email'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $r = $row['id_pracownik'];
}


if ($r == 0) {
    if ($haslo1 == $haslo2) {

        $sql = "INSERT INTO klient (imie, nazwisko, email, haslo, nr_telefonu, nr_karty, data_waz, cvv) VALUES ('$imie', '$nazwisko', LOWER('$email'), '$haslo1', '$nr_telefonu', '$nr_karty', '$data_waz', '$cvv')";
        mysqli_query($conn, $sql);
        $_SESSION['sukces'] = '<section id="suk">
        <div class="container">
            <hr>
            <h2 class="text-center">Konto zostało utworzone pomyślnie! Możesz się zalogować!</h2>
            <hr>
        </div>
        </section>';


        unset($_SESSION['bladtworzenia']);
        unset($_SESSION['powtorzeniehasla']);
        unset($_SESSION['powtorzeniemaila']);
        unset($_SESSION['blad']);
        header('Location: logowanieFormularz.php');
    } 
    else {
        $_SESSION['powtorzeniehasla'] = '<span style="color:red">Hasła się różnią!</span>';
        header('Location: rejestracjaFormularz.php');
    }
} else {
   $_SESSION['powtorzeniemaila'] = '<span style="color:red">Podany email jest już zajęty.</span>';
  header('Location: rejestracjaFormularz.php');
}

mysqli_close($conn);
