<?php
session_start();
if ((!isset($_POST['szukaj']))) {
    header('Location: index.php');
    exit();
}

$odb = $_POST['odb'];
$dataodb = $_POST['dataodb'];
$datazwr = $_POST['datazwr'];

if ((strtotime($datazwr) - strtotime($dataodb)) / (60 * 60 * 24) < 0) {
    $_SESSION['zla_data'] = '<section id="dat">
        <div class="container">
            
            <p class="text-center">Wybrana data jest niewłaściwa!</p>
            <hr>
        </div>
        </section>';
    header('Location: wypozyczenieFormularz.php');
} else {

    $_SESSION['odb'] = $odb;
    $_SESSION['dataodb'] = $dataodb;
    $_SESSION['datazwr'] = $datazwr;

    $miastoodb = substr($odb, 0, strpos($odb, ','));


    $conn = new mysqli("localhost", "root", "", "wypozyczalnia");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT ID_MIEJSCE FROM miejsce WHERE miasto = '$miastoodb';";
    $result = $conn->query($sql);


    while($row = $result->fetch_assoc()) {
        $_SESSION['idodb'] = $row['ID_MIEJSCE'];
    }

    $conn->close();

    header('Location: wybor.php');
}
