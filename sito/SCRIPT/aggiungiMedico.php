<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location:../index.php");
}
?>

<?php
//codice
//cognome
//nome
//data
//luogo

if (isset($_POST['codice']) && isset($_POST['cognome']) && isset($_POST['nome']) && isset($_POST['data']) && isset($_POST['luogo'])){
    $codice = $_POST['codice'];
    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $luogo = $_POST['luogo'];

    include('./connetti.php');

    mysqli_query($connessione, "INSERT INTO `medico`(`codice`, `cognome`, `nome`, `dataNascita`, `luogoNascita`) VALUES ('$codice','$cognome','$nome','$data','$luogo')");
    $_SESSION['aggiuntoMedico'] = $nome;
}
header('location:../aggiungiMedico.php');
?>
