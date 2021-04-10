<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location:../index.php");
}
?>

<?php
if (isset($_POST['medico']) && isset($_POST['paziente']) && isset($_POST['data'])){
    $medico = $_POST['medico'];
    $paziente = $_POST['paziente'];
    $data = $_POST['data'];


    include('./connetti.php');

    //mysqli_query($connessione, "DELETE FROM `associazione` WHERE `fkPaziente`=$paziente");
    if ($data!=""){
        $successo = mysqli_query($connessione, "UPDATE `paziente` SET `fkMedico` = '$medico', `dataAssociazione` = '$data' WHERE `paziente`.`CF` = '$paziente' AND fkMedico IS NULL");
    }else{
        $successo = mysqli_query($connessione, "UPDATE `paziente` SET `fkMedico` = '$medico', `dataAssociazione` = CURRENT_TIMESTAMP() WHERE `paziente`.`CF` = '$paziente'  AND fkMedico IS NULL");
    }

}
header('location:../aggiungiAssociazione.php');
?>
