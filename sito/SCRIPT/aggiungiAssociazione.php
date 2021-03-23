<?php
if (isset($_POST['medico']) && isset($_POST['paziente']) && isset($_POST['data'])){
    $medico = $_POST['medico'];
    $paziente = $_POST['paziente'];
    $data = $_POST['data'];


    include('./connetti.php');
    session_start();

    //mysqli_query($connessione, "DELETE FROM `associazione` WHERE `fkPaziente`=$paziente");
    if ($data==""){
        $successo = mysqli_query($connessione, "INSERT INTO `associazione`(`fkMedico`, `fkPaziente`) VALUES ('$medico','$paziente')");
    }else{
        $successo = mysqli_query($connessione, "INSERT INTO `associazione`(`data`, `fkMedico`, `fkPaziente`) VALUES ('$data','$medico','$paziente')");
    }

}
header('location:../aggiungiAssociazione.php');
?>
