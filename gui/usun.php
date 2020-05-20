<?php
session_start();
if ((!isset($_POST['usun']))) {
    header('Location: index.php');
    exit();
}

$id_wyp = $_POST['id_wyp'];

$conn = new mysqli("localhost", "root", "", "wypozyczalnia");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "delete from wypozyczenie where id_wypozyczenia='$id_wyp'";
mysqli_query($conn, $sql);


$_SESSION['usunieto'] = '<p class="text-center" style="color:black">Pomyślnie usunięto wypożyczenie!</p><hr>';
header('Location: panelPracownika.php');

$conn->close();
?>