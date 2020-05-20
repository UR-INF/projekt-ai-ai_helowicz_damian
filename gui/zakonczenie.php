<?php
session_start();
if ((!isset($_POST['wybierz']))) {
    header('Location: index.php');
    exit();
}

$id_sam = $_POST['id_sam'];
$email = $_SESSION['mail'];

$conn = new mysqli("localhost", "root", "", "wypozyczalnia");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_klient from klient where email='$email'";
$result = $conn->query($sql);



while($row = $result->fetch_assoc()) {
    $id_klient = $row['id_klient'];
}

$odb = $_SESSION['idodb'];
$dodb = $_SESSION['dataodb'];
$dzwr = $_SESSION['datazwr'];


$sql = "INSERT INTO wypozyczenie (id_samochod, id_klient, id_miejsce, data_odb, data_zwr, status) VALUES ('$id_sam', '$id_klient', '$odb', '$dodb', '$dzwr', 'Wypożyczony')";
mysqli_query($conn, $sql);
$_SESSION['sukces_wyp'] = true;
header('Location: index.php');
$conn->close();
?>