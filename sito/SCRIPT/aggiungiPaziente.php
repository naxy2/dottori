<?php
//codice
//cognome
//nome
//data
//luogo
//indirizzo

if (isset($_POST['codice']) && isset($_POST['cognome']) && isset($_POST['nome']) && isset($_POST['data']) && isset($_POST['luogo']) && isset($_POST['indirizzo'])){
    $codice = $_POST['codice'];
    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $luogo = $_POST['luogo'];
    $indirizzo = $_POST['indirizzo'];

    include('./connetti.php');
    session_start();

    $successo = mysqli_query($connessione, "INSERT INTO `paziente`(`CF`, `cognome`, `nome`, `dataNascita`, `luogoNascita`, `indirizzo`) VALUES ('$codice','$cognome','$nome','$data','$luogo','$indirizzo')");

    if ($successo){
        $_SESSION['aggiuntoPaziente'] = $nome;
    }else{
        $_SESSION['errorePaziente'] = true;
    }
}
header('location:../aggiungiPaziente.php');
?>
