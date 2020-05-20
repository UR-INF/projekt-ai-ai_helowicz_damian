<?php
session_start();

$conn = new mysqli("localhost", "root", "", "wypozyczalnia");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$login = $_POST['email'];
$haslo = $_POST['password'];
$haslo = md5($haslo);
$sql = "SELECT id_klient FROM klient WHERE email=LOWER('$login') AND haslo='$haslo'";
$result = $conn->query($sql);


while($row = $result->fetch_assoc()) {
    $sprawdz = $row['id_klient'];
}
if ($sprawdz > 0) {
    $conn->close();
    $_SESSION['zalogowany'] = true;
    $_SESSION['mail'] = $login;
    unset($_SESSION['blad']);
    header('Location: index.php');
} else {
    $sql = "SELECT id_pracownik FROM pracownik WHERE email=LOWER('$login') AND haslo='$haslo'";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $sprawdz = $row['id_pracownik'];
    }
    if ($sprawdz > 0) {
        $conn->close();
        $_SESSION['admin'] = true;
        $_SESSION['mail_p'] = $login;
        unset($_SESSION['blad']);
        header('Location: panelPracownika.php');
    }else{
        $conn->close();
        
        $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
        header('Location: logowanieFormularz.php');
    }
}
